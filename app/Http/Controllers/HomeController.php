<?php


namespace App\Http\Controllers;

use A17\Twill\Repositories\SettingRepository;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function view()
    {
        $bannerTitle = app(SettingRepository::class)->byKey('banner_title', 'homepage') ?? "Het Tiny Restaurant";
        $bannerDescription = app(SettingRepository::class)->byKey('banner_description', 'homepage') ?? "Wilt u als bedrijf ook het verschil maken en waardevol ondernemen door naar uw doelgroep toe te gaan?";

        return view('site.home', [
            'bannerTitle' => $bannerTitle,
            'bannerDescription' => $bannerDescription
        ]);
    }
}