<?php

namespace App\View\Components;

use App\Models\Homepage;
use Illuminate\View\Component;

class Footer extends Component
{
    public $links;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->links = Homepage::first()->homepage_link_items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.footer');
    }
}
