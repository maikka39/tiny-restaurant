<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Title that is displayed on the header.
     */
    public $title;

    /**
     * A featured image for the page.
     * This is optional.
     */
    public $featured;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $featured)
    {
        $this->title = $title;
        $this->featured = $featured;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.header');
    }
}
