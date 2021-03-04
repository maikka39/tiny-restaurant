<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SocialMediaLink extends Component
{
    /**
     * @var string
     */
    public $link;

    /**
     * @var string
     */
    public $color;

    /**
     * SocialMediaLink constructor.
     *
     * @param string $link
     * @param string $color
     */
    public function __construct(string $link, string $color = '')
    {
        $this->link = $link;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.social-media-link');
    }
}
