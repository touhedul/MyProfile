<?php

namespace Tests\Feature\Frontend;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ResetPasswordNotification;
class AuthTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function user_can_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function user_cannot_login_with_incorrect_password()
    {
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'incorrect_password',
        ]);

        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }

    /** @test */
    public function user_cannot_login_with_nonexistent_email()
    {
        $response = $this->post('/login', [
            'email' => 'nonexistent@example.com',
            'password' => 'password123',
        ]);

        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }

    /** @test */
    public function user_can_logout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/logout');

        $response->assertRedirect('/');
        $this->assertGuest();
    }

    /** @test */
    public function user_can_register_with_valid_data()
    {
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '01833996321',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);
        
        $response->assertRedirect(route('admin.dashboard'));
        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
        $this->assertDatabaseHas('user_themes', ['user_id' => '11']);
    }

    /** @test */
    public function user_cannot_register_without_required_fields()
    {
        $response = $this->post('/register', []);

        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }

    /** @test */
    public function user_cannot_register_with_invalid_email()
    {
        $response = $this->post('/register', [
            'name' => 'Jane Smith',
            'email' => 'invalid_email',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    /** @test */
    public function user_cannot_register_with_mismatched_passwords()
    {
        $response = $this->post('/register', [
            'name' => 'Alice Johnson',
            'email' => 'alice@example.com',
            'password' => 'password123',
            'password_confirmation' => 'mismatched_password',
        ]);

        $response->assertSessionHasErrors(['password']);
    }


    /** @test */
    public function user_cannot_register_with_existing_email()
    {
        User::factory()->create(['email' => 'existing@example.com']);

        $response = $this->post('/register', [
            'name' => 'New User',
            'email' => 'existing@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    /** @test */
    public function user_can_request_password_reset_link()
    {
        $user = User::factory()->create();

        $this->post(route('password.email'), ['email' => $user->email])
            ->assertStatus(302)
            ->assertSessionHas('status');
    }
}
