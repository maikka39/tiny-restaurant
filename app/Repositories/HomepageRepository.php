<?php

namespace App\Repositories;

use A17\Twill\Models\Setting;
use Illuminate\Config\Repository as Config;

class HomepageRepository extends ModuleRepository
{
    /**
     * @param Setting $model
     * @param Config $config
     */
    public function __construct(Setting $model, Config $config)
    {
        
    }

    public function getFormFields($section = null)
    {
        $fields = '';
        return $fields;
    }

    public function getJsonRepeater($fields, $repeaterName) {
		$repeatersConfig = config('twill.block_editor.repeaters');

        
    }


    public function saveAll($settingsFields, $section = null)
    {       
        //Hier je custom repeater save
    }
}