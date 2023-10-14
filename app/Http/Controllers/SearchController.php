<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function recherche(Request $request) { /* N'oublies pas d'importer la classe correspondant à la Facade Request */
        dd($request->all()); // Tu vérifies si tu récupères bien ta variable q.
    }
}
