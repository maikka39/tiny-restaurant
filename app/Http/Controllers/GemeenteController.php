<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gemeente;

class GemeenteController extends Controller
{
    public function show ($gemeente) {
        // dd($gemeente);


        return view('gemeente', [
            'gemeente' => Gemeente::where('name', $gemeente)->firstOrFail() 
        ]);
    }
}