<?php

namespace Tests\Unit;

use App\Author;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function a_name_is_required_to_create_an_author()
    {
        Author::firstOrCreate([
            'name'  =>  'Author Name',
        ]);
        $this->assertCount(1, Author::all());

    }
}
