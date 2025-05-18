<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Specialty;
use App\Models\SocialLink;

class HomeController extends Controller
{
    public function searchDoctors(Request $request)
    {
        $data = $request->all();
        if(isset($data['lat']) && isset($data['lng'])) $data['location'] = ['lat'=> $data['lat'],'lng' => $data['lng']];
        $query = Doctor::filter($data);
        return response()->json($query->with(['specialty'])->get());
    }

    public function getAllServices()
    {
        return response()->json(Service::with('specialty')->get());
    }

    public function getSpecialOffers()
    {
        return response()->json(Service::where('remaining_count', '>', 0)->with('specialty')->get());
    }

    public function getTopSpecialities(Request $request)
    {
        $topSpecialities = Specialty::whereHas('doctors.appointments')
            ->withCount(['doctors as appointments_count' => function ($query) {
                $query->join('appointments', 'doctors.id', '=', 'appointments.doctor_id');
            }])
            ->orderByDesc('appointments_count')
            ->take(10)
            ->get();

        if ($topSpecialities->isNotEmpty()) {
            return response()->json($topSpecialities);
        }

        $lat = $request->input('lat');
        $lng = $request->input('lng');

        if (!$lat || !$lng) {
            return response()->json(Specialty::take(10)->get());
        }

        $radius = 10;
        $latDelta = $radius / 111;
        $lngDelta = $radius / (111 * cos(deg2rad($lat)));

        // Distance calculation (Haversine)
        $distanceSelect = "(6371 * acos(cos(radians(?)) * cos(radians(zones.lat)) * cos(radians(zones.long) - radians(?)) + sin(radians(?)) * sin(radians(zones.lat))))";

        $specialities = Specialty::select('specialties.*')
            ->join('doctors', 'specialties.id', '=', 'doctors.speciality_id')
            ->join('facility_doctors', 'doctors.id', '=', 'facility_doctors.doctor_id')
            ->join('facilities', 'facility_doctors.facility_id', '=', 'facilities.id')
            ->join('zones', 'facilities.zone_id', '=', 'zones.id')
            ->whereBetween('zones.lat', [$lat - $latDelta, $lat + $latDelta])
            ->whereBetween('zones.long', [$lng - $lngDelta, $lng + $lngDelta])
            ->selectRaw("MIN($distanceSelect) as min_distance", [$lat, $lng, $lat])
            ->groupBy('specialties.id')
            ->orderBy('min_distance')
            ->take(10)
            ->get();

        return response()->json($specialities);
    }


}
