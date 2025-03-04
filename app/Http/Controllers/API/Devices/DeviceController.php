<?php

namespace App\Http\Controllers\API\Devices;

use App\Http\Controllers\Controller;
use App\Http\Requests\Devices\DeviceStoreRequest;
use App\Http\Requests\Devices\DeviceUpdateRequest;
use App\Http\Resources\Devices\DeviceResource;
use App\Services\Devices\DeviceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    protected $deviceService;

    public function __construct(DeviceService $deviceService)
    {
        $this->deviceService = $deviceService;
    }

    /**
     * @OA\Post(
     *     path="/devices",
     *     operationId="storeDevice",
     *     tags={"Devices"},
     *     summary="Store new Device",
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Store Device",
     *         @OA\JsonContent(
     *             type="object",
     *             required={"device_name", "location"},
     *             @OA\Property(
     *                 property="device_name",
     *                 type="string",
     *                 description="Device Name",
     *                 example="Device 1"
     *             ),
     *             @OA\Property(
     *                 property="location",
     *                 type="string",
     *                 description="Location",
     *                 example="Building A"
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Success",
     *         @OA\MediaType(
     *             mediaType="application/json"
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Unauthenticated.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="This action is unauthorized.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="ID is not found.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity (Validation errors)",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *             @OA\Property(
     *                 property="errors",
     *                 type="object",
     *                 @OA\Property(
     *                     property="device_name",
     *                     type="array",
     *                     @OA\Items(
     *                         type="string",
     *                         example="The device_name field is required."
     *                     )
     *                 ),
     *                 @OA\Property(
     *                     property="location",
     *                     type="array",
     *                     @OA\Items(
     *                         type="string",
     *                         example="The location field is required."
     *                     )
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function store(DeviceStoreRequest $request): DeviceResource
    {
        $device = $this->deviceService->store($request);
        return new DeviceResource($device);
    }

    /**
     * @OA\Get(
     *     path="/devices",
     *     operationId="getDevices",
     *     tags={"Devices"},
     *     summary="Get list of Devices",
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\MediaType(
     *             mediaType="application/json"
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Unauthenticated.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="This action is unauthorized.")
     *         )
     *     )
     * )
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $devices = $this->deviceService->getAll();
        return DeviceResource::collection($devices);
    }

    /**
     * @OA\Put(
     *     path="/devices/{id}",
     *     operationId="updateDevice",
     *     tags={"Devices"},
     *     summary="Update existing Device",
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Update Device",
     *         @OA\JsonContent(
     *             type="object",
     *             required={"device_name", "location"},
     *             @OA\Property(
     *                 property="device_name",
     *                 type="string",
     *                 description="Device Name",
     *                 example="Device 1"
     *             ),
     *             @OA\Property(
     *                 property="location",
     *                 type="string",
     *                 description="Location",
     *                 example="Building A"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\MediaType(
     *             mediaType="application/json"
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Unauthenticated.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="This action is unauthorized.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="ID is not found.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity (Validation errors)",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *             @OA\Property(
     *                 property="errors",
     *                 type="object",
     *                 @OA\Property(
     *                     property="device_name",
     *                     type="array",
     *                     @OA\Items(
     *                         type="string",
     *                         example="The device_name field is required."
     *                     )
     *                 ),
     *                 @OA\Property(
     *                     property="location",
     *                     type="array",
     *                     @OA\Items(
     *                         type="string",
     *                         example="The location field is required."
     *                     )
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function update(DeviceUpdateRequest $request, $id): DeviceResource
    {
        $device = $this->deviceService->update($request, $id);
        return new DeviceResource($device);
    }
}
