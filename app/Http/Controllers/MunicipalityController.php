<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipality;
use App\Repositories\MunicipalityRepository;

class MunicipalityController extends Controller
{
    public function show ($slug) {
        $municipality = app(MunicipalityRepository::class)->forSlug($slug);
        return view('municipality', [
            'municipality' => $municipality
        ]);
    }
}