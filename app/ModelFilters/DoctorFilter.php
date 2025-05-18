<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Contracts\Database\Eloquent\Builder;

class DoctorFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];
    public function doctorName($value) {
        return $this->where('name', 'like', '%' . $value . '%');
    }
    public function specialtyName($value) {
        return $this->whereHas('specialty',function ($q)use($value)  {
            $q->where('name', 'like', '%' . $value . '%');
        });
    }
    public function cityName($value) {
        return  $this->whereHas('facilities.zone.city', function ($q) use($value)  {
            $q->where('name', 'like', '%' . $value . '%');
        });
    }
    public function zoneName($value) {
        return  $this->whereHas('facilities.zone', function ($q) use($value)  {
            $q->where('name', 'like', '%' . $value . '%');
        });
    }
    public function location($value){
        return $this
            ->join('facility_doctors', 'doctors.id', '=', 'facility_doctors.doctor_id')
            ->join('facilities', 'facility_doctors.facility_id', '=', 'facilities.id')
            ->join('zones', 'facilities.zone_id', '=', 'zones.id')
            ->selectRaw("DISTINCT doctors.*, (6371 * acos(cos(radians(?)) * cos(radians(zones.lat)) * cos(radians(zones.long) - radians(?)) + sin(radians(?)) * sin(radians(zones.lat)))) AS distance", [$value['lat'], $value['lng'], $value['lat']])
            ->orderBy('distance');
    }
}
