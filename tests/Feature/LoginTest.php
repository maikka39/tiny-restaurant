<?php

namespace Tests\Feature;

use A17\Twill\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    private $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = User::create([
            'name' => "Admin",
            'email' => 'admin@admin.dev',
            'role' => 'SUPERADMIN',
            'published' => true,
            'password' => Hash::make('dev123'),
        ]);
        $this->followRedirects = true;
    }

    /**
     * @test test_login_screen_can_be_rendered
     * @group authentication-tests
     *
     * @return void
     */
    public function login_screen_can_be_rendered()
    {
        $response = $this->get('/admin');
        $response->assertSee('Login');
    }

    /**
     * test_admin_can_authenticate_using_the_login_screen
     * @group authentication-tests
     *
     * @return void
     */
    public function admin_can_authenticate_using_the_login_screen()
    {
        $this->assertGuest();

        $response = $this->post('admin/login', [
           'email' => $this->admin->email,
           'password' => 'dev123'
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    /**
     * @test test_users_can_not_authenticate_with_invalid_password
     * @group authentication-tests
     *
     * @return void
     */
    public function admin_can_not_authenticate_with_invalid_password()
    {
        $this->post('/admin/login', [
            'email' => $this->admin->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
