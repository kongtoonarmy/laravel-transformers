<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Book;

use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		
		DB::statement('SET FOREIGN_KEY_CHECKS = 0'); 
		Book::truncate();
		$faker = Faker::create();

		for ($i=1; $i<=30; $i++) {
			Book::create([
				'title' => $faker->sentence(),
	            'description' => $faker->sentence(),
	            'author' => $faker->name
	        ]);
		}
		
	}

}
