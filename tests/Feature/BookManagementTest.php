<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Book;

class BookManagementTest extends TestCase
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
        
        $book = Book::first();
        $this->assertCount(1, Book::all());
        $response->assertRedirect($book->path());
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
        $response = $this->patch($book->path(), [
            'title' => 'new Title',
            'author' => 'new Author',
        ]);
        $this->assertEquals('new Title', Book::first()->title);
        $this->assertEquals('new Author', Book::first()->author);
        $response->assertRedirect($book->fresh()->path());
    }

    /** @test */
    public function a_book_can_be_deleted()
    {
        $this->post('/books', [
            'title' => 'Book Title',
            'author' => 'Sherif',
        ]);
        $book = Book::first();
        $response = $this->delete($book->path());
        $this->assertCount(0, Book::all());
        $response->assertRedirect('/books');
    }
}
