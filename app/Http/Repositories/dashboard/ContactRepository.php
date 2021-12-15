<?php

namespace App\Http\Repositories\dashboard;

use App\Http\Interfaces\AuthInterface;
use App\Http\Interfaces\dashboard\ContactInterface;
use App\Http\Interfaces\MessageInterface;
use App\Http\Traits\ApiDesignTrait;
use App\Models\Contact;
use App\Models\Message;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ContactRepository implements ContactInterface
{

    use ApiDesignTrait;

    private $contactModel;



    public function __construct(Contact $contact)
    {
        $this->contactModel = $contact;
    }


    public function getContacts()
    {
        // TODO: Implement getContacts() method.

        $data['contacts'] = $this->contactModel::get();
        return view('admin.contacts.index')->with($data);
    }

    public function showContact($contact)
    {
        // TODO: Implement showContact() method.

        $data['contact'] = $contact;
        return view('admin.contacts.show')->with($data);
    }

    public function createContact($request)
    {
        // TODO: Implement createContact() method.
        return view('admin.contacts.create');

    }



    public function storeContact($request)
    {
        // TODO: Implement storeContact() method.
        $request->validate([
            'email' => 'required|email|unique:contacts',
            'phone' => 'required|digits:10',
            'address' => 'required',
        ]);


        $this->contactModel->create([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

//        $request->session->flash('prev', "contact/$this->contactModel->id");

//        return redirect(url("dashboard/contacts/{$this->contactModel->id}"));
        return redirect(url("dashboard/contacts"));

    }



    public function editContact($contact)
    {
        // TODO: Implement editContact() method.


        $data['contact'] = $contact;
        return view('admin.contacts.edit')->with($data);

    }



    public function updateContact($contact, $request)
    {
        // TODO: Implement updateContact() method.


        $request->validate([
            'email' => 'required|email|unique:contacts',
            'phone' => 'required|digits:10',
            'address' => 'required',
        ]);


        $contact->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        $request->session()->flash('msg', 'row updated successfully');
        return redirect(url("dashboard/contacts/show/$contact->id"));

    }

    public function deleteContact($contact, $request)
    {
        // TODO: Implement deleteContact() method.
        $contact->delete();
        $msg = 'row deleted successfully';

        $request->session()->flash('msg', $msg);
        return back();

    }
}
