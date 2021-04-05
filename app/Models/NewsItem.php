<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class NewsItem extends Model 
{
    use HasBlocks, HasMedias, HasRevisions;

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
        return $this->morphedByMany(Municipality::class, 'link', 'news_item_links', 'id')
            ->withPivot('position')
            ->withTimestamps();
    }

    public function pages(): MorphToMany
    {
        return $this->morphedByMany(Page::class, 'link', 'news_item_links', 'id')
            ->withPivot('position')
            ->withTimestamps();;
    }

    public function farmers(): MorphToMany
    {
        return $this->morphedByMany(Farmer::class, 'link', 'news_item_links', 'id')
            ->withPivot('position')
            ->withTimestamps();;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-y H:i');
    }

    public function getDescriptionAttribute($value)
    {
        //check for admin overview page
        if(url()->current() === config('app.url') . '/admin/newsItems') {
            return mb_strimwidth($value, 0, 50, "...");
        } else {
            return $value;
        }
    }

    public function getTimeSincePosted()
    {
        Carbon::setLocale('nl');
        return $this->created_at->longAbsoluteDiffForHumans(now(), 1);
    }
}
