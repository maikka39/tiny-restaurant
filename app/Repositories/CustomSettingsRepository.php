<?php

namespace App\Repositories;

use A17\Twill\Models\Setting;
use A17\Twill\Repositories\SettingRepository;
use Illuminate\Config\Repository as Config;

class CustomSettingRepository extends SettingRepository
{
    /**
     * @param Setting $model
     * @param Config $config
     */
    public function __construct(Setting $model, Config $config)
    {
        parent::__construct($model, $config);
    }

    public function saveAll($settingsFields, $section = null)
    {
        dd('test');
        parent::saveAll($settingsFields, $section);
        
        //Hier je custom repeater save
    }
}