<?php

namespace App\Http\Controllers\API\SensorDatas;

use App\Http\Controllers\Controller;
use App\Http\Requests\SensorDatas\SensorDataStoreRequest;
use App\Http\Resources\SensorDatas\SensorDataResource;
use App\Services\SensorDatas\SensorDataService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SensorDataController extends Controller
{
    protected $sensorDataService;

    public function __construct(SensorDataService $sensorDataService)
    {
        $this->sensorDataService = $sensorDataService;
    }

    /**
     * @OA\Post(
     *     path="/sensor-data",
     *     operationId="storeSensorData",
     *     tags={"SensorData"},
     *     summary="Store new Sensor Data",
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Store Sensor Data",
     *         @OA\JsonContent(
     *             title="Store new Sensor Data request",
     *             description="Sensor Data request body",
     *             type="object",
     *             required={"device_id", "temperature", "humidity", "status", "timestamp"},
     *             @OA\Property(
     *                 property="device_id",
     *                 description="Device ID",
     *                 example=1,
     *                 type="integer"
     *             ),
     *             @OA\Property(
     *                 property="temperature",
     *                 description="Temperature",
     *                 example=25.5,
     *                 type="number"
     *             ),
     *             @OA\Property(
     *                 property="humidity",
     *                 description="Humidity",
     *                 example=60.5,
     *                 type="number"
     *             ),
     *             @OA\Property(
     *                 property="status",
     *                 description="Status",
     *                 example="active",
     *                 type="string"
     *             ),
     *             @OA\Property(
     *                 property="timestamp",
     *                 description="Timestamp",
     *                 example="2025-03-04T12:00:00Z",
     *                 type="string",
     *                 format="date-time"
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Success",
     *         @OA\MediaType(
     *             mediaType="application/json",
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
     *             @OA\Property(property="success", type="string", example=false),
     *             @OA\Property(property="message", type="string", example="Unauthenticated."),
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="string", example=false),
     *             @OA\Property(property="message", type="string", example="This action is unauthorized."),
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="string", example=false),
     *             @OA\Property(property="message", type="string", example="ID is not found."),
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity (Validation errors)",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="string", example=false),
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *             @OA\Property(
     *                 property="errors",
     *                 type="object",
     *                 @OA\Property(
     *                     property="device_id",
     *                     type="array",
     *                     collectionFormat="multi",
     *                     @OA\Items(
     *                         type="string",
     *                         example="The device_id field is required.",
     *                     )
     *                 ),
     *                 @OA\Property(
     *                     property="temperature",
     *                     type="array",
     *                     collectionFormat="multi",
     *                     @OA\Items(
     *                         type="string",
     *                         example="The temperature field is required.",
     *                     )
     *                 ),
     *                 @OA\Property(
     *                     property="humidity",
     *                     type="array",
     *                     collectionFormat="multi",
     *                     @OA\Items(
     *                         type="string",
     *                         example="The humidity field is required.",
     *                     )
     *                 ),
     *                 @OA\Property(
     *                     property="status",
     *                     type="array",
     *                     collectionFormat="multi",
     *                     @OA\Items(
     *                         type="string",
     *                         example="The status field is required.",
     *                     )
     *                 ),
     *                 @OA\Property(
     *                     property="timestamp",
     *                     type="array",
     *                     collectionFormat="multi",
     *                     @OA\Items(
     *                         type="string",
     *                         example="The timestamp field is required.",
     *                     )
     *                 ),
     *             )
     *         )
     *     ),
     * )
     */
    public function store(SensorDataStoreRequest $request): SensorDataResource
    {
        $sensorData = $this->sensorDataService->store($request);
        return new SensorDataResource($sensorData);
    }

    /**
     * @OA\Get(
     *     path="/devices/{deviceId}/latest-status",
     *     operationId="getLatestStatus",
     *     tags={"SensorData"},
     *     summary="Get latest status of a device",
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="deviceId",
     *         description="Device ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\MediaType(
     *             mediaType="application/json",
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
     *             @OA\Property(property="success", type="string", example=false),
     *             @OA\Property(property="message", type="string", example="Unauthenticated."),
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="string", example=false),
     *             @OA\Property(property="message", type="string", example="This action is unauthorized."),
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="string", example=false),
     *             @OA\Property(property="message", type="string", example="ID is not found."),
     *         )
     *     ),
     * )
     */
    public function latestStatus($deviceId): JsonResponse
    {
        $status = $this->sensorDataService->getLatestStatus($deviceId);
        return response()->json($status);
    }

    /**
     * @OA\Get(
     *     path="/devices/{deviceId}/historical-status",
     *     operationId="getHistoricalStatus",
     *     tags={"SensorData"},
     *     summary="Get historical status of a device within a given time range",
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="deviceId",
     *         description="Device ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="start_time",
     *         description="Start time",
     *         required=true,
     *         in="query",
     *         @OA\Schema(
     *             type="string",
     *             format="date-time"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="end_time",
     *         description="End time",
     *         required=true,
     *         in="query",
     *         @OA\Schema(
     *             type="string",
     *             format="date-time"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\MediaType(
     *             mediaType="application/json",
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
     *             @OA\Property(property="success", type="string", example=false),
     *             @OA\Property(property="message", type="string", example="Unauthenticated."),
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="string", example=false),
     *             @OA\Property(property="message", type="string", example="This action is unauthorized."),
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="string", example=false),
     *             @OA\Property(property="message", type="string", example="ID is not found."),
     *         )
     *     ),
     * )
     */
    public function historicalStatus(Request $request, $deviceId): JsonResponse
    {
        $status = $this->sensorDataService->getHistoricalStatus($request, $deviceId);
        return response()->json($status);
    }
}
