<?php

namespace App\Services;
use GuzzleHttp\Client;

class GoogleMapsService
{
    protected $client;
    protected $mapsApiKey;
    protected $mapsHost;

    public function __construct()
    {
        $this->client = new Client();
        $this->mapsApiKey = config('app.google.maps.api_key');
        $this->mapsHost = config('app.google.maps.host');
    }

    public function getCoordenates($address)
    {
        $host = $this->mapsHost.'?address='.$address.'&key='.$this->mapsApiKey;

        $response = $this->client->get($host);

        $data = json_decode($response->getBody()->getContents(), true);

        if ($data['status'] == 'OK') {
            $location = $data['results'][0]['geometry']['location'];
            return [
                'latitude' => $location['lat'],
                'longetude' => $location['lng'],
            ];
        }

        return null;
    }
}