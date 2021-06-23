<?php

namespace Database\Seeders;

use App\Models\Municipality;
use App\Models\Project;
use App\Models\Slugs\ProjectSlug;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ProjectSeeder extends MediaSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [[
                'published' => '1',
                'name' => 'Proeverij Laarbeek',
                'active' => '0',
                'description' => '<p>Wij hebben een passie voor lekker eten en drinken en die delen we graag met jou! Bij het Tiny Restaurant krijg je de leukste proeverij in Laarbeek.</p>',
                'date' => Carbon::now()->addDays(random_int(1, 31)),
                'address' => '1111AA',
                'municipality_id' => '1',
                'keywords' => 'laarbeek proeverij eten drinken',
            ], [
                'published' => '1',
                'name' => 'Op bezoek bij de boer',
                'active' => '0',
                'description' => '<p>Boer Bart geeft een openhartig interview over duurzaam ondernemen.</p>',
                'date' => Carbon::now()->addDays(random_int(1, 31)),
                'address' => '1111AA',
                'municipality_id' => '1',
                'keywords' => 'boer bezoek interview ondernemen',
            ], [
                'published' => '1',
                'name' => 'Voedsel educatie',
                'active' => '0',
                'description' => '<p>Basisschool krijgt voedsel educatie</p>',
                'date' => Carbon::now()->addDays(random_int(1, 31)),
                'address' => '1111AA',
                'municipality_id' => '1',
                'keywords' => 'educatie voedsel basisschool',
            ], [
                'published' => '1',
                'name' => 'Waardevol ondernemen',
                'active' => '0',
                'description' => '<p>Wilt u als bedrijf ook het verschil maken en waardevol ondernemen door naar uw doelgroep toe te gaan?</p>',
                'date' => Carbon::now()->addDays(random_int(1, 31)),
                'address' => '1111AA',
                'municipality_id' => '1',
                'keywords' => 'ondernemen waardevik',
            ], [
                'published' => '1',
                'name' => 'Onze nieuwe partner',
                'active' => '0',
                'description' => '<p>Leer onze nieuwe partner kennen uit Laarbeek!</p>',
                'date' => Carbon::now()->subDays(random_int(1, 10)),
                'address' => '1111AA',
                'municipality_id' => '1',
                'keywords' => 'partner nieuw laarbeek',
            ], [
                'published' => '1',
                'name' => 'Proeverij Boekel',
                'active' => '0',
                'description' => '<p>Wij hebben een passie voor lekker eten en drinken en die delen we graag met jou! Bij het Tiny Restaurant krijg je de leukste proeverij in Boekel.</p>',
                'date' => Carbon::now()->subDays(random_int(1, 10)),
                'address' => '1111AA',
                'municipality_id' => '2',
                'keywords' => 'boekel proeverij eten drinken',
            ],
        ];

        foreach ($projects as $project) {
            $model = Project::create([
                'published' => $project['published'],
                'name' => $project['name'],
                'active' => $project['active'],
                'description' => $project['description'],
                'date' => $project['date'],
                'address' => $project['address'],
                'keywords' => 'project ' . $project['keywords'],
            ]);

            $municipality = Municipality::find($project['municipality_id']);
            $model->municipalities()->attach($municipality, [
                'position' => 1,
            ]);

            ProjectSlug::create([
                'slug' => Str::slug($project['name']),
                'locale' => 'en',
                'active' => true,
                'project_id' => $model->id,
            ]);

            $this->seed_media(
                "App\Models\Project",
                $model->id,
                'project_image',
                preg_replace('/[^a-z]/', '_', strtolower($model->name)) . '.jpg',
                'Foto van ' . $model->name,
            );
        }
    }
}
