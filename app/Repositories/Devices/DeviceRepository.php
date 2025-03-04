<?php

namespace App\Repositories\Devices;

use App\Interfaces\Devices\DeviceRepositoryInterface;
use App\Models\Device;

class DeviceRepository implements DeviceRepositoryInterface
{

    public function store($request): Device
    {
        return Device::create($request->all());
    }

    public function getAll()
    {
        return Device::all();
    }

    public function update($request, $id): ?Device
    {
        $device = Device::findOrFail($id);
        $device->update($request->all());
        return $device;
    }
}
