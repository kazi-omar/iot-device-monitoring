<?php

namespace App\Interfaces\Devices;

use App\Models\Device;

interface DeviceRepositoryInterface
{
    public function update($request, $id): ?Device;
}
