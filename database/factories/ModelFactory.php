<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Post::class, function (Faker $faker) {
    //$title = $faker->sentence(rand(3,8), true);
	$txt = $faker->realText(rand(300,1000));
	//$isPublished = rand(1,5) > 1;
	
	$createdAt = $faker->dateTimeBetween('-3 months','-2 months');
	
	$data = [
		'user_id' => 1,
		'body' => $txt,
		'created_at' => $createdAt,
		'updated_at' => $createdAt,
	];
	
	return $data;
});
