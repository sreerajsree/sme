<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\ContactFormRequest;
use App\Jobs\SendContactFormMailJob;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    
    /**
     * Dispatch a job to send a contact mail.
     *
     * @param  \App\Http\Requests\ContactFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactFormRequest $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        $data = $request->all();
        dispatch(new SendContactFormMailJob($data));

        return redirect()->back()->withSuccess('Your message send successfully.');
    }

    public function index()
    {
        $contacts = Contact::orderBy('id','desc')->get();

        return view('dashboard.contacts.index', compact('contacts'));
    }

    public function destroy($id)
    {
        Contact::where('id',$id)->delete();
        Alert::toast('Contact deleted successfully.', 'success');
        return redirect()->back();
    }
}
