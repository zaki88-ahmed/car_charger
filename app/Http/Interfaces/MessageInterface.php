<?php
namespace App\Http\Interfaces;


interface MessageInterface {


    public function userMessages();

    public function SendMessage($request);


}


