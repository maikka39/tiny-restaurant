<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Models\Homepage;
use App\Repositories\ProjectRepository;

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

        return view('site.homepage', [
            'homepage' => $page,
            'video_src' => getSrcAttribute($page->video_url),
            'highlight' => $page->homepage_link_items->where('homepage_id', 1)->where('position', 1)->first(),
            'agendaItems' => $agendaItems,
        ]);
    }

    public function admin()
    {
        $page = Homepage::first();

        return view('admin.homepages.form', $this->form($page->id));
    }

    public function getSrcAttribute($string) {
        parse_str(parse_url($string)['query'], $output);
        return 'https://www.youtube.com/embed/' . $output['v'];
    }
}
