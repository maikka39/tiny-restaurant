<?php

namespace Tests\Browser;

use A17\Twill\Models\User;
use App\Models\Municipality;
use App\Models\Slugs\MunicipalitySlug;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Str;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FarmerTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed --class=SuperAdminSeeder');
        $model = Municipality::create([
            'title' => 'Laarbeek',
            'description' => 'Laarbeek',
            'published' => true
        ]);

        MunicipalitySlug::create([
            'slug' => Str::slug('Laarbeek'),
            'locale' => 'en',
            'active' => true,
            'municipality_id' => $model->id
        ]);
    }

    /**
     * @test admin_can_create_farmer
     * @group Farmers
     *
     * @return void
     */
    public function admin_can_create_farmer()
    {
        $user = User::find(1);
        $this->browse(function (Browser $browser) use ($user) {
            //TWILL login
            $browser
                ->visit('/admin')
                ->type('email', $user->email)
                ->type('password', 'dev123')
                ->click('.login__button');

            $browser
                ->visit('/admin/farmers')
                ->click('.button--validate')
                ->assertSee('Permalink')
                ->type('name', 'Hans van Lierop')
                ->pause(500)
                ->press('Aanmaken');

            //Editing the content of the municipality
            $farmerDescription = "Dit is de pagina van Hans van Lierop";
            $browser
                ->waitForReload()
                ->assertUrlIs(config('app.url') . '/admin/farmers/1/edit')
                ->click('.ql-editor')
                ->driver->getKeyboard()->sendKeys($farmerDescription);

            $browser
                ->type('address', 'Ergens in Mariahout')
                ->click('.vs__selected-options')
                ->click('.dropdown-menu .highlight')
                ->click('.switcher__button')
                ->press('Publiceren')
                ->waitForText('Content saved. All good!');

            $browser
                ->visit('/boer/hans-van-lierop')
                ->waitForDialog()
                ->acceptDialog()
                ->assertUrlIs(config('app.url') . '/boer/hans-van-lierop');
        });
    }
}
