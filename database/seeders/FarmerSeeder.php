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
                'description' => 'Dit is een standaard beschrijving die aangemaakt wordt door de CMS van het tiny restaurant!', //replace with WYSIWYG description
                'address' => 'Vollenweg 3, Venhorst',
                'municipality' => 2
            ],[
                'name' => 'Hans van Lierop',
                'description' => 'Dit is een standaard beschrijving die aangemaakt wordt door de CMS van het tiny restaurant!', //replace with WYSIWYG description
                'address' => 'Derneffestraat 11b, Mariahout',
                'municipality' => 1
            ],
        );

        foreach ($farmers as $farmer) {
            $model = new Farmer();
            $model->name = $farmer["name"];
            $model->description = $farmer["description"];
            $model->address = $farmer["address"];
            $model->municipality_id = $farmer["municipality"];
            $model->published = true;
            $model->save();

            $slug = new FarmerSlug();
            $slug->slug = Str::slug($farmer["name"]);
            $slug->locale = 'en';
            $slug->active = true;
            $slug->farmer_id = $model->id;
            $slug->save();
        }
    }
}
