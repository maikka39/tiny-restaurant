<?php

namespace App\Http\Controllers\Admin;

use App\Models\Homepage;
use App\Repositories\ProjectRepository;
use A17\Twill\Http\Controllers\Admin\ModuleController;
use Merujan99\LaravelVideoEmbed\Facades\LaravelVideoEmbed;

class HomepageController extends ModuleController
{
    protected $moduleName = 'homepages';

    public function view()
    {
        $page = Homepage::first();

        $agendaItems = app(ProjectRepository::class)
            ->where('date', '>=', now())
            ->where('published', true)
            ->orderBy('date')
            ->get()
            ->take(3);

        $url = $page->video_url;
        $video = null;

        if($url != null) {
            $whitelist = ['YouTube', 'Vimeo'];
            $video = LaravelVideoEmbed::parse($url, $whitelist);
        }

        return view('site.homepage', [
            'homepage' => $page,
            'video' => $video,
            'highlight' => $page->homepage_link_items->where('homepage_id', 1)->where('position', 1)->first(),
            'agendaItems' => $agendaItems,
        ]);
    }

    public function admin()
    {
        $page = Homepage::first();

        return view('admin.homepages.form', $this->form($page->id));
    }
}
