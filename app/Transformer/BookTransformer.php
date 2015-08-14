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
        /*$author = [
			'id' => '1',
			'author_name' => 'Philip K Dick',
			'author_email' => 'philip@example.org',
		];

		$author = (object) $author;*/

		$author = $book->author;

        return $this->item($author, new AuthorTransformer);
    }
}