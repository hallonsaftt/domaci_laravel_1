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
}
