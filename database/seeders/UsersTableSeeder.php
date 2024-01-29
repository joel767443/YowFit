<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

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
        $adminRole = Role::where('name', 'Admin')->first();
        $normalRole = Role::where('name', 'Normal')->first();

        $adminUser = User::create([
            'name' => 'Test Admin',
            'email' => env('TEST_ADMIN_EMAIL'),
            'password' => Hash::make(env('TEST_PASSWORD')),
        ]);

        $normalUser = User::create([
            'name' => 'James Paterson',
            'email' => env('TEST_USER_EMAIL'),
            'password' => Hash::make(env('TEST_PASSWORD')),
        ]);

        if ($adminUser && $normalUser && $adminRole && $normalRole) {
            $adminUser->assignRole($adminRole);
            $normalUser->assignRole($normalRole);
        }
    }
}
