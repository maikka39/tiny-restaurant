<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Homepage;
use App\Models\HomepageSetting;
use App\Models\Link;

class HomepageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homepages = array([
            'name' => 'v1.0',
        ]);

        $settings = array([
            'key' => 'banner_title',
            'value' => 'TinyRestaurant'
        ],[
            'key' => 'banner_description',
            'value' => 'Welkom op de officiele pagina van TinyRestaurant!'
        ]);

        $links = array([
            'name' => 'Google',
            'url' => 'https://www.google.nl',
        ],[
            'name' => 'YouTube',
            'url' => 'https://www.youtube.com' 
        ]);

        foreach ($homepages as $homepage) {
            $model = Homepage::create($homepage);

            foreach($settings as $setting) {
                $setting = HomepageSetting::create([
                    'homepage_id' => $model->id,
                    'key' => $setting['key'],
                    'value' => $setting['value'],
                ]);
                $model->settings()->save($setting);
            }

            foreach($links as $link) {
                $link = Link::create($link);
                $model->links()->save($link);
            }
        }
    }
}
