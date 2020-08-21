<?php

namespace Tests\Feature;

use App\Author;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;
   
    /** @test */
    public function an_author_can_be_created()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/author', [
            'dob'   =>  '16/02/1988',
            'name'  =>  'Author Name',
        ]);
        $author = Author::all();
        $this->assertCount(1, $author);
        $this->assertEquals('16/02/1988', $author->first()->dob);
    }
}
