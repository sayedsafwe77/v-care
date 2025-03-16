<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorTitleRequest;
use App\Http\Resources\DoctorTitleResource;
use App\Models\DoctorTitle;
use Illuminate\Http\Request;

class DoctorTitleController extends Controller
{
    function index() {
        $titles = DoctorTitle::get();
        return response()->json(['data' => DoctorTitleResource::collection($titles)]);
    }
    function show(DoctorTitle $title) {
        return response()->json(['data' => new DoctorTitleResource($title)]);
    }
    function store(DoctorTitleRequest $request) {
        $title = DoctorTitle::create($this->mapRequestToColumns($request->validated()));
        return response()->json(['data' => new DoctorTitleResource($title)],201);
    }
    function edit(DoctorTitle $title, DoctorTitleRequest $request) {
        $title->update($this->mapRequestToColumns($request->validated()));
        return response()->json([],204);
    }
    function delete(DoctorTitle $title) {
        $title->delete();
        return response()->json([],204);
    }
    private function mapRequestToColumns($data)  {
        return ['name' => $data['doctor_name']];
    }
}
