<?php

namespace Database\Seeders;
use App\Jobs\PublishMqttMessage;
use Illuminate\Database\Seeder;

class MqttDataSeeder extends Seeder
{
    public function run(): void
    {
        $topic = 'your/mqtt/topic';
        $data = [
            "temperature" => rand(20, 30),
            "humidity" => rand(50, 70),
            "soilMoisture" => rand(30, 40)
        ];

        PublishMqttMessage::dispatch($topic, $data);
    }
}
