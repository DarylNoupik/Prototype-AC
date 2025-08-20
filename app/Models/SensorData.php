<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    use HasFactory;

    protected $table = 'sensor_data';

    protected $fillable = ['temperature', 'luminosity', 'co2_level', 'soil_humidity', 'cultures_id'];

    protected $casts = [
        'temperature' => 'float',
        'luminosity' => 'float',
        'co2_level' => 'float',
        'soil_humidity' => 'float',
        'cultures_id' => 'integer',
    ];

    public function cultures()
    {
        return $this->belongsTo(Culture::class);
    }
}
