<?php

namespace App\Http\Controllers;

use App\Mail\SendgridMail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function  sendMail()
    {
        Mail:to('test@gmail.com')->send(new SendgridMail());
        dd('mail sent');
    }
}
