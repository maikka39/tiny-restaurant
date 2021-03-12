<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Model;

class Test extends Model 
{
    use HasBlocks;

    protected $fillable = [
        'published',
        'title',
        'description',
    ];
    
}
