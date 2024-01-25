<?php

namespace Database\Seeders;

use App\Models\Rest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restTypes = [
            "Break" => "Normal break",
            "Break - TV" => "Watching TV",
            "Break - Other" => "Other types of breaks",
        ];

        foreach ($restTypes as $restType => $description) {
            Rest::create([
                'name' => $restType,
                'slug' => Str::slug($restType),
                'description' => $description,
            ]);
        }
    }
}
