<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Daftar Restoran</h1>


    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kota</th>
                <th>Rating</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($restaurants as $restaurant)
                <tr>
                    <td>{{ $restaurant['name'] }}</td>
                    <td>{{ $restaurant['city'] }}</td>
                    <td>{{ $restaurant['rating'] }}</td>
                    <td>{{ Str::limit($restaurant['description'], 80) }}</td>
                    <td>
                        <a href="{{ route('restaurants.show', $restaurant['id']) }}" class="btn btn-sm btn-primary">
                            Detail
                        </a>
                    </td>
                    <td>
                        <img src="https://restaurant-api.dicoding.dev/images/small/{{ $restaurant['pictureId'] }}"
                            alt="{{ $restaurant['name'] }}" width="80">
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Tidak ada data restoran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
