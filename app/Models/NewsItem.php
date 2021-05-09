<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Model;
use A17\Twill\Services\FileLibrary\FileService;
use Carbon\Carbon;

class NewsItem extends Model 
{
    use HasBlocks, HasMedias, HasRevisions, HasFiles;

    protected $fillable = [
        'published',
        'title',
        'description',
        'summary',
    ];
    
    public $mediasParams = [
        'cover' => [
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

    public $filesParams = [
        'attachments'
    ];

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

    public function getCreatedTimeForView(): string
    {
        Carbon::setLocale('nl');
        return $this->created_at->isoFormat('dddd D MMMM YYYY, H:mm') . ' uur';
    }

    private $previewTypes = ['mp3', 'mp4', 'pdf'];
    public function getTwillFilesWithName(): array
    {
        $returnableObjects = [];
        foreach ($this->files as $file) {
            $fileObject["url"] = FileService::getUrl($file->uuid);
            $fileObject["filename"] = $file->filename;
            $fileType = explode('.', $file->filename);
            $fileObject["hasPreview"] = in_array(end($fileType), $this->previewTypes);
            array_push($returnableObjects, $fileObject);
        }
        return $returnableObjects;
    }
}
