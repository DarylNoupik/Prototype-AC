<?php

namespace App\Console\Commands;

use App\Models\SensorData;
use App\Models\Site;
use Illuminate\Console\Command;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;

class MqttListener extends Command
{
    protected $signature = 'mqtt:subscribe-sensor-data';
    protected $description = 'Subscribe to MQTT topic and insert sensor data into database';

    public function handle()
    {
        $brokerHost = env('MQTT_HOST', '127.0.0.1');
        $brokerPort = env('MQTT_PORT', 1883);
        $clientId = 'laravel-sensor-subscriber-' . uniqid();
        $topic = env('MQTT_TOPIC', 'sensors/data');
        $username = env('MQTT_USERNAME', null);
        $password = env('MQTT_PASSWORD', null);

        // Configurer les paramètres de connexion MQTT
        $connectionSettings = (new ConnectionSettings)
            ->setConnectTimeout(10)
            ->setUseTls(false)
            ->setTlsSelfSignedAllowed(false)
            ->setKeepAliveInterval(60)
            ->setUsername($username)
            ->setPassword($password);

        try {
            $mqtt = new MqttClient($brokerHost, $brokerPort, $clientId);
            $mqtt->connect($connectionSettings, true);

            $this->info("Connected to MQTT broker at {$brokerHost}:{$brokerPort}");
            $this->info("Subscribed to MQTT topic: {$topic}");

            $mqtt->subscribe($topic, function (string $topic, string $message) {
                $this->info("Received message on topic [{$topic}]: {$message}");

                try {
                    $data = json_decode($message, true);

                    if (json_last_error() !== JSON_ERROR_NONE) {
                        $this->warn("Invalid JSON received: " . json_last_error_msg());
                        \Log::warning("Invalid JSON: {$message}");
                        return;
                    }

                    // Vérifier les champs requis
                    if (!isset($data['site_id'], $data['temperature'], $data['luminosity'], $data['co2_level'], $data['soil_humidity'])) {
                        $this->warn("Missing required fields in message");
                        \Log::warning("Missing fields: {$message}");
                        return;
                    }

                    // Vérifier les plages de valeurs
                    $rules = [
                        'site_id' => 'exists:sites,id',
                        'temperature' => 'numeric|between:-50,50',
                        'luminosity' => 'numeric|min:0',
                        'co2_level' => 'numeric|min:0',
                        'soil_humidity' => 'numeric|between:0,100',
                    ];

                    $validator = validator($data, $rules);

                    if ($validator->fails()) {
                        $this->warn("Invalid data format: " . json_encode($validator->errors()));
                        \Log::warning("Validation errors: " . json_encode($validator->errors()));
                        return;
                    }

                    // Insérer dans la base de données
                    SensorData::create([
                        'site_id' => $data['site_id'],
                        'temperature' => $data['temperature'],
                        'luminosity' => $data['luminosity'],
                        'co2_level' => $data['co2_level'],
                        'soil_humidity' => $data['soil_humidity'],
                    ]);

                    $this->info("Inserted data for site {$data['site_id']}");
                } catch (\Exception $e) {
                    $this->error("Error processing message: " . $e->getMessage());
                    \Log::error("Error processing message: {$e->getMessage()}");
                }
            }, 0);

            $this->info("Listening for messages. Press Ctrl+C to stop.");
            $mqtt->loop(true);
        } catch (\Exception $e) {
            $this->error("MQTT Error: " . $e->getMessage());
            \Log::error("MQTT Error: {$e->getMessage()}");
        } finally {
            if (isset($mqtt) && $mqtt->isConnected()) {
                $mqtt->disconnect();
                $this->info("Disconnected from MQTT broker");
            }
        }
    }
}
