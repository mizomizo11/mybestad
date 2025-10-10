<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Mail\ContactMailable;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

class EmailContactController extends Controller
{

    public function send_to_mail(Request $request)
    {

      Mail::to("info@askourdoctor.com")
          ->bcc("bahaa101@gmail.com")
          ->send(new ContactMailable($request));
      return back()->with('success','Email has sent  successfully!');


    }



}
