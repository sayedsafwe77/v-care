<?php

namespace App\Http\Controllers;

use App\ApiResponse;
use App\Http\Requests\DoctorTitleRequest;
use App\Http\Resources\DoctorTitleResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\DoctorTitle;
use App\Services\DoctorTitleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class DoctorTitleController extends Controller
{
<<<<<<< HEAD
    use ApiResponse,ApiResponseTrait;
    function index() {
        $titles = DoctorTitle::get();
        // return Response::success(DoctorTitleResource::collection($titles));
        // return response()->success(DoctorTitleResource::collection($titles));
        // return $this->successResponse(DoctorTitleResource::collection($titles));
        return $this->ApiResponse(200,'success',null,DoctorTitleResource::collection($titles));

        // return response()->json(['data' => DoctorTitleResource::collection($titles)]);
=======
    use ApiResponse;
    public function __construct(public DoctorTitleService $service) {
>>>>>>> a3ea2a45ce435aa5db1333785b703954ad8913be
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
