<?php

namespace App\Http\Requests\Admin;

use A17\Twill\Http\Requests\Admin\Request;

class FarmerRequest extends Request
{
    public function rulesForCreate()
    {
        return [];
    }

    public function rulesForUpdate()
    {
        return [];
    }
}
