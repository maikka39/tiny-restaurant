<?php

namespace App\Http\Requests\Admin;

use A17\Twill\Http\Requests\Admin\Request;

class HomepageRequest extends Request
{
    public function rulesForCreate()
    {
        return [];
    }

    public function rulesForUpdate()
    {
        return [
            'title' => ['required', 'string'],
            'banner' => ['required', 'string'],
            'highlight_link_name' => ['required', 'string', 'max:20'],
            'highlight_link_url' => ['required', 'url'],
            'highlight_link_logo_url' => ['required', 'ends_with:.png'],
            'repeaters.homepage_link_items' => ['array', 'max:10'],
            'repeaters.homepage_link_items.*.name' => ['required', 'string'],
            'repeaters.homepage_link_items.*.url' => ['required', 'url']
        ];
    }
}
