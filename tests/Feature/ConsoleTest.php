<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ConsoleTest extends TestCase
{
    use RefreshDatabase;

    public function test_send_email_to_user()
    {
        $user = User::factory()->create();

        $this->artisan("mail:send {$user->id}")->assertExitCode($user->id);
    }




}
