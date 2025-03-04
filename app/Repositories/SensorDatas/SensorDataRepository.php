<?php

namespace App\Repositories\SensorDatas;

use App\Interfaces\SensorDatas\SensorDataRepositoryInterface;
use App\Models\SensorData;
use Illuminate\Support\Collection;

class SensorDataRepository implements SensorDataRepositoryInterface
{
    public function store($request): SensorData
    {
        return SensorData::create($request->all());
    }

    public function getLatestStatus($deviceId): ?SensorData
    {
        return SensorData::where('device_id', $deviceId)->latest('timestamp')->first();
    }

    public function getHistoricalStatus($request, $deviceId): Collection
    {
        return SensorData::where('device_id', $deviceId)
            ->whereBetween('timestamp', [$request->start_time, $request->end_time])
            ->get();
    }
}
