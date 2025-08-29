<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DCR - Dicoding Restaurant</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; }
        nav {
            background: #333;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        nav .brand { font-weight: bold; font-size: 20px; }
        nav .links { display: flex; align-items: center; gap: 15px; }
        nav a { color: white; text-decoration: none; }
        nav form { display: flex; gap: 5px; }
        nav input[type="text"] {
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        nav button {
            padding: 5px 10px;
            border: none;
            background: #555;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
        nav button:hover { background: #777; }
        main { padding: 20px; }
    </style>
</head>
<body>
    <nav>
        <div class="brand">
            <a href="{{ url('/') }}" style="color:white;">DCR</a>
        </div>
        <div class="links">
            <a href="{{ url('/restaurants') }}">Home</a>
            <form action="{{ route('restaurants.search') }}" method="GET">
                <input type="text" name="q" placeholder="Cari restoran..." required>
                <button type="submit">Search</button>
            </form>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>
