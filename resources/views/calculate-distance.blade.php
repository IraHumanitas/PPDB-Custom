
    <h1>Calculate Distance</h1>

    <form action="{{ route('calculate.distance') }}" method="post">
        @csrf
        <label for="origin">Origin:</label>
        <input type="text" name="origin" id="origin" required>

        <label for="destination">Destination:</label>
        <input type="text" name="destination" id="destination" required>

        <!-- Tambahkan elemen peta di sini -->
        <div id="map"></div>

        <button type="submit">Calculate Distance</button>
    </form>

    <script src="{{ asset('js/leaflet.js') }}"></script>
    <script src="{{ asset('js/map.js') }}"></script>


