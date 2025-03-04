<?php

namespace App\Http\Resources\SensorDatas;

use Illuminate\Http\Resources\Json\JsonResource;

class SensorDataResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'device_id' => $this->device_id,
            'temperature' => $this->temperature,
            'humidity' => $this->humidity,
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
