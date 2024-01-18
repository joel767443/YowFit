<?php

namespace Tests\Unit\Models;

use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SettingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_format_sleeping_time_attribute()
    {
        $setting = Setting::factory()->create(['sleeping_time' => '22:30:00']);

        $formattedSleepingTime = $setting->sleeping_time;

        $this->assertEquals(Carbon::parse('22:30:00')->format('H:i'), $formattedSleepingTime);
    }

    /** @test */
    public function it_can_handle_array_for_exercise_times_attribute()
    {
        $user = User::factory()->create();
        $settingArray = Setting::create([
            'user_id' => $user->id,
            'exercise_times' => ['09:00:00', '13:00:00'],
        ]);

        $retrievedArray = Setting::find($settingArray->id);

        $this->assertEquals(['09:00:00', '13:00:00'], $retrievedArray->exercise_times);
    }
}
