<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
/**
 * Class UserSeeder
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Yoweli Kachala',
            'email' => 'admin@yohealth.com',
            'password' => Hash::make('123456789'),
            'user_type_id' => UserType::where('slug', 'admin')->first()->id,
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
