<?php

declare(strict_types=1);

namespace App\Helper;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiClientHelper
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getResources($params): array
    {
        $base_path = 'http://swapi.dev/api/';
        $rel_path = implode('/',$params);
        $full_path = $base_path . $rel_path; 
        $response = $this->client->request('GET', $full_path);
        return $response->toArray();
    }

}