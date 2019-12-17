<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Cashflow;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Cashflow::class, function (Faker $faker) {
    return [
        "category_id" => function ($cashflow) {
            return ($cashflow["type"] == "income") ? Category::cashFlow()->inRandomOrder()->first()->id : Category::utility()->inRandomOrder()->first()->id;
        },
        "staff_id" => User::whereHas("role")->inRandomOrder()->first()->id,
        "type" => $faker->randomElement(["income", "expense"]),
        "description" => $faker->text,
        "amount" => $faker->randomElement(["470.00", "220.00", "520.00", "650.00", "180.00", "300.00", "380.00", "6500.00", "1400.00", "280.00", "500.00", "750.00", "250.00"]),
        "receiver_or_giver" => function ($cashflow) use ($faker) {
            if ($cashflow['type'] == "expense") {
                if ($cashflow["category_id"] == Category::utility()->where('slug', "light-bill")->first()->id) {
                    return "ECG - " . $faker->randomElement(["Mr.", "Mrs.", "Miss"]) . " " . $faker->name;
                }
                return "Ghana Water - " . $faker->randomElement(["Mr.", "Mrs.", "Miss"]) . " " . $faker->name;
            }
            return $faker->randomElement(["Mr.", "Mrs.", "Miss"]) . " " . $faker->name;
        },
        "as_at" => now()->subDays($faker->numberBetween(1, 20))->subMinutes($faker->numberBetween(2, 30))
    ];
});
