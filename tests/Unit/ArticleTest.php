<?php

namespace Tests\Unit;

use App\Article;
use App\User;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    /** @test */
    public function an_article_should_have_an_author()
    {
        $user = factory(User::class)->create();

        $article = factory(Article::class)->create([
            'user_id' => $user->id
        ]);

        $this->assertInstanceOf(User::class, $article->author);
        $this->assertTrue($article->author->is($user));
    }
}
