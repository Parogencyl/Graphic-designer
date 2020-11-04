<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function setPlLanguage(Request $request)
    {
        session(['language' => 'pl']);
        return back();
    }

    public function setEngLanguage(Request $request)
    {
        session(['language' => 'eng']);
        return back();
    }

    public function sendEmail(Request $request)
    {
        if (session('language') == 'pl') {
            $lan = 'pl';
        } else {
            $lan = 'eng';
        }

        $subject = $request->input('title');
        $email = $request->input('email');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $text = $request->input('text');

        // Message
        if ($lan == "eng") {
            $email_message = '
            <html>
            <body>
            <p> Email sent by '.$name.', phone number '.$phone.'.</p>
            <p> '.$text.' </p>
            </body>
            </html>
            ';
        } else {
            $email_message = '
            <html>
            <body>
            <p> Email wysłany przez '.$name.', numer telefonu '.$phone.'.</p>
            <p> '.$text.' </p>
            </body>
            </html>
            ';
        }

        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-Type: text/html; charset=UTF-8';

        // Additional headers
        $headers[] = 'To: Damian Bohonos <bohun19081997@gmail.com>';
        $headers[] = 'From: <'.$email.'>';
        
        $to = "bohun19081997@gmail.com";

        if (mail($to, $subject, $email_message, implode("\r\n", $headers))) {
            if ($lan == "eng") {
                return redirect('/#contact')->with('success', 'The message was sent.');
            } else {
                return redirect('/#contact')->with('success', 'Wiadomość została wysłana.');
            }
        } else {
            if ($lan == "eng") {
                return redirect('/#contact')->with('error', 'The message could not be sent.');
            } else {
                return redirect('/#contact')->with('error', 'Nie udało się wysłać wiadomości.');
            }
        }
    }
}
