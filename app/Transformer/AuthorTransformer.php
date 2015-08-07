<?php namespace App\Transformer;

use League\Fractal\TransformerAbstract;

// Models
use App\Models\Book;

class AuthorTransformer extends TransformerAbstract
{

	public function transform($author)
	{
	    return [
	        'authorName' => $author->author_name,
	        'authorEmail' => $author->author_email
	    ];
	}
}