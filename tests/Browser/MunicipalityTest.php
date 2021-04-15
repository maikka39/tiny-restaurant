<?php

namespace Tests\Browser;

use A17\Twill\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MunicipalityTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed --class=SuperAdminSeeder');
    }

    /**
     * @test admin_can_create_municipality
     * @group Municipalities
     *
     * @return void
     */
    public function admin_can_create_municipality()
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
                ->visit('/admin/municipalities')
                ->click('.button--validate')
                ->assertSee('Permalink')
                ->type('title', 'Laarbeek')
                ->pause(500)
                ->press('Aanmaken');

            //Editing the content of the municipality
            $browser
                ->waitForReload()
                ->assertUrlIs(config('app.url') . '/admin/municipalities/1/edit')
                ->type('description', 'Dit is voor de gemeente Laarbeek, de groenste gemeente van Europa!')
                ->click('.switcher__button')
                ->press('Publiceren');

            $browser
                ->visit('/gemeente/laarbeek')
                ->assertSee('Laarbeek');
        });
    }
}
