<?php

namespace App\Http\Services;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FetchUserAPI
{
    const API_URL = "https://admin.googleapis.com/admin/directory/v1/";
    private string $API_TOKEN;

    public function __construct()
    {
        $this->API_TOKEN = config('more.digitalocean.token');
    }

    private function getUrl(): PendingRequest
    {
        return Http::baseUrl(self::API_URL)->withHeaders([
            'Authorization' => 'Bearer ' . $this->API_TOKEN
        ]);
    }

    public function makeRequest($email): Response|null|PromiseInterface
    {
        try {
            $response = $this->getUrl()->get('users/' . $this->parseEmailInput($email));

            if (! $response->successful())
                throw new \Exception($response->body());

            return $this->parseResponse($response);
        } catch (\Exception $exception) {
            Log::emergency($exception);
        }
        return null;
    }

    private function parseResponse($response)
    {
        return $response->json();
    }

    private function parseEmailInput($email)
    {
        if (! str_contains($email, '@'))
            $email .= '@utg.edu.gm';

        return $email;
    }
}
