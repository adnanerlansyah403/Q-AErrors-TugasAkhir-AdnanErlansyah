<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function show(Contact $contact)
    {
        return view('pages.backend.admin.notification.contact.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.notification.index')->with('success', 'Message contact has been deleted!');
    }
}
