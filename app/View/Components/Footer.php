<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Homepage;

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
