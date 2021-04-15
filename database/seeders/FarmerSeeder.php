<?php

namespace Database\Seeders;

use App\Models\Farmer;
use App\Models\Slugs\FarmerSlug;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FarmerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $farmers = array([
                'name' => 'Ton van de Vossenberg',
                'description' => 'Dit is een standaard beschrijving die aangemaakt wordt door het CMS van het Tiny Restaurant!',
                'address' => 'Vollenweg 3, Venhorst',
                'municipality' => 2
            ],[
                'name' => 'Hans van Lierop',
                'description' => 'Dit is een standaard beschrijving die aangemaakt wordt door het CMS van het Tiny Restaurant!',
                'address' => 'Derneffestraat 11b, Mariahout',
                'municipality' => 1
            ],
        );

        foreach ($farmers as $farmer) {
            $model = Farmer::create([
                'name' => $farmer["name"],
                'description' => $farmer["description"],
                'address' => $farmer["address"],
                'municipality_id' => $farmer["municipality"],
                'published' => true
            ]);

            FarmerSlug::create([
                'slug' => Str::slug($farmer["name"]),
                'locale' => 'en',
                'active' => true,
                'farmer_id' => $model->id
            ]);
        }
    }
}
