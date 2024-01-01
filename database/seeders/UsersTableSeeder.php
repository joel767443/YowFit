<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'user_type_id' => 1,
        ]);

        Setting::create([
            'user_id' => $user->id,
            'hours_sleep' => 8,
            'sleeping_time' => '10:00',
            'wakeup_time' => '6:00',
            'weighing_frequency' => 'Weekly',
            'exercises_per_day' => 3,
        ]);

        foreach (range(1, 5) as $ignored) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'user_type_id' => 2,
            ]);
            Setting::create(['user_id' => $user->id]);
        }
    }
}
