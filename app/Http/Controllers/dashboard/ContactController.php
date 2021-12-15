<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Interfaces\AboutInterface;
use App\Http\Interfaces\AuthInterface;
use App\Http\Interfaces\dashboard\ContactInterface;
use App\Http\Interfaces\MessageInterface;
use App\Models\Contact;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    //
    private $contactInterface;



    public function __construct(ContactInterface $contactInterface)
    {
        $this->contactInterface = $contactInterface;
    }


    public function getContacts(){
        return $this->contactInterface->getContacts();
    }

    public function showContact(Contact $contact){
        return $this->contactInterface->showContact($contact);
    }

    public function createContact(Request $request){
        return $this->contactInterface->createContact($request);
    }

    public function storeContact(Request $request){
        return $this->contactInterface->storeContact($request);
    }


    public function editContact(Contact $contact){
        return $this->contactInterface->editContact($contact);
    }

    public function updateContact (Contact $contact, Request $request){
        return $this->contactInterface->updateContact($contact, $request);
    }

    public function deleteContact(Contact $contact, Request $request){
        return $this->contactInterface->deleteContact($contact, $request);
    }







}
