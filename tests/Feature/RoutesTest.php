<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    use RefreshDatabase;
//
    public function test_home_screen_shows_welcome()
    {
        $response = $this->get('/');

        $response->assertViewIs('welcome');
        $response->assertViewHas('pageTitle', 'Homepage');
    }

    public function test_user_page_existing_user_found()
    {
        $user = User::factory()->create();

        $response = $this->get('/user/' . $user->name);

        $response->assertOk();
        $response->assertViewIs('users.show');
    }

    public function test_user_page_nonexiting_user_not_found()
    {
        $response = $this->get('/user/' . rand(0, 3));
        $response->assertViewIs('users.notfound');
    }

    public function test_task_crud_is_working()
    {
        $user = User::factory()->create();

        // non auth can not go to articles -> redirect to login
        $response = $this->get('/app/articles');
        $response->assertRedirect('login');

        // user can go to articles
        $response = $this->actingAs($user)->get('/app/articles');
        $response->assertOk();

        Auth::logout();
        // non auth can not go to articles -> redirect to login
        $response = $this->get('/app/articles/create');
        $response->assertRedirect('login');

        // user can create article
        $this->actingAs($user);
        $response = $this->get('/app/articles/create');
        $response->assertOk();

        $createdArticle = rand(0, 5);
        $response = $this->post('/app/articles', ['title' => $createdArticle]);
        $response->assertRedirect('app/articles');
        $this->assertDatabaseHas(Article::class, ['title' => $createdArticle]);

        // user can update article
        $oldArticle = Article::where('title', $createdArticle)->first();

        $response = $this->get('/app/articles/' . $oldArticle->id);
        $response->assertOk();
        $response = $this->get('/app/articles/' . $oldArticle->id . '/edit');
        $response->assertOk();

        $updatedArticle = rand(0, 5);
        $response = $this->put('/app/articles/' . $oldArticle->id, ['title' => $updatedArticle]);
        $response->assertRedirect('app/articles');
        $this->assertDatabaseMissing(Article::class, ['title' => $oldArticle->title]);
        $this->assertDatabaseHas(Article::class, ['title' => $updatedArticle]);

        // user can delete article
        $response = $this->delete('/app/articles/' . $oldArticle->id);
        $response->assertRedirect('app/articles');
        $this->assertDatabaseMissing(Article::class, ['title' => $updatedArticle]);
    }
}
