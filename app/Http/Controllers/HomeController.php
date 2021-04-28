<?php


namespace App\Http\Controllers;

use A17\Twill\Repositories\SettingRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function view()
    {
        $bannerTitle = app(SettingRepository::class)->byKey('banner_title', 'homepage') ?? "Het Tiny Restaurant";
        $bannerDescription = app(SettingRepository::class)->byKey('banner_description', 'homepage') ?? "Wilt u als bedrijf ook het verschil maken en waardevol ondernemen door naar uw doelgroep toe te gaan?";
        $agendaItems = app(ProjectRepository::class)
            ->where('date', '>=', now())
            ->where('published', true)
            ->orderBy('date')
            ->get()
            ->take(3);

        return view('site.home', [
            'bannerTitle' => $bannerTitle,
            'bannerDescription' => $bannerDescription,
            'agendaItems' => $agendaItems
        ]);
    }
}