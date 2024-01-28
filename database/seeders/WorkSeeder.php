<?php

namespace Database\Seeders;

use App\Models\Work;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Class WorkSeeder
 */
class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workTypes = [
            "Personal" => "Personal site or systems.",
            "Freelance" => "After hours paid work.",
            "Job" => "Working for a company",
        ];

        foreach ($workTypes as $workType => $description) {
            Work::create([
                'name' => $workType,
                'slug' => Str::slug($workType),
                'description' => $description,
            ]);
        }
    }
}
