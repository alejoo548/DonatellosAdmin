<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_log_in_and_keep_session(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => Hash::make('secret123'),
            'role' => 'admin',
        ]);

        $response = $this
            ->withSession(['_token' => 'test-token'])
            ->post(route('login.store'), [
                '_token' => 'test-token',
                'email' => 'admin@example.com',
                'password' => 'secret123',
            ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user);
    }
}
