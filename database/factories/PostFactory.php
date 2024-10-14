<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        /* 'user_id'=>2,
        'tweet'=>"Lorem ipsum dolor sit amet
        consectetur adipisicing elit. Ut tenetur 
        ipsam asperiores soluta, aspernatur
         facilis dignissimos voluptatum ullam.
          Minus blanditiis voluptas reprehenderit
           non voluptatum explicabo,
        esse cumque recusandae alias maiores?" */
        'user_id'=>$faker->name,
        'tweet'=>$faker->paragraph
        //
    ];
});
