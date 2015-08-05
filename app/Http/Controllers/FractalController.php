<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Fractal
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class FractalController extends Controller
{
    public function showCollection()
    {
    	// Create a top level instance somewhere
		$fractal = new Manager();

		// Get data from some sort of source
		// Most PHP extensions for SQL engines return everything as a string, historically
		// for performance reasons. We will fix this later, but this array represents that.
		$books = [
			[
				'id' => '1',
				'title' => 'Hogfather',
				'yr' => '1998',
				'author_name' => 'Philip K Dick',
				'author_email' => 'philip@example.org',
			],
			[
				'id' => '2',
				'title' => 'Game Of Kill Everyone',
				'yr' => '2014',
				'author_name' => 'George R. R. Satan',
				'author_email' => 'george@example.org',
			]
		];

		$resource = new Collection($books, function(array $book) {
	    return [
		        'id'      => (int) $book['id'],
		        'title'   => $book['title'],
		        'year'    => (int) $book['yr'],
		        'author'  => [
		        	'name'  => $book['author_name'],
		        	'email' => $book['author_email'],
		        ],
		        'links'   => [
		            [
		                'rel' => 'self',
		                'uri' => '/books/'.$book['id'],
		            ]
		        ]
		    ];
		});

		$array = $fractal->createData($resource)->toArray();

		echo $fractal->createData($resource)->toJson();
    }

    public function showItem()
    {
    	// Create a top level instance somewhere
		$fractal = new Manager();

    	$books = [
    		'id' => '1',
			'title' => 'Hogfather',
			'yr' => '1998',
			'author_name' => 'Philip K Dick',
			'author_email' => 'philip@example.org'
		];

    	$resource = new Item($books, function(array $book) {
		    return [
		        'id'      => (int) $book['id'],
		        'title'   => $book['title'],
		        'year'    => (int) $book['yr'],
		        'author'  => [
		        	'name'  => $book['author_name'],
		        	'email' => $book['author_email'],
		        ],
		        'links'   => [
		            [
		                'rel' => 'self',
		                'uri' => '/books/'.$book['id'],
		            ]
		        ]
		    ];
		});

		echo $fractal->createData($resource)->toJson();
    }
}
