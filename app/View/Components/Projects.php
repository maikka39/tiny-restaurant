<?php

namespace App\View\Components;

use App\Repositories\ProjectRepository;
use Illuminate\View\Component;

class Projects extends Component
{
    public $projects;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->projects = app(ProjectRepository::class)
            ->where('published', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.projects');
    }
}
