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
            'slogan' => ['required', 'string'],
            'button_text' => ['required', 'min:1', 'max:50', 'string'],
            'button_url' => ['required', 'min:1', 'string'],
            'repeaters.homepage_link_items' => ['array', 'max:10'],
            'repeaters.homepage_link_items.*.name' => ['required', 'string'],
            'repeaters.homepage_link_items.*.url' => ['required', 'url']
        ];
    }
}
