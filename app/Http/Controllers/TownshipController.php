<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Township;

class TownshipController extends Controller
{
    public function show (Township $township) {
        return view('township', [
            'township' => $township,
            'townshipImageURL' => url("/images/" . $township->picture)
        ]);
    }
}