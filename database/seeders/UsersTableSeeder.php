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
            'name' => 'Admin User',
            'email' => 'admin@yowfit.com',
            'password' => Hash::make('password'),
        ]);

        $normalUser = User::create([
            'name' => 'Normal User',
            'email' => 'normal@yowfit.com',
            'password' => Hash::make('password'),
        ]);

        if ($adminUser && $normalUser && $adminRole && $normalRole) {
            $adminUser->assignRole($adminRole);
            $normalUser->assignRole($normalRole);
        }
    }
}
