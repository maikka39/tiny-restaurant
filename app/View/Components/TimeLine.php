<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TimeLine extends Component
{
    public $direction;

    /**
     * Create a new component instance.
     *
     * @param $isEven
     */
    public function __construct($isEven)
    {
        if($isEven)
            $this->direction = 'left';
        else
            $this->direction = 'right';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.time-line');
    }
}
