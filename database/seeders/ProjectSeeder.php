<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Municipality;
use App\Models\Slugs\ProjectSlug;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = array([
                'published' => '1',
                'name' => 'Project A',
                'active' => '0',
                'description' => '<p>Welkom in de Blackboard course voor SOPRJ8. Je bent automatisch geenrolled en toegevoegd aan je projectgroep zoals deze in de SOPRJ7 blackboard course zat. Mocht dit onjuist zijn, laat dit dan even aan mij (Rik Meijer) even weten.</p><p>Verder wensen wij je weer veel leerzaam plezier komende weken!</p>',
                'date' => '2021-04-15 12:00:00',
                "address" => '1111AA',
                "municipality_id" => '1'
            ],[
                'published' => '1',
                'name' => 'Project B',
                'active' => '0',
                'description' => '<p>Welkom in de Blackboard course voor SOPRJ8. Je bent automatisch geenrolled en toegevoegd aan je projectgroep zoals deze in de SOPRJ7 blackboard course zat. Mocht dit onjuist zijn, laat dit dan even aan mij (Rik Meijer) even weten.</p><p>Verder wensen wij je weer veel leerzaam plezier komende weken!</p>',
                'date' => '2021-04-15 12:00:00',
                "address" => '1111AA',
                "municipality_id" => '1'
            ],[
                'published' => '1',
                'name' => 'Project C',
                'active' => '0',
                'description' => '<p>Welkom in de Blackboard course voor SOPRJ8. Je bent automatisch geenrolled en toegevoegd aan je projectgroep zoals deze in de SOPRJ7 blackboard course zat. Mocht dit onjuist zijn, laat dit dan even aan mij (Rik Meijer) even weten.</p><p>Verder wensen wij je weer veel leerzaam plezier komende weken!</p>',
                'date' => '2021-04-15 12:00:00',
                "address" => '1111AA',
                "municipality_id" => '1'
            ],[
                'published' => '1',
                'name' => 'Project D',
                'active' => '0',
                'description' => '<p>Welkom in de Blackboard course voor SOPRJ8. Je bent automatisch geenrolled en toegevoegd aan je projectgroep zoals deze in de SOPRJ7 blackboard course zat. Mocht dit onjuist zijn, laat dit dan even aan mij (Rik Meijer) even weten.</p><p>Verder wensen wij je weer veel leerzaam plezier komende weken!</p>',
                'date' => '2021-04-15 12:00:00',
                "address" => '1111AA',
                "municipality_id" => '1'
            ],[
                'published' => '1',
                'name' => 'Project E',
                'active' => '0',
                'description' => '<p>Welkom in de Blackboard course voor SOPRJ8. Je bent automatisch geenrolled en toegevoegd aan je projectgroep zoals deze in de SOPRJ7 blackboard course zat. Mocht dit onjuist zijn, laat dit dan even aan mij (Rik Meijer) even weten.</p><p>Verder wensen wij je weer veel leerzaam plezier komende weken!</p>',
                'date' => '2021-04-15 12:00:00',
                "address" => '1111AA',
                "municipality_id" => '1'
            ],[
                'published' => '1',
                'name' => 'Project AA',
                'active' => '0',
                'description' => '<p>Welkom in de Blackboard course voor SOPRJ8. Je bent automatisch geenrolled en toegevoegd aan je projectgroep zoals deze in de SOPRJ7 blackboard course zat. Mocht dit onjuist zijn, laat dit dan even aan mij (Rik Meijer) even weten.</p><p>Verder wensen wij je weer veel leerzaam plezier komende weken!</p>',
                'date' => '2021-04-15 12:00:00',
                "address" => '1111AA',
                "municipality_id" => '2'
            ],
        );

        foreach ($projects as $project) {
            $model = Project::create([
                'published' => $project["published"],
                'name' => $project["name"],
                'active' => $project["active"],
                'description' => $project["description"],
                'date' => $project["date"],
                "address" => $project["address"]
            ]);

            
            $municipality = Municipality::find($project["municipality_id"]);
            $model->municipalities()->attach($municipality, [
                'position' => 1
            ]);

            ProjectSlug::create([
                'slug' => Str::slug($project["name"]),
                'locale' => 'en',
                'active' => true,
                'project_id' => $model->id
            ]);
        }
    }
}
