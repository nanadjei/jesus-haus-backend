<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Member;
use App\Models\Department;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    return [
        "department_id" => Department::inRandomOrder()->first()->id, "type" => $faker->randomElement(["visitor", "member"]), "title" => $faker->title, "first_name" => $faker->firstName, "last_name" => $faker->lastName, "email" => $faker->safeEmail, "dob" => $faker->date, "phone" => "0" . $faker->randomElement([244, 242, 240, 241, 242, 540, 201, 271, 273]) . $faker->numberBetween(100000, 999999)
    ];
});
