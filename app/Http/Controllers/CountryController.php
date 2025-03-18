<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Http\Requests\CountryRequest;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::paginate(10);
        return response()->json(['Countries' => CountryResource::collection($countries)]);
    }


    public function show(Country $country)
    {
        return response()->json(['Country' => new CountryResource($country)]);
    }

    public function store(CountryRequest $request)
    {
        $country = Country::create($this->mapRequestToCulomns($request->validated()));

        return response()->json(['Country' => new CountryResource($country)]);
    }


    public function edit(CountryRequest $request, Country $country)
    {
        $country->update($this->mapRequestToCulomns($request->validated()));

        return response()->json(['Country' => new CountryResource($country)], 204);
    }


    public function destroy(Country $country)
    {
        $country->delete();

        return response()->json(['Country' => new CountryResource($country)], 204);
    }

    private function mapRequestToCulomns($data)
    {
        return ['name' => $data['country_name']];
    }
}