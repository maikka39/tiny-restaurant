<?php

namespace App\Models\Slugs;

use A17\Twill\Models\Model;

class MunicipalitySlug extends Model
{
    protected $fillable = [
        'slug',
        'locale',
        'active',
        'municipality_id',
    ];
    protected $table = 'municipality_slugs';
}
