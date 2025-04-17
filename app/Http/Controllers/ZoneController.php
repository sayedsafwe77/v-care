<?php

namespace App\Http\Controllers;

use App\ApiResponse;
use App\Models\Zone;
use Illuminate\Http\Request;
use App\Http\Requests\ZoneRequest;
use App\Http\Resources\ZoneResource;

class ZoneController extends Controller
{
    use ApiResponse;

    public function index()
    {
        try {
            $zones = Zone::get();
            return $this->successResponse(ZoneResource::collection($zones));
        } catch (\Throwable $th) {
            return $this->responseNotFound();
        }
    }

    public function show(Zone $zone)
    {
        try {
            return $this->successResponse(new ZoneResource($zone));
        } catch (\Throwable $th) {
            return $this->responseServerError($th->getMessage());
        }
    }

    public function store(ZoneRequest $request)
    {
        try {
            $zone = Zone::create($request->validated());
            return $this->successResponse(data: new ZoneResource($zone), status: 201);
        } catch (\Throwable $th) {
            return $this->responseServerError($th->getMessage());
        }
    }

    public function update(Zone $zone, ZoneRequest $request)
    {
        try {
            $zone->update($request->validated());
            return $this->responseNotContent();
        } catch (\Throwable $th) {
            return $this->responseServerError($th->getMessage());
        }
    }

    public function delete(Zone $zone)
    {
        try {
            $zone->delete();
            return $this->responseNotContent();
        } catch (\Throwable $th) {
            return $this->responseServerError($th->getMessage());
        }
    }
}
