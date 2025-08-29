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
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($restaurants as $resto)
                <tr>
                    <td>{{ $resto['name'] }}</td>
                    <td>{{ $resto['city'] }}</td>
                    <td>{{ $resto['rating'] }}</td>
                    <td>{{ Str::limit($resto['description'], 80) }}</td>
                    <td>
                        <img src="https://restaurant-api.dicoding.dev/images/small/{{ $resto['pictureId'] }}"
                             alt="{{ $resto['name'] }}" width="80">
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
