<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

class MailSendController extends Controller
{
    public function index()
    {

        $data = [];

        Mail::send('test', $data, function ($message) {
            // (送信先,？？？)
            //resources/views/test.blade.php
            $message->to('password-reset-bot@example.com', 'posse')
                ->subject('パスワード再設定について');
        });
    }
}