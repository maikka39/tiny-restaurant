<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasPosition;
use Illuminate\Database\Eloquent\Model;

class HomepageLinkItem extends Model
{
    use HasPosition;

    public $table = "homepage_link_item";

    protected $fillable = [
        'published',
        'name',
        'url',
        'logo_url',
        'position',
        'homepage_id',
    ];
}
