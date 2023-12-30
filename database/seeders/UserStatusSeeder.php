<?php

namespace Database\Seeders;

use App\Models\UserStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Class UserStatusSeeder
 */
class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userStatuses = [
            'New',
            'Active',
            'Suspended',
        ];

        foreach ($userStatuses as $status) {
            UserStatus::create([
                'name' => $status,
                'slug' => Str::slug($status),
            ]);
        }
    }
}
