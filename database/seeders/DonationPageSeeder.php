<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DonationPage;

class DonationPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DonationPage::create([
            'id' => 1,
            'title' => 'Steun het Tiny Restaurant',
            'description' => 'Steun samen met andere het Tiny Restaurant, zodat deze non-profit de boerensamenleving kan blijven helpen.',
            'published' => true,
        ]);
    }
}
