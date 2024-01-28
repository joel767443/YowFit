<?php

namespace Tests\Unit\Controllers\Web;

use App\Services\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

/**
 * Class SiteControllerTest
 */
class SiteControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        Route::middleware(['web'])->group(base_path('routes/web.php'));
    }

    /** @test */
    public function it_displays_site_index_page()
    {
        $response = $this->get(route('site.index'));

        $response->assertStatus(200);
        $response->assertViewIs('site.index');
    }

    /** @test */
    public function it_sends_mail_on_post_request()
    {
        $fakeRequestData = [
            "name" => "James Test",
            "email" => "test@james.com",
            "message" => "test message.",
        ];

        $response = $this->post(route('site.index'), $fakeRequestData);

        $response->assertStatus(200);
    }
}
