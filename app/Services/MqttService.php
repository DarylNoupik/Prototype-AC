namespace App\Services;

use PhpMqtt\Client\Facades\MQTT;

class MqttService
{
    public function publish(string $topic, string $message): void
    {
        MQTT::publish($topic, $message, 1);
    }

    public function subscribe(array $topics, \Closure $handler): void
    {
        MQTT::subscribe($topics, $handler, 1);
        MQTT::loop(true);
    }
}
