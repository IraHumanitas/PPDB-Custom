<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class DistanceController extends Controller
{

    public function showForm()
    {
        return view('calculate-distance');
    }

    public function calculateDistance(Request $request)
    {
        $apiKey = env('OPENROUTESERVICE_API_KEY');

        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $url = "https://api.openrouteservice.org/v2/directions/driving-car?api_key=$apiKey&start=$origin&end=$destination";

        $client = new Client();
        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);

        $distance = $data['features'][0]['properties']['segments'][0]['distance'];
        $lat1 = $data['features'][0]['geometry']['coordinates'][0][1];
        $lon1 = $data['features'][0]['geometry']['coordinates'][0][0];
        $lat2 = $data['features'][0]['geometry']['coordinates'][1][1];
        $lon2 = $data['features'][0]['geometry']['coordinates'][1][0];

        return view('distance.result', compact('distance', 'lat1', 'lon1', 'lat2', 'lon2'));

    }

    public function showResult()
    {
        return view('distance.result', compact('distance', 'lat1', 'lon1', 'lat2', 'lon2'));
    }


}
