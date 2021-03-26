<?php

namespace Database\Seeders;

use App\Models\Municipality;
use App\Models\Slugs\MunicipalitySlug;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipalities = array([
                'title' => 'Laarbeek',
                'description' => 'Dit is de pagina van gemeente Laarbeek, de groenste gemeente van Europa, en het thuisfront van het Tiny Restaurant!',
            ],[
                'title' => 'Boekel',
                'description' => 'Boekel had veel te leiden tijdens corona, maar onze boeren hebben het volgehouden!',
            ],
        );

        foreach ($municipalities as $municipality) {
            $model = new Municipality();
            $model->title = $municipality["title"];
            $model->description = $municipality["description"];
            $model->published = true;
            $model->save();

            $slug = new MunicipalitySlug();
            $slug->slug = Str::slug($municipality["title"]);
            $slug->locale = 'en';
            $slug->active = true;
            $slug->municipality_id = $model->id;
            $slug->save();
        }
    }
}
