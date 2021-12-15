<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AboutInterface;
use App\Http\Interfaces\AuthInterface;
use App\Http\Interfaces\ContactInterface;
use App\Http\Interfaces\MessageInterface;
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


    public function showContacts(){
        return $this->contactInterface->showContacts();
    }

    public function addContact(Request $request){
        return $this->contactInterface->addContact($request);
    }

    public function editContact(Request $request){
        return $this->contactInterface->editContact($request);
    }

    public function deleteContact(Request $request){
        return $this->contactInterface->deleteContact($request);
    }







}
