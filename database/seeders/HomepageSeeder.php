<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Homepage;

class HomepageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Homepage::class::create([
            'id' => 1,
            'title' => 'Homepage',
            'banner' => 'Test desc.',
            'published' => true
        ]);
    }
}
