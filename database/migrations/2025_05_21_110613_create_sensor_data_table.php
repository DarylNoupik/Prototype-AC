<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sensor_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cultures_id')->constrained()->onDelete('cascade');
            $table->decimal('temperature', 8, 2); // Increased precision
            $table->decimal('co2_level', 8, 2); // Renamed
            $table->decimal('soil_humidity', 8, 2); // Renamed
            $table->decimal('luminosity', 8, 2); // Renamed
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sensor_data');
    }
};
