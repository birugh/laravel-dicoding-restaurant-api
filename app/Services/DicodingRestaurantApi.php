<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DicodingRestaurantApi
{
    protected $base;

    public function __construct()
    {
        $this->base = config('services.dicoding_restaurant.base_url');
    }

    public function getList()
    {
        $response = Http::baseUrl($this->base)
            ->withHeaders([
                'User-Agent' => 'Laravel Client',
                'Accept' => 'application/json',
            ])
            ->get('/list');

        if ($response->failed()) {
            return null; // atau bisa lempar exception
        }

        return $response->json(); // return array
    }

    public function getDetail($id)
    {
        $response = Http::baseUrl($this->base)
            ->withHeaders([
                'User-Agent' => 'Laravel Client',
                'Accept' => 'application/json',
            ])
            ->get("/detail/{$id}");

        if ($response->failed()) {
            return null;
        }

        return $response->json();
    }
}
