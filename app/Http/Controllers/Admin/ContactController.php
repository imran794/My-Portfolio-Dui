<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
   public function ContactShow()
   {
      	  $contacts =  Contact::latest('id')->get();
      	  return view('admin.contact.contact_show',compact('contacts'));
   }  

   public function ContactDestroy($id)
    {
    	Contact::find($id)->delete();
    	notify()->success("Contact Added", "Success");
        return redirect()->back();
    } 
}
