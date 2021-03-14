<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gemeente;

class GemeenteController extends Controller
{
    public function show ($gemeente) {
        $gemeente = Gemeente::where('name', $gemeente)->firstOrFail();

        return view('gemeente', [
            'gemeente' => $gemeente 
        ]);
    }
}