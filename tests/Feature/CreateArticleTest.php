<?php

namespace Tests\Feature;

use App\Article;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateArticleTest extends TestCase
{
    /** @test */
    public function a_user_can_go_to_create_form()
    {
        $this->signIn();

        $this->get('/articles/create')
            ->assertSeeText('Create article');
    }

    /** @test */
    public function a_user_can_create_new_article()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $article = factory(Article::class)->raw();

        $this->post('/articles', $article)
             ->assertRedirect('/articles/1');

        $this->assertDatabaseHas('articles', [
            'title' => $article['title'],
            'content' => $article['content'],
            'tag' => $article['tag'],
            'user_id' => auth()->user()->id
        ]);
    }
}
