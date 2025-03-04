<?php

namespace App\Http\Requests\SensorDatas;

use Illuminate\Foundation\Http\FormRequest;

class SensorDataStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'device_id' => 'required|exists:devices,id',
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
            'status' => 'required|string|max:255',
            'timestamp' => 'required|date',
        ];
    }
}
