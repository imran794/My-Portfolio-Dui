<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class FonContactController extends Controller
{
    public function ContactStore(Request $request)
    {
        // $request->validate([
        //      'sub_title'      => 'required',
        //      'title'          => 'required',
        //     ' description'    => 'required',
        //      'image'          => 'required',
        // ]);


        $contact = new Contact();
        $contact->name        = $request->name;
        $contact->number        = $request->number;
        $contact->email       = $request->email;
        $contact->subject       = $request->subject;
        $contact->message     = $request->message;
        $contact->save();

        notify()->success("Your message Successfully Send", "Success");
        return redirect()->back();
    }
}
