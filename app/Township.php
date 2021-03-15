<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    use HasFactory;

    public function partners () {
        return $this->hasMany(Partner::class);
    }
}