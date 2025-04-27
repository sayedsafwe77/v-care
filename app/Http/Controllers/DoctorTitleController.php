<?php

namespace App\Http\Controllers;

use App\ApiResponse;
use App\Http\Requests\DoctorTitleRequest;
use App\Http\Resources\DoctorTitleResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\DoctorTitle;
use App\Services\DoctorTitleService;


class DoctorTitleController extends Controller
{
    use ApiResponse,ApiResponseTrait;
    public function __construct(public DoctorTitleService $service) {
    }
    function index() {
        return $this->successResponse(DoctorTitleResource::collection($this->service->index()));
    }
    function show($id) {
        return response()->json(['data' => new DoctorTitleResource($this->service->getById($id))]);
    }
    function store(DoctorTitleRequest $request) {
        try{
            return $this->successResponse(data: new DoctorTitleResource($this->service->store($this->mapRequestToColumns($request->validated()))),status: 204);
        }catch(\Throwable $th){
            return $this->errorResponse($th->getMessage(),500);
        }
    }
    function edit($id, DoctorTitleRequest $request) {
        $this->service->edit($id,$this->mapRequestToColumns($request->validated()));
        return response()->json([],204);
    }
    function delete($id) {
        $this->service->delete($id);
        return response()->json([],204);
    }
    private function mapRequestToColumns($data)  {
        return ['name' => $data['doctor_name']];
    }
}
