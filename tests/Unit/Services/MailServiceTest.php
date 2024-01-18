<?php

namespace Tests\Unit\Services;
use App\Services\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Tests\TestCase;

/**
 * Class MailServiceTest
 */
class MailServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_sends_mail_with_contact_content()
    {
        $requestData = [
            'contact' => true,
            'email' => 'test@example.com',
            'name' => 'John Doe',
            'message' => 'Test message',
        ];

        $request = new Request($requestData);

        // Act
        $mailService = new Mail();
        $response = $mailService->sendMail($request);

        // Assert
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals('Message sent', Session::get('message'));
    }
}
