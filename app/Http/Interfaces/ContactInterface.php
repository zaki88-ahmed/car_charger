<?php
namespace App\Http\Interfaces;


interface ContactInterface {


    public function showContacts();

    public function addContact($request);

    public function editContact($request);

    public function deleteContact($request);


}


