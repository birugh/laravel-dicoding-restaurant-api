<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Services\DicodingRestaurantApi;

class RestaurantController extends Controller
{
    //
    protected $api;

    public function __construct(DicodingRestaurantApi $api)
    {
        $this->api = $api;
    }

    public function index()
    {
        $data = $this->api->getList();

        // ambil bagian restaurants
        $restaurants = $data['restaurants'] ?? [];

        return view('restaurants.index', compact('restaurants'));
    }

    public function show($id)
    {
        $api = new \App\Services\DicodingRestaurantApi();
        $data = $api->getDetail($id);

        if (!$data || $data['error']) {
            abort(404, 'Restaurant not found');
        }

        return view('restaurants.show', [
            'restaurant' => $data['restaurant']
        ]);
    }
}
