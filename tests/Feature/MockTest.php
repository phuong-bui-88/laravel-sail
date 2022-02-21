<?php

namespace Tests\Feature;

use App\Mail\JustTesting;
use App\Models\Article;
use App\Models\User;
use App\Support\AnimalInterface;
use App\Support\ArticleRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Mockery\MockInterface;
use Tests\TestCase;
use Illuminate\Support\Facades\Cache;

class MockTest extends TestCase
{
    use RefreshDatabase;

    public function test_mock_static_cache()
    {
        $key = '1';
        Cache::shouldReceive('get')->once()->with($key)->andReturn('concat');

        $reponse = $this->get("/cache/{$key}");
        $reponse->assertNotFound();
    }

    public function test_mock_mail_fake()
    {
        $user = User::factory()->create();
        Mail::shouldReceive('send')->once()->withSomeOfArgs('emails.welcome', ['first_name' => 'foo', 'last_name' => 'bar', 'email' => $user->email]);

        $this->artisan("mail:send {$user->id}")->assertExitCode($user->id);
    }

    public function test_mock_service_fake()
    {
        $user = User::factory()->create();
        $article = Article::factory()->create();

        // user can update article via mock
        $this->actingAs($user);

        $this->instance(
            ArticleRepository::class,
            \Mockery::mock(ArticleRepository::class, function (MockInterface $mock) {
                $mock->shouldReceive('update')->once()->andReturn(333);
            })
        );

        $response = $this->put('/app/articles/' . $article->id, ['title' => 'updated is changed']);
        $response->assertRedirect('app/articles');
    }

    public function test_mock_service_fake_2()
    {
        $user = User::factory()->create();
        $article = Article::factory()->create();

        // user can update article via mock
        $this->actingAs($user);

        $mock = $this->mock(ArticleRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('update')->once()->andReturn(333);
        });

        $response = $this->put('/app/articles/' . $article->id, ['title' => 'updated is changed']);
        $response->assertRedirect('app/articles');
    }

    public function test_mock_service_container()
    {
        $value = 'dog';

        $this->mock(AnimalInterface::class, function ($mock) use ($value) {
            $mock->shouldReceive('sayHello')->once()->andReturn($value);
        });

        $response = $this->get('/hello');
        $response->assertSeeText($value);
    }

}
