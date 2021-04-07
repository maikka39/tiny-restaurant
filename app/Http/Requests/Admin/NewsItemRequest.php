<?php

namespace App\Http\Requests\Admin;

use A17\Twill\Http\Requests\Admin\Request;

class NewsItemRequest extends Request
{
    public function rulesForCreate()
    {
        return [];
    }

    public function rulesForUpdate()
    {
        return [
            'description' => 'required|string',
            'attachments' => 'nullable|file',
            'cover' => 'nullable|image',
        ];
    }
}
