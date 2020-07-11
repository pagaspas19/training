<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostCommentTest extends TestCase
{


    /** @test */
    public function a_user_can_comment_on_article()
    {
        $this->withoutExceptionHandling();

    
        //given
        $comment = [
            'message' => 'My Comment',
            'user_id' => '1',
            'article_id' => '1'
        ];

        //when
        $response = $this->post('/comments', $comment);

        //then
        $this->assertDatabaseHas('comments', $comment);

    }
}
