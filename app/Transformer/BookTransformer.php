<?php namespace App\Transformer;

use League\Fractal\TransformerAbstract;

// Models
use App\Models\Book;

class BookTransformer extends TransformerAbstract
{
	protected $availableIncludes = [
        'author'
    ];

	public function transform(Book $book)
	{
	    return [
	        'id' => (int) $book->id,
	        'title' => $book->title,
	        'description' => $book->description,
	        'author' => $book->author
	    ];
	}

	public function includeAuthor(Book $book)
    {
        $author = $book->author;

        return $this->item($author, new AuthorTransformer);
    }
}