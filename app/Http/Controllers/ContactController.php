<?php

namespace App\Http\Controllers;

use App\Mail\ContactReply;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'privacy' => 'required|accepted'
        ]);

        Contact::create($request->all());

        return redirect()->route('contact.create')
                    ->with('success', 'Your message has been sent successfully! We will get back to you soon.');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'status' => 'required|in:new,read,replied'
        ]);

        $contact->update($request->all());
        return redirect()->route('admin.contacts.index')->with('success', 'Contact status updated successfully.');
    }

    public function reply(Request $request, Contact $contact)
    {
        $request->validate([
            'reply_message' => 'required|string|min:10',
        ]);

        Mail::to($contact->email)->send(new ContactReply($contact, $request->reply_message));

        $contact->update(['status' => 'replied']);

        return back()->with('success', "Reply sent successfully to {$contact->name} ({$contact->email}).");
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
