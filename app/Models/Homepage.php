<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Model;

class Homepage extends Model
{
    use HasBlocks;
    use HasSlug;
    use HasMedias;
    use HasRevisions;

    protected $fillable = [
        'published',
        'title',
        'slogan',
        'button_text',
        'button_url',
        'category',
        'keywords',
    ];

    public $slugAttributes = [
        'title',
    ];

    public $mediasParams = [
        'hero' => [
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

    public function homepage_link_items()
    {
        return $this->hasMany(HomepageLinkItem::class)->where('deleted_at', null);
    }

    public function partner_items()
    {
        return $this->hasMany(HomepagePartnerItem::class)->where('deleted_at', null);
    }
}
