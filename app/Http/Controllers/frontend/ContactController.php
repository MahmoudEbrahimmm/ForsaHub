<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function create()
    {
        return view('components.contact');
    }

    public function store(ContactRequest $request)
    {
        $validated = $request->validated();
        Contact::create($validated);

        return redirect()->route('home')->with('success', 'Message sent successfully!');
    }
}
