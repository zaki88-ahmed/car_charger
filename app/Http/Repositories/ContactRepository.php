<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AuthInterface;
use App\Http\Interfaces\ContactInterface;
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


    public function showContacts()
    {
        // TODO: Implement showContact() method.

        $data = $this->contactModel::get();

        return $this->ApiResponse(200, 'Done', null, $data);
    }

    public function addContact($request)
    {
        // TODO: Implement addContact() method.


        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);
        if ($validation->fails()) {
            return $this->ApiResponse(422, 'validation error', $validation->errors());
        }
        $this->contactModel::create([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return $this->ApiResponse(200, 'done', null, 'Contact Added Successfully');

    }

    public function editContact($request)
    {
        // TODO: Implement editContact() method.

        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'contact_id' => 'required|exists:contacts,id'
        ]);
        if ($validation->fails()) {
            return $this->ApiResponse(422, 'validation error', $validation->errors());
        }

        $data = $this->contactModel::where('id', $request->contact_id)->first();

        $data->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return $this->ApiResponse(200,'Contact Updated Successfully',null,$data);
    }

    public function deleteContact($request)
    {
        // TODO: Implement deleteContact() method.

        $validation = Validator::make($request->all(), [

            'contact_id' => 'required|exists:contacts,id'
        ]);
        if ($validation->fails()) {
            return $this->ApiResponse(422, 'validation error', $validation->errors());
        }

        $data = $this->contactModel::where('id', $request->contact_id)->first();

        if($data){
            $data->delete();
        }
        return $this->ApiResponse(200,'Contact Deleted Successfully');
    }
}
