@extends('layouts.app')

@section('content')
    <h1>Hasil Pencarian untuk: "{{ $query }}"</h1>
    <p>Ditemukan: {{ count($restaurants) }} restoran</p>

    <div class="restaurant-list">
        @forelse ($restaurants as $restaurant)
            <div class="restaurant-card" style="border:1px solid #ccc; margin-bottom:16px; padding:16px; border-radius:8px;">
                <h2>{{ $restaurant['name'] }}</h2>
                <img src="https://restaurant-api.dicoding.dev/images/medium/{{ $restaurant['pictureId'] }}" alt="{{ $restaurant['name'] }}" style="width:200px; height:auto;">
                <p><strong>Kota:</strong> {{ $restaurant['city'] }}</p>
                <p><strong>Rating:</strong> {{ $restaurant['rating'] }}</p>
                <p>{{ $restaurant['description'] }}</p>
            </div>
        @empty
            <p>Tidak ada restoran ditemukan.</p>
        @endforelse
    </div>
@endsection
