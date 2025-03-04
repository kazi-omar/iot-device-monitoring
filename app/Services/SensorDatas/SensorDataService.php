<?php

namespace App\Services\SensorDatas;

use App\Repositories\SensorDatas\SensorDataRepository;
use Illuminate\Support\Facades\Cache;

class SensorDataService
{
    protected $sensorDataRepository;

    public function __construct(SensorDataRepository $sensorDataRepository)
    {
        $this->sensorDataRepository = $sensorDataRepository;
    }

    public function store($request)
    {
        return $this->sensorDataRepository->store($request);
    }

    public function getLatestStatus($deviceId)
    {
        return Cache::remember("device_{$deviceId}_latest_status", 60, function () use ($deviceId) {
            return $this->sensorDataRepository->getLatestStatus($deviceId);
        });
    }

    public function getHistoricalStatus($request, $deviceId)
    {
        return $this->sensorDataRepository->getHistoricalStatus($request, $deviceId);
    }
}
