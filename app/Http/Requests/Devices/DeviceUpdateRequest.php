<?php

namespace App\Http\Requests\Devices;

use Illuminate\Foundation\Http\FormRequest;

class DeviceUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'device_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ];
    }
}
