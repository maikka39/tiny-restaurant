<?php

namespace Database\Seeders;

use App\Models\Farmer;
use App\Models\Slugs\FarmerSlug;
use Carbon\Carbon;
use Illuminate\Support\Str;

class FarmerSeeder extends MediaSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $farmers = [[
                'name' => 'Ted van de Vossenberg',
                'description' => '<p>
                                    Wij zijn Ted en Nicoline Vaalburg en op ons bedrijf wordt er met passie knolselderij, aardappelen en pompoenen geteeld. De teelt bevindt zich in de Schermerpolder en omstreken. Het bedrijf zelf gevestigd in Zuidschermer. Zuidschermer ligt in de gemeente Alkmaar, midden in Noord-Holland en ligt ongeveer 4 meter onder zeeniveau.
                                    <br><br>
                                    Wij zijn gespecialiseerd in het telen, wassen en verpakken van knolselderij. We leveren de gewassen knolselderij jaarrond aan de vers markt (o.a. supermarkten en groothandels).
                                    <br><br>
                                    We telen onze producten op een duurzame manier en zorgen dat de bodem in topconditie is. De gangbare teelt wordt zo natuurlijk mogelijk gedaan, met zo min mogelijk gewasbeschermingsmiddelen. Deels telen we ook gecertificeerd biologisch: biologische knolselderij, biologische aardappelen en biologische pompoenen. Biologisch telen wordt volledig natuurlijk verzorgd en beschermd en vraagt daarom meer zorg en tijd voor de teelt.
                                  </p>',
                'summary' => 'Wij zijn Ted en Nicoline Vaalburg en op ons bedrijf wordt er met passie knolselderij, aardappelen en pompoenen geteeld. De teelt bevindt zich in de Schermerpolder en omstreken. Het bedrijf zelf gevestigd in Zuidschermer. Zuidschermer ligt in de gemeente Alkmaar, midden in Noord-Holland en ligt ongeveer 4 meter onder zeeniveau.',
                'address' => 'Vollenweg 3, Venhorst',
                'municipality' => 2,
            ], [
                'name' => 'Hans van Lierop',
                'description' => 'Dit is een standaard beschrijving die aangemaakt wordt door het CMS van het Tiny Restaurant!',
                'summary' => 'Dit is een korte beschrijving van de pagina en de informatie van Hans van Lierop',
                'address' => 'Derneffestraat 11b, Mariahout',
                'municipality' => 1,
            ],
        ];

        foreach ($farmers as $farmer) {
            $model = Farmer::create([
                'name' => $farmer['name'],
                'description' => $farmer['description'],
                'address' => $farmer['address'],
                'municipality_id' => $farmer['municipality'],
                'summary' => $farmer['summary'],
                'published' => true,
                'created_at' => Carbon::now()->subDays(random_int(50, 400)),
            ]);

            FarmerSlug::create([
                'slug' => Str::slug($farmer['name']),
                'locale' => 'en',
                'active' => true,
                'farmer_id' => $model->id,
            ]);

            $this->seed_media(
                "App\Models\Farmer",
                $model->id,
                'farmer_profile',
                preg_replace('/[^a-z]/', '_', strtolower($model->name)) . '.jpg',
                'Foto van ' . $model->name,
            );
        }
    }
}
