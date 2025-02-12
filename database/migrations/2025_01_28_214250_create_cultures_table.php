<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cultures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('phase'); // Phase de la culture (ex: semis, croissance, récolte)
            // $table->foreignId('site_id')->constrained()->onDelete('cascade'); // Relation avec les sites géographiques
            $table->decimal('temp_min', 5, 2); // Température minimale
            $table->decimal('temp_max', 5, 2); // Température maximale
            $table->decimal('tco2_min', 5, 2); // Luminosité minimale
            $table->decimal('tco2_max', 5, 2); // Luminosité maximale
            $table->decimal('vsh2o_min', 5, 2); // Humidité minimale
            $table->decimal('vsh2o_max', 5, 2); // Humidité maximale
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cultures');
    }
};
