<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Blogpost;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testNoBlogPostsWhenNothingInDataBase()
    {
        $response = $this->get('/posts');

        $response->assertSeeText('No Blog posts yet!');

    }

    public function testSee1BlogPostWhenThereIs1()
    {
        //arrange
        $post = new BlogPost();
        $post->title = 'New Title';
        $post->content = 'Content of the blog post';
        $post->save();

        //act
        $response = $this->get('/posts');

        //assert
        $response->assertSeeText('New Title');

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'New Title'

        ]);
        }

        public function testStoreValid()
        {
            $params = [
                'title' => 'Valid title',
                'content' => 'At least 10 Characters'
            ];

            $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

            $this->assertEquals(session('status'), 'Blog Post was created!');
        }

        //public function testStoreFail()
        //{
          //  $params = [
            //    'title' => 'x',
              //  'content' => 'x'
            //];

            //$this->post('/posts', $params)
            //->assertStatus(302)
            //->assertSessionHas('errors');

           // $messages = session('errors');
            //dd($messages->getMessages());

            //$this->assertEquals($messages['title'][0], 'validation.min.string');
            //$this->assertEquals($messages['content'][1], 'validation.min.string');



        //}

        public function testUpdateValid()
        {
            $post = new BlogPost();
            $post->title = 'New Title';
            $post->content = 'Content of the blog post';
            $post->save();

            $this->assertDatabaseHas('blog_posts', $post->toArray());
        }


        public function testDelete()
        {
            $post = $this->createDummyBlogPost();
            $this->delete("/posts/{$post->id}")
                 ->assertStatus(302)
                 ->assertSessionHas('status');

        }

        private function createDummyBlogPost(): BlogPost
        {
            $post = new BlogPost();
            $post->title = 'New Title';
            $post->content = 'Content of the blog post';
            $post->save();

            return $post;

        }



}
