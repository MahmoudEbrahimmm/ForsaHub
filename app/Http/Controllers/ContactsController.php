<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index(){
        $contactsUser = Contact::paginate(7);
        return view('dashboard.contacts.index',compact('contactsUser'));
    }
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->destroy($id);

        return redirect()->route('dashboard.contacts.index')
        ->with('success','Deleted Contact successfuly!');
    }
}
