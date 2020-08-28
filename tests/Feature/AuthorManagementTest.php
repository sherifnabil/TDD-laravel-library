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
        $response = $this->post('/author', [
            'dob'   =>  '16-02-1988',
            'name'  =>  'Author Name',
        ]);
        $author = Author::all();
        $this->assertCount(1, $author);
        $this->assertInstanceOf(Carbon::class, $author->first()->dob);
        $this->assertEquals('1988/16/02', $author->first()->dob->format('Y/d/m'));
    }
}
