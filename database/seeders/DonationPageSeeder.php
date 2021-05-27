<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DonationPage;
use App\Models\DonationPageAmount;
use Illuminate\Support\Facades\Schema;

class DonationPageSeeder extends MediaSeeder
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
            'description' => 'Steun samen met anderen het Tiny Restaurant, zodat deze non-profit de boerensamenleving kan blijven helpen.',
            'published' => true,
        ]);

        DonationPageAmount::create([
            'amount' => 1.0,
            'position' => 1,
            'donation_page_id' => 1,
        ]);

        DonationPageAmount::create([
            'amount' => 2.5,
            'position' => 2,
            'donation_page_id' => 1,
        ]);

        DonationPageAmount::create([
            'amount' => 5.0,
            'position' => 3,
            'donation_page_id' => 1,
        ]);

        $this->seed_media(
            "App\Models\DonationPage",
            "donate_cover.jpg",
            "Donate cover image",
            1600,
            1200,
            [0, 112, 1598, 899],
            [0, 0, 1200, 1200],
            [0, 0, 1598, 1200],
        );
    }
}
