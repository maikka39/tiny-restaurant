<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TimeLine extends Component
{
    public $direction;
    public $datetime;

    /**
     * Create a new component instance.
     *
     * @param $isEven
     * @param $datetime
     */
    public function __construct($isEven, $datetime)
    {
        if($isEven)
            $this->direction = 'left';
        else
            $this->direction = 'right';

        $this->datetime = $datetime;
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
