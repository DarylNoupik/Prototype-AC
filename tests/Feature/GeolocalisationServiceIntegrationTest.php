<?php

namespace Tests\Feature;

use App\Services\GeolocalisationService;
use Tests\TestCase;

class GeolocalisationServiceIntegrationTest extends TestCase
{
    public function test_search_location_real_api_call()
    {
        // Créer une vraie instance du service
        $service = new GeolocalisationService();

        // Appel réel à l'API
        $result = $service->searchLocation('Paris');

        // Vérifier que la réponse contient bien des données
        $this->assertNotEmpty($result);
        $this->assertArrayHasKey('display_name', $result[0]);
        $this->assertArrayHasKey('lat', $result[0]);
        $this->assertArrayHasKey('lon', $result[0]);
    }
}
