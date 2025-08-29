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

    public function search(Request $request)
    {
        $query = $request->input('q'); // ambil query dari ?q=
        $data = $this->api->getList();
        $restaurants = $data['restaurants'] ?? [];

        // Filter berdasarkan nama, kategori, dan menu
        $filtered = collect($restaurants)->filter(function ($restaurant) use ($query) {
            if (!$query) return true;
            $q = strtolower($query);
            $name = strtolower($restaurant['name'] ?? '');
            $description = strtolower($restaurant['description'] ?? '');
            $city = strtolower($restaurant['city'] ?? '');
            $categories = isset($restaurant['categories']) ? strtolower(implode(' ', array_column($restaurant['categories'], 'name'))) : '';
            $menus = isset($restaurant['menus']) ? strtolower(implode(' ', array_merge(
                isset($restaurant['menus']['foods']) ? array_column($restaurant['menus']['foods'], 'name') : [],
                isset($restaurant['menus']['drinks']) ? array_column($restaurant['menus']['drinks'], 'name') : []
            ))) : '';

            return strpos($name, $q) !== false
                || strpos($description, $q) !== false
                || strpos($city, $q) !== false
                || strpos($categories, $q) !== false
                || strpos($menus, $q) !== false;
        })->values()->all();

        return view('restaurants.search', [
            'query' => $query,
            'restaurants' => $filtered,
        ]);
    }
}
