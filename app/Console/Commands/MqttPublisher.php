<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;

class MqttPublisher extends Command
{
    protected $signature = 'mqtt:publish-sensor-data';
    protected $description = 'Simulate sensor data for three sites and publish to MQTT topic';

    public function handle()
    {
        $brokerHost = env('MQTT_HOST', '127.0.0.1');
        $brokerPort = env('MQTT_PORT', 1883);
        $clientId = 'sensor-data-publisher-' . uniqid();
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

            // Boucle infinie pour simuler les données
            while (true) {
                foreach ([1, 2, 3] as $siteId) {
                    // Générer des données aléatoires
                    $data = [
                        'site_id' => $siteId,
                        'temperature' => round(mt_rand(100, 400) / 10, 2), // -10 à 40°C
                        'luminosity' => round(mt_rand(0, 1000), 2), // 0 à 1000 lux
                        'co2_level' => round(mt_rand(300, 1000), 2), // 300 à 1000 ppm
                        'soil_humidity' => round(mt_rand(0, 1000) / 10, 2), // 0 à 100%
                    ];

                    // Convertir en JSON
                    $payload = json_encode($data);

                    // Publier sur le topic
                    $mqtt->publish($topic, $payload, 0);

                    $this->info("Published data for site {$siteId}: {$payload}");
                }

                // Attendre 5 secondes avant la prochaine publication
                sleep(5);
            }
        } catch (\Exception $e) {
            \Log::error('MQTT Publish Error: ' . $e->getMessage());
            $this->error('Error: ' . $e->getMessage());
        }
    }
}