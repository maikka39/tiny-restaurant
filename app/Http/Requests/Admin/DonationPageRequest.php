<?php

namespace App\Http\Requests\Admin;

use A17\Twill\Http\Requests\Admin\Request;

class DonationPageRequest extends Request
{
    public function rulesForCreate()
    {
        return [];
    }

    public function rulesForUpdate()
    {
        return [
            'title' => ['required', 'string', 'max:40'],
            'description' => ['required', 'string'],
            'repeaters.donation_amounts' => ['array', 'max:5'],
            'repeaters.donation_amounts.*.amount' => ['required', 'min:1', 'numeric'],
        ];
    }
}
