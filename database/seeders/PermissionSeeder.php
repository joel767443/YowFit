<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionSeeder
 */
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permissions
        Permission::create(['name' => 'access-exercises']);
        Permission::create(['name' => 'access-meals']);
        Permission::create(['name' => 'access-users']);
        Permission::create(['name' => 'access-exercise-types']);

        // Assign Permissions to Roles
        Role::findByName('admin')->givePermissionTo(['access-exercises', 'access-meals', 'access-users', 'access-exercise-types']);

        $user = User::where('email', 'test-admin@yowfit.com')->first();
        $role = Role::where('name', 'Admin')->first();

        if ($user && $role) {
            $user->assignRole($role);
        }
    }
}
