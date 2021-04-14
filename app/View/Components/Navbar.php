<?php

namespace App\View\Components;

use App\Models\Municipality;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $municipalities;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->municipalities = Municipality::all()->where('published', true);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.navbar');
    }
}
