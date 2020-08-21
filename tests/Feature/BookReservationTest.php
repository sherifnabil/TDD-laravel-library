<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Book;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;
    /** 
     * @test
    **/

    public function a_book_can_be_added_to_the_library()
    {
        $this->withoutExceptionHandling();
       
        $response = $this->post('books', [
            'title' => 'Book Title',
            'author' => 'Sherif',
        ]);
        $response->assertOk();
        $this->assertCount(1, Book::all());
    }

    /** @test */
    public function a_title_is_required()
    {
       
        $response = $this->post('/books', [
            'title' => '',
            'author' => 'Sherif',
        ]);

        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function an_author_is_required()
    {
        $response = $this->post('/books', [
            'title' => 'Book Title',
            'author' => '',
        ]);

        $response->assertSessionHasErrors('author');
    }

    /** @test */
    public function a_book_can_be_updated()
    {
        $this->post('/books', [
            'title' => 'Book Title',
            'author' => 'Sherif',
        ]);
        $book = Book::first();
        $response = $this->patch('/books/'. $book->id, [
            'title' => 'new Title',
            'author' => 'new Author',
        ]);
        $this->assertEquals('new Title', Book::first()->title);
        $this->assertEquals('new Author', Book::first()->author);
    }
}
