<?php

namespace App\Services;


use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class Mail
 */
class Mail extends \Illuminate\Support\Facades\Mail
{
    /**
     * @var string
     */
    private $subject;
    /**
     * @var string
     */
    private $from;
    /**
     * @var string
     */
    private $name;

    /**
     * @param $request
     * @return RedirectResponse
     */
    public function sendMail($request): RedirectResponse
    {
        $this->name = "Yoweli Kachala";
        $template = "contact-mail";
        $this->subject = "Yoweli Kachala  Communicator";
        $this->from = 'admin@yoweli-kachala.com';

        if ($request->input('contact')) {
            $content = "Contact from $request->email, Name : $request->name, Message : $request->message";
            $this->processMail($content, $template);
        } else {
            $content = "Freebies request : $request->email";
            $this->processMail($content, $template);
        }

        Session::flash('message', "Message sent");
        return Redirect::to('/');

    }

    /**
     * @param $content
     * @param $template
     */
    private function processMail($content, $template): void
    {
        $data = array(
            'name' => $this->name,
            'content' => $content
        );
        Mail::send(['text' => $template], $data, function ($message) {
            $message->to('yowelikachala@gmail.com', $this->name)->subject
            ($this->subject);
            $message->from($this->from, $this->name);
        });
    }
}
