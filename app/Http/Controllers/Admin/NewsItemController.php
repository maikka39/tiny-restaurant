<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;

class NewsItemController extends ModuleController
{
    protected $permalinkBase = 'nieuws';
    protected $titleColumnKey = 'title';
    protected $moduleName = 'newsItems';
    protected $previewView = 'site.blocks.news_item';
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
    protected $browserColumns = [
        'pages' => [
            'title' => 'Pagina\'s',
            'relationship' => 'pages',
            'field' => 'title'
        ],
        'farmers' => [ // relation column
            'title' => 'Boeren',
            'relationship' => 'farmers',
            'field' => 'name'
        ],
        'municipalities' => [ // relation column
            'title' => 'Gemeentes',
            'relationship' => 'municipalities',
            'field' => 'title'
        ],
    ];
}
