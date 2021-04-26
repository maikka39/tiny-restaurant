<?php

namespace App\Repositories;

use App\Models\Home;
use Illuminate\Config\Repository;

class HomeRepository extends Repository
{
    public function __construct(Home $model)
    {
        $this->model = $model;
    }
}
