<?php

namespace App\Http\Composers;

use App\Models\Project;
use Illuminate\View\View;

class ContactComposer
{
    /**
     * Bind data to the view.
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(
            'projectList',
            Project::all()
                ->where('published', true)
                ->where('date', '>', now())
                ->sortByDesc('date')
        );
    }
}
