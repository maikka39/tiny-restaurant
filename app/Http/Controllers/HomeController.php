<?php


namespace App\Http\Controllers;

use App\Repositories\HomeRepository;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function view()
    {
        $bannerTitle = app(HomeRepository::class)->byKey('banner_title', 'homepage') ?? "Het Tiny Restaurant";
        $bannerDescription = app(HomeRepository::class)->byKey('banner_description', 'homepage') ?? "Wilt u als bedrijf ook het verschil maken en waardevol ondernemen door naar uw doelgroep toe te gaan?";
    
        return view('site.home', [
            'bannerTitle' => $bannerTitle,
            'bannerDescription' => $bannerDescription
        ]);
    }
}