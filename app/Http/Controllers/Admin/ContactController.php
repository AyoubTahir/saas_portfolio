<?php

namespace App\Http\Controllers\Admin;

use App\Services\Perform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Perform::index(Contact::class);

        return view('admin.contact.index', compact(['contact']));
    }

    public function update(ContactRequest $request)
    {
        Perform::update(Contact::class, $request);

        return redirect()->route('contact.index')->with(['success' => 'changed updated successfully']);
    }
}
