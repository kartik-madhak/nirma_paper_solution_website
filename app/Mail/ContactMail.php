<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $name;

    public $content;
    /**
     * Create a new message instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->email=$request->input('email');
        $this->name=$request->input('name');

        $this->content=$request->input('content');


        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){

        $email=$this->email;
        $content=$this->content;
        $name=$this->name;
        return $this->subject('New Mail')->from(getenv('MAIL_FROM_ADDRESS'))->to(getenv('WEBSITE_OWNER_EMAIL'))->
        view('email.contactmail',compact('email','content','name'));
    }
}
