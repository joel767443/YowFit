<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Class UserSeeder
 */
class UserTypeSeeder extends Seeder
{

    /**
     * @var array
     */
    private array $userTypes = [
        "admin",
        "normal",
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->userTypes as $type) {
            DB::table('user_types')->insert([
                'name' => $type,
                'slug' => Str::slug($type),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
