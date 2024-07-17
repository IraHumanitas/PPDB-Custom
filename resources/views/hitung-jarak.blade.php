<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Jarak Antar Titik</title>
    <link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}" />
</head>
<body>
    <h1>Hitung Jarak Antar Titik</h1>

    <!-- Container untuk peta -->
    <div id="map" style="height: 400px;"></div>

    <!-- Sertakan library Leaflet -->
    <script src="{{ asset('leaflet/leaflet.js') }}"></script>

    <!-- Sertakan skrip untuk menangani peta -->
    <script src="{{ asset('js/map.js') }}"></script>
</body>
</html>
