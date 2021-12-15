<?php
namespace App\Http\Interfaces\dashboard;


interface ContactInterface {


    public function getContacts();
    public function showContact($contact);

    public function createContact($request);
    public function storeContact($request);

    public function editContact($contact);
    public function updateContact($contact, $request);

    public function deleteContact($contact, $request);



}


