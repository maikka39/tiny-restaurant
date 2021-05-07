<?php

namespace App\View\Components;

use App\Repositories\NewsItemRepository;
use Illuminate\View\Component;

class LatestNews extends Component
{
    public $news;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->news = app(NewsItemRepository::class)
            ->where('published', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.latest-news');
    }
}
