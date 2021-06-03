<?php

namespace Tests\Browser;

use A17\Twill\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class StaticPageTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('twill:update');
        $this->artisan('db:seed --class=SuperAdminSeeder');
        $this->artisan('db:seed --class=HomepageSeeder');
    }

    /**
     * This is a test for creating static page.
     * This test includes logging in as admin, creating the actual page,
     * editing the page that was create, and finally testing if the
     * page can be visited on the website.
     *
     * @test admin_can_create_static_page
     * @group StaticPage
     *
     * @return void
     */
    public function adminCanCreateStaticPage()
    {
        $user = User::find(1);
        $this->browse(function (Browser $browser) use ($user) {
            //TWILL login
            $browser
                ->visit('/admin')
                ->type('email', $user->email)
                ->type('password', 'dev123')
                ->click('.login__button');

            //Creation of contact page
            $browser
                ->visit('/admin/pages')
                ->click('.button--validate')
                ->assertSee('Permalink')
                ->type('title', 'Contact')
                ->pause(500)
                ->press('Aanmaken');

            //Editing the content of the contact page
            $pageDescription = 'Dit is de beschrijving voor de contact pagina';
            $browser
                ->waitForReload()
                ->assertUrlIs(config('app.url') . '/admin/pages/1/edit')
                ->click('.ql-editor')
                ->driver->getKeyboard()->sendKeys($pageDescription);

            //Drag en Drop and Publish
            $browser
                ->clickLink('Open in editor')
                ->pause(250)
                ->drag('[data-title="Contactformulier"]', '.editorPreview__content')
                ->pause(250)
                ->press('Close')
                ->click('.switcher__button')
                ->press('Publiceren');

            //Check if pages work
            $browser
                ->visit('/contact')
                ->visit('/admin/pages/1/edit')
                ->assertSee($pageDescription);
        });
    }
}
