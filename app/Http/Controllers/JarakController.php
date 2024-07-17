<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JarakController extends Controller
{
    public function index()
    {
        return view('hitung-jarak');
    }

    public function hitungJarak(Request $request)
    {
        $originInput = $request->input('origin');
        $destinationInput = $request->input('destination');

        // Gunakan layanan geocoding untuk mendapatkan koordinat dari alamat
        // Di sini, saya menggunakan layanan Nominatim
        $geocodingUrl = 'https://nominatim.openstreetmap.org/search?format=json&limit=1&q=';

        // Lakukan request untuk asal
        $originResponse = json_decode(file_get_contents($geocodingUrl . urlencode($originInput)));
        $originLat = $originResponse[0]->lat;
        $originLng = $originResponse[0]->lon;

        // Lakukan request untuk tujuan
        $destinationResponse = json_decode(file_get_contents($geocodingUrl . urlencode($destinationInput)));
        $destinationLat = $destinationResponse[0]->lat;
        $destinationLng = $destinationResponse[0]->lon;

        // Hitung jarak menggunakan metode Haversine
        $R = 6371; // Radius bumi dalam kilometer
        $dLat = deg2rad($destinationLat - $originLat);
        $dLon = deg2rad($destinationLng - $originLng);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($originLat)) * cos(deg2rad($destinationLat)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $R * $c;

        return view('hitung-jarak', ['result' => $distance]);
    }
}
