<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Mail;


class SendMailController extends Controller
{
    /**
     * Show the application sendMail.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendMail()
    {
        $content = [
            'title' => 'Itsolutionstuff.com mail',
            'body' => 'The body of your message.',
            'button' => 'Click Here'
        ];


        $receiverAddress = 'your email';


        Mail::to($receiverAddress)->send(new OrderShipped($content));


        dd('mail send successfully');
    }
}
