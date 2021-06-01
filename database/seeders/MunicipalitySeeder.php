<?php

namespace Database\Seeders;

use App\Models\Municipality;
use App\Models\Slugs\MunicipalitySlug;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MunicipalitySeeder extends MediaSeeder
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
                'description' => 'Boekel had veel te lijden tijdens corona, maar onze boeren hebben het volgehouden!',
            ],
        );

        foreach ($municipalities as $municipality) {
            $model = Municipality::create([
                'title' => $municipality["title"],
                'description' => $municipality["description"],
                'published' => true
            ]);

            MunicipalitySlug::create([
                'slug' => Str::slug($municipality["title"]),
                'locale' => 'en',
                'active' => true,
                'municipality_id' => $model->id
            ]);

            $this->seed_media(
                "App\Models\Municipality",
                $model->id,
                "municipality_picture",
                preg_replace('/[^a-z]/', "_", strtolower($model->title)).".jpg",
                "Foto van ".$model->title,
            );
        }
    }
}
