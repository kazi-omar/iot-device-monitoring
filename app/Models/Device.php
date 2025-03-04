<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_name',
        'location',
        'api_key',
    ];

    public function sensorData()
    {
        return $this->hasMany(SensorData::class);
    }
}
