<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageLinkItem extends Model
{
    public $table = 'homepage_link_item';

    protected $fillable = [
        'published',
        'name',
        'url',
        'homepage_id',
    ];
}
