<?php

namespace App\View\Components;

use App\Models\Homepage;
use Illuminate\View\Component;

class Partners extends Component
{
    public $partners;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->partners = Homepage::first()->partner_items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.partners');
    }
}
