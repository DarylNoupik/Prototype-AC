<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MqttListen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mqtt-listen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $mqtt = app(\App\Services\MqttService::class);

        $mqtt->subscribe(['api/devices/+/data'], function (string $topic, string $message) {
            Log::info("Message reçu sur {$topic}: {$message}");

            try {
                $data = json_decode($message, true);
                if (!$data) {
                    Log::warning("Payload non JSON sur {$topic}");
                    return;
                }
        
                preg_match('/ubora\/devices\/(\d+)\/data/', $topic, $matches);
                $deviceId = $matches[1] ?? null;
        
                if (!$deviceId || !Device::find($deviceId)) {
                    Log::warning("Device inexistant pour l'ID {$deviceId}");
                    return;
                }
        
                DeviceData::create([
                    'device_id' => $deviceId,
                    'payload' => $data,
                    'topic' => $topic,
                    'received_at' => Carbon::now(),
                ]);
        
            } catch (\Exception $e) {
                Log::error("Erreur lors de l'enregistrement du message MQTT: " . $e->getMessage());
            }
        });
    }

}
