<?php

namespace Tests\Unit\Services;
use App\Services\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\RedirectResponse;
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
        $this->sendMail(true);
    }

    /** @test */
    public function it_sends_mail_without_contact_content()
    {
        $this->sendMail();
    }

    /**
     * @param bool $contact
     * @return void
     */
    private function sendMail(bool $contact = false): void
    {
        $requestData = [
            'email' => 'test@example.com',
            'name' => 'John Doe',
            'message' => 'Test message',
        ];

        if ($contact) {
            $requestData['contact'] = true;
        }

        $request = new Request($requestData);

        $mailService = new Mail();
        $response = $mailService->sendMail($request);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals('Message sent', Session::get('message'));
    }
}
