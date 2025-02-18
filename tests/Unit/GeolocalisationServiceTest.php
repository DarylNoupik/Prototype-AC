<?php

namespace Tests\Unit;

use App\Services\GeolocalisationService;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Tests\TestCase;
use Mockery;

class GeolocalisationServiceTest extends TestCase
{
    public function test_search_location_returns_data()
    {
        // Simuler une réponse de l'API
        $mockResponse = new Response(200, [], json_encode([
            ['display_name' => 'Paris, France', 'lat' => '48.8566', 'lon' => '2.3522']
        ]));

        // Mock du client Guzzle
        $mockClient = Mockery::mock(Client::class);
        $mockClient->shouldReceive('get')
            ->once()
            ->with('', ['query' => ['format' => 'json', 'q' => 'paris']])
            ->andReturn($mockResponse);

        // Injection du client mocké dans le service
        $service = new GeolocalisationService($mockClient);

        // Appel de la méthode et vérification du résultat
        $result = $service->searchLocation('paris');

        $this->assertNotEmpty($result);
        $this->assertEquals('Paris, France', $result[0]['display_name']);
        $this->assertEquals('48.8566', $result[0]['lat']);
        $this->assertEquals('2.3522', $result[0]['lon']);
    }
}
