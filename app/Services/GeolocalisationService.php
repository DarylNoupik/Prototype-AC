<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GeolocalisationService
{

    protected Client $client;
    protected $baseUrl = 'https://nominatim.openstreetmap.org';
    
    public function __construct(Client $client = null)
    {
        $this->client = $client ?? new Client([
            'base_uri' => $this->baseUrl, 
            'headers' => [
                'User-Agent' => 'AC/1.0',
            ],
            'verify'=>false,

        ]);
    }
    

    /**
     *
     * @param string $query
     * @param string|null $country
     * @return array
     * @throws GuzzleException
     */
    public function searchLocation(string $query, ?string $country = null): array
    {
        $params = [
            'format' => 'json',
            'q' => $query,
        ];
    
        if ($country) {
            $params['country'] = $country;
        }
    
        // Requête GET sur la bonne base URL complète
        $response = $this->client->get('search', ['query' => $params]);
    
        return json_decode($response->getBody(), true);
    }
    
}