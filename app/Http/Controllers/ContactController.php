<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Events\ContactFormValid;
use Mail;
use Session;
use App\Post;
class ContactController extends Controller
{
    public function getIndex()
    {
        return view('contact.index');
    }
    public function postIndex(Request $request)
    {

        $this->validate($request, [

            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users|regex:/^[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,4})$/',
            'message' => 'required|min:10'

        ]);

        $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'usermessage' => $request->message
            );
            Mail::send('emails.contact',
            $data, function($message) use ($data)
            {
                    $message->from($data['email']);
                    $message->to('kavyasiyer91@gmail.com', 'Admin');
                    $message->subject('Contact Us Feedback');
                });
        
         //event(new ContactFormValid($request));
            Session::flash('flash_message', 'Thank you for contacting us!, the administrator will contact you soon.');
            return redirect('contact');
     }
}

