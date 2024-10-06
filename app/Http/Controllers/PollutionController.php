<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PollutionController extends Controller
{
    public function getPollutionData()
    {
        // Récupérer la clé API depuis le fichier .env
        $apiKey = env('NASA_API_KEY');

        // Exemple d'appel API pour récupérer des données (modifie les paramètres selon tes besoins)
        $response = Http::get('https://api.nasa.gov/planetary/earth/imagery', [
            'api_key' => $apiKey,
            'lat' => '45.0',    // latitude exemple
            'lon' => '-93.0',   // longitude exemple
        ]);

        // Vérification de la réponse
        if ($response->successful()) {
            $pollutionData = $response->json();

            // Envoyer les données à la vue pour les afficher dans un tableau
            return view('pollution.index', ['pollutionData' => $pollutionData]);
        } else {
            return response()->json(['error' => 'Impossible de récupérer les données'], 500);
        }
    }
}
