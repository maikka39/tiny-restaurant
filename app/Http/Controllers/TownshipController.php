<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Township;

class TownshipController extends Controller
{
    public function show ($gemeente) {
        $gemeente = Township::where('name', $gemeente)->firstOrFail();

        return view('township', [
            'township' => $gemeente 
        ]);
    }
}