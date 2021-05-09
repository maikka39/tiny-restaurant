<?php

namespace App\View\Components;

use App\Repositories\HomepagePartnerItemRepository;
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
        $this->partners = app(HomepagePartnerItemRepository::class)->get();
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
