<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Models
use App\Models\Book;

// Fractal
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

// Transformer
use App\Transformer\BookTransformer;

class BookController extends Controller
{
    
    public function index()
    {
    	$books = Book::all();

    	$fractal = new Manager();

    	$resource = new Collection($books, function(Book $book) {
	    return [
		        'id' => (int) $book->id,
		        'title' => $book->title,
		        'description' => $book->description,
		        'author' => $book->author
		    ];
		});

		return $fractal->createData($resource)->toJson();
    }

    public function booksAllWithTransformer()
    {	
		$fractal = new Manager();

        $fractal->parseIncludes('author');

    	$books = Book::all();

    	$resource = new Collection($books, new BookTransformer);

    	return $fractal->createData($resource)->toJson();
    }

    public function bookItemWithTransformer()
    {	
		$fractal = new Manager();

    	$book = Book::all()->random(1);

    	$resource = new Item($book, new BookTransformer);

    	return $fractal->createData($resource)->toJson();
    }

}
