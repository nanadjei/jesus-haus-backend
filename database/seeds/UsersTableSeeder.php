<?php

use App\Models\Role;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $me = User::create([
            'role_id' => Role::where('slug', 'super-admin')->first()->id,
            'first_name' => "Elvis",
            'last_name' => "Adjei Nti",
            'email' => "nana.elvee@gmail.com",
            'email_verified_at' => now(),
            'last_login' => now()->subMinutes($faker->numberBetween(10, 18)),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $me = User::create([
            'role_id' => Role::where('slug', 'admin')->first()->id,
            'first_name' => "Nii",
            'last_name' => "Okai",
            'email' => "nii@gmail.com",
            'email_verified_at' => now(),
            'last_login' => now()->subMinutes($faker->numberBetween(10, 18)),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $fakeUsers = factory(User::class, 10)->create();
    }
}
