<?php

namespace Tests\Feature\Frontend;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ResetPasswordNotification;
use App\Services\UserService;
use Illuminate\Support\Facades\Artisan;

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
        $user = User::where('email','john@example.com')->first();
        $this->assertDatabaseHas('user_themes', ['user_id' => $user->id]);
        $this->assertDatabaseHas('sitelinks', ['user_id' => $user->id]);
        $this->assertDatabaseHas('user_menus', ['user_id' => $user->id]);
        $this->assertDatabaseHas('homes', ['user_id' => $user->id]);
        $this->assertDatabaseHas('abouts', ['user_id' => $user->id]);
        $this->assertDatabaseHas('additional_infos', ['user_id' => $user->id]);
        $this->assertDatabaseHas('services', ['user_id' => $user->id]);
        $this->assertDatabaseHas('skills', ['user_id' => $user->id]);
        $this->assertDatabaseHas('projects', ['user_id' => $user->id]);
        $this->assertDatabaseHas('color_sections', ['user_id' => $user->id]);
        $this->assertDatabaseHas('courses', ['user_id' => $user->id]);
        $this->assertDatabaseHas('experiences', ['user_id' => $user->id]);
        $this->assertDatabaseHas('achievements', ['user_id' => $user->id]);
        $this->assertDatabaseHas('education', ['user_id' => $user->id]);
        $this->assertDatabaseHas('testimonials', ['user_id' => $user->id]);
        $this->assertDatabaseHas('clients', ['user_id' => $user->id]);
        $this->assertDatabaseHas('contactinfos', ['user_id' => $user->id]);
        $this->assertDatabaseHas('socials', ['user_id' => $user->id]);
    }





    /** @test */
    public function user_cannot_register_without_required_fields()
    {
        $response = $this->post('/register', []);

        $response->assertSessionHasErrors(['name', 'email', 'password','phone']);
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

    /** @test */
    public function user_can_create_profile()
    {
        $user = User::factory()->create();

        (new UserService)->createUserInfo($user);

        // $response = $this->actingAs($user)->post(route('admin.users.createProfile'), ['email' => $user->email]);
        // $response = $this->actingAs($this->admin)->post(route('admin.users.store', $data));


    }
}
