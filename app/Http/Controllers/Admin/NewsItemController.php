<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Models\NewsItem;
use App\Notifications\NewsItemPosted;
use Illuminate\Notifications\Notification;

class NewsItemController extends ModuleController
{
    protected $disableEditor = true;
    protected $titleColumnKey = 'title';
    protected $moduleName = 'newsItems';
    protected $previewView = 'site.news';
    protected $defaultIndexOptions = [
        'create' => true,
        'edit' => true,
        'publish' => true,
        'bulkPublish' => true,
        'feature' => false,
        'bulkFeature' => false,
        'restore' => true,
        'bulkRestore' => true,
        'forceDelete' => true,
        'bulkForceDelete' => true,
        'delete' => true,
        'duplicate' => false,
        'bulkDelete' => true,
        'reorder' => false,
        'permalink' => false,
        'bulkEdit' => true,
        'editInModal' => false,
        'skipCreateModal' => false,
    ];
    protected $indexColumns = [
        'description' => [
            'title' => 'Beschrijving',
            'field' => 'description',
            'sort' => true,
        ],
        'updated_at' => [
            'title' => 'Laatst gewijzigd',
            'field' => 'updated_at',
            'sort' => true,
        ],
        'title' => [
            'title' => 'Titel',
            'field' => 'title',
            'sort' => true,
        ],
    ];

    protected function previewData($item): array
    {
        $newsItems = $this->repository
            ->get()
            ->sortByDesc(function ($newItem) {
                return $newItem->updated_at;
            });

        return [
            'preview' => true,
            'newsItems' => $newsItems,
        ];
    }

    public function view()
    {
        $publishedNewItems = NewsItem::query()
            ->where('published', true)
            ->get()
            ->sortByDesc(function ($newItem) {
                return $newItem->created_at;
            });

        if (request()->has('search') && null != request()->query('search')) {
            $publishedNewItems = $publishedNewItems->filter(function ($newsItem, $key) {
                return $newsItem->filter(request()->query('search'));
            })->all();
        }

        return view('site.news')
            ->with('newsItems', $publishedNewItems);
    }

    public function detail(NewsItem $newsItem)
    {
        return view('site.news-detail')
            ->with('news', $newsItem);
    }

    public function update($id, $submoduleId = null)
    {
        $response = parent::update($id, $submoduleId);

        $newsItem = NewsItem::find($id);
        if($newsItem->published){ //TODO add better check
            $newsItem->notify(new NewsItemPosted($newsItem));
        }

        return $response;
    }
}
