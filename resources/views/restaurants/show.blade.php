<!DOCTYPE html>
<html>

<head>
    <title>{{ $restaurant['name'] }}</title>
</head>

<body>
    <h1>{{ $restaurant['name'] }}</h1>
    <p><strong>Alamat:</strong> {{ $restaurant['address'] }}, {{ $restaurant['city'] }}</p>
    <p><strong>Deskripsi:</strong> {{ $restaurant['description'] }}</p>
    <p><strong>Rating:</strong> {{ $restaurant['rating'] }}</p>

    <h3>Kategori</h3>
    <ul>
        @foreach ($restaurant['categories'] as $cat)
            <li>{{ $cat['name'] }}</li>
        @endforeach
    </ul>

    <h3>Menu Makanan</h3>
    <ul>
        @foreach ($restaurant['menus']['foods'] as $food)
            <li>{{ $food['name'] }}</li>
        @endforeach
    </ul>

    <h3>Menu Minuman</h3>
    <ul>
        @foreach ($restaurant['menus']['drinks'] as $drink)
            <li>{{ $drink['name'] }}</li>
        @endforeach
    </ul>

    <h3>Review Pelanggan</h3>
    <ul>
        @foreach ($restaurant['customerReviews'] as $review)
            <li>
                <strong>{{ $review['name'] }}</strong> ({{ $review['date'] }}):
                {{ $review['review'] }}
            </li>
        @endforeach
    </ul>

    <a href="{{ route('restaurants.index') }}">⬅ Kembali</a>
</body>

</html>
