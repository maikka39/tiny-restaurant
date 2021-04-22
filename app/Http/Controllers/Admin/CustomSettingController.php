<?php


namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\SettingController;
use App\Repositories\CustomSettingRepository;
use Illuminate\Config\Repository as Config;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\UrlGenerator;
use Illuminate\View\Factory as ViewFactory;

class CustomSettingController extends SettingController
{
    public function __construct(Config $config, CustomSettingRepository $settings, Redirector $redirector, UrlGenerator $urlGenerator, ViewFactory $viewFactory)
    {
        parent::__construct($config, $settings, $redirector, $urlGenerator, $viewFactory);
    }
}