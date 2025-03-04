<?php

namespace App\Services\Devices;

use App\Repositories\Devices\DeviceRepository;
use Illuminate\Support\Facades\Auth;

class DeviceService
{
    protected $deviceRepository;

    public function __construct(DeviceRepository $deviceRepository)
    {
        $this->deviceRepository = $deviceRepository;
    }

    public function store($request)
    {
        return $this->deviceRepository->store($request);
    }

    public function getAll()
    {
        return $this->deviceRepository->getAll();
    }

    public function update($request, $id)
    {
        return $this->deviceRepository->update($request, $id);
    }
}
