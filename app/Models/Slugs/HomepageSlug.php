<?php

namespace App\Models\Slugs;

use A17\Twill\Models\Model;

class HomepageSlug extends Model
{
    protected $fillable = [
        'slug',
        'locale',
        'active',
        'homepage_id',
    ];
    protected $table = 'homepage_slugs';
}
