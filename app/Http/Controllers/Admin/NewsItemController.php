<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;

class NewsItemController extends ModuleController
{
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
}
