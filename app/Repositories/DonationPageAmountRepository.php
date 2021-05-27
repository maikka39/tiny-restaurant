<?php

namespace App\Repositories;

use A17\Twill\Repositories\ModuleRepository;
use App\Models\DonationPageAmount;

class DonationPageAmountRepository extends ModuleRepository
{

    public function __construct(DonationPageAmount $model)
    {
        $this->model = $model;
    }
}
