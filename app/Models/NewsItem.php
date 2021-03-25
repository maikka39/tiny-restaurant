<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class NewsItem extends Model 
{
    use HasBlocks, HasSlug, HasMedias, HasRevisions;

    protected $fillable = [
        'published',
        'title',
        'description',
    ];
    
    public $slugAttributes = [
        'title',
    ];
    
    public $mediasParams = [
        'cover' => [
            'desktop' => [
                [
                    'name' => 'desktop',
                    'ratio' => 16 / 9,
                ],
            ],
            'mobile' => [
                [
                    'name' => 'mobile',
                    'ratio' => 1,
                ],
            ],
            'flexible' => [
                [
                    'name' => 'free',
                    'ratio' => 0,
                ],
                [
                    'name' => 'landscape',
                    'ratio' => 16 / 9,
                ],
                [
                    'name' => 'portrait',
                    'ratio' => 3 / 5,
                ],
            ],
        ],
    ];

    public function municipalities(): MorphToMany
    {
        return $this->morphedByMany(Municipality::class, 'link', 'news_item_links', 'id');
    }

    public function pages(): MorphToMany
    {
        return $this->morphedByMany(Page::class, 'link', 'news_item_links', 'id');
    }

    public function farmers(): MorphToMany
    {
        return $this->morphedByMany(Farmer::class, 'link', 'news_item_links', 'id');
    }
}
