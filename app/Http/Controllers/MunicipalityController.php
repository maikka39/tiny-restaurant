<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipality;

class MunicipalityController extends Controller
{
    public function show (Municipality $municipality) {
        //dd($municipality);
        return view('municipality', [
            'municipality' => $municipality
        ]);
    }
}