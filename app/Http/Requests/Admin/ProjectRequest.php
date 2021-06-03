<?php

namespace App\Http\Requests\Admin;

use A17\Twill\Http\Requests\Admin\Request;

class ProjectRequest extends Request
{
    public function rulesForCreate()
    {
        return [
            'published',
            'name',
            'description',
            'active',
            'date',
            'address',
        ];
    }

    public function rulesForUpdate()
    {
        return [
            'published' => ['required', 'boolean'],
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'active' => ['required', 'boolean'],
            'date' => ['required', 'date'],
            'address' => ['required', 'string'],
        ];
    }
}
