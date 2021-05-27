<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Project extends Model 
{
    use HasBlocks, HasSlug, HasMedias, HasRevisions;

    protected $fillable = [
        'published',
        'name',
        'description',
        'active',
        'date',
        'address'
    ];
    
    public $slugAttributes = [
        'name',
    ];

    public $browsers = [
        'municipalities',
        'farmers'
    ];
    
    public $mediasParams = [
        'project_image' => [
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

    public function farmers() 
    {
        return $this->morphedByMany(Farmer::class, 'involved', 'project_involved');
    }

    public function municipalities() 
    {
        return $this->morphedByMany(Municipality::class, 'involved', 'project_involved', 'project_id', 'involved_id', null, null );
    }

    public function getCreatedDateForView(): string
    {
        return $this->created_at->isoFormat('D MMMM YYYY');
    }

    public function getCreatedTimeForView(): string
    {
        return $this->created_at->isoFormat('hh.mm');
    }

    public function filter($search): bool
    {
        $search = Str::lower($search);
        return
            Str::contains(Str::lower($this->name), $search) ||
            Str::contains(Str::lower($this->description), $search) ||
            Str::contains(Str::lower($this->getCreatedTimeForView()), $search) ||
            Str::contains(Str::lower($this->municipalities->first()->name), $search);
    }
}
