<?php

namespace App\Http\Controllers;

use Toastr;
use Validator;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    

// Contact Data Store
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|max:5000',
            ]
        );

        if ($validator->fails()) {
            foreach ($validator->messages()->all() as $message) {
                Toastr::error($message, 'Failed');
            }
            return back()->withInput();
        }

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;


        if ($contact->save()) {
            Toastr::success('Success', 'Contact added successfully!');
            return redirect()->back();
        } else {
            Toastr::error('Error', 'An error occurred');
            return redirect()->back();
        }
    }

    //index 
    public function index()
    {
        $contacts = Contact::all();
        return view('backend.contact.index', compact('contacts'));
    }

    // Show individual contact message details
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('backend.contact.show', compact('contact'));
    }
    

    //delete message
    public function destroy($id)
{
    $contact = Contact::findOrFail($id); // Find the contact or fail with 404

    if ($contact->delete()) { // Attempt to delete the contact
        Toastr::success('Success', 'Contact deleted successfully!');
        return redirect()->route('contacts.index'); // Redirect to index on success
    } else {
        Toastr::error('Error', 'An error occurred'); // Show error if delete fails
        return redirect()->back(); // Redirect back to the previous page
    }
}


}
