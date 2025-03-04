<?php

namespace App\Interfaces\SensorDatas;

use App\Models\SensorData;
use Illuminate\Support\Collection;

interface SensorDataRepositoryInterface
{
    public function store($request): SensorData;
    public function getLatestStatus($deviceId): ?SensorData;
    public function getHistoricalStatus($request, $deviceId): Collection;
}
