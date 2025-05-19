<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;

class MqttListener extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mqtt:mqtt-listener';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Listen to MQTT topic for sensor data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $server = env('MQTT_HOST', '127.0.0.1');
        $port = env('MQTT_PORT', 1883);
        $clientId = 'laravel-sensor-listener-' . uniqid();
        $username = env('MQTT_USERNAME', null);
        $password = env('MQTT_PASSWORD', null);
        $topic    = env('MQTT_TOPIC', 'sensors');

        $connectionSettings = (new ConnectionSettings)
        // TLS Communication
            ->setConnectTimeout(10)
            ->setUseTls(true)
            ->setTlsSelfSignedAllowed(true)
            ->setKeepAliveInterval(60)
            ->setUsername($username)
            ->setPassword($password);

        $mqtt = new MqttClient($server, $port, $clientId);

        try{
            $mqtt->connect($connectionSettings, true);
            $this->info("Connected to MQTT server at {$server}:{$port}");
            $this->info("Subscribed to MQTT topic: {$topic}");

            $mqtt->subscribe($topic, function(string $topic, string $message){
                $this->info("Received message on topic [{$topic}]: {$message}");

                try{
                    $data = json_decode($message, true);

                    if (json_last_error() !== JSON_ERROR_NONE) {
                       $this->warn("Invalid JSON received");
                       return;
                    }

                    if(isset($data['temperature'], $data['humidity'], $data['soilMoisture'])){
                       $this->info("Sensors data well formated !!!");

                       // Store data in a db or make some treatment  ----
                    }else{
                      $this->warn("Invalid data format received");
                    }

                }catch(\Exception $e){
                    $this->error("Error processing message: " . $e->getMessage());
                }
            },0);

            $this->info("Listening for messages. Press Ctrl+C to stop.");
            $mqtt->loop(true);

        }catch(\Exception $e){

            $this->error("MQTT Error: " . $e->getMessage());
        }finally{
        // Uncomment to disconnect the mqtt client
        // if($mqtt->isConnected()){
//                 $mqtt->disconnect();
//             }
        }

    }
}
