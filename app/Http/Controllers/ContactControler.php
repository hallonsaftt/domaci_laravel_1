<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactControler extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function allContacts()
    {
        $allContacts = ContactModel::all();

        return view('allContacts', compact('allContacts'));
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            //name => pravilo
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'description' => 'required|min:5',
        ]);


        ContactModel::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('description')
        ]);

        return redirect('/shop');

    }

    public  function deleteContact($contact)
    {
        $singleContact = ContactModel::where(['id' => $contact])->first();

        if($singleContact === null)
        {
            die("Contact not found");
        }

        $singleContact->delete();

        return redirect()->back();
    }
}
