<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Homepage;
use App\Models\HomepageLinkItem;

class footer extends Component
{
    public $links;
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */

    public function __construct() 
    {
        $this->links = Homepage::first()->homepage_link_items;
    }

    public function render()
    {
        return view('components.footer');
    }
}
