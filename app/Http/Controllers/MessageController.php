<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AboutInterface;
use App\Http\Interfaces\AuthInterface;
use App\Http\Interfaces\MessageInterface;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    //
    private $messageInterface;



    public function __construct(MessageInterface $messageInterface)
    {
        $this->messageInterface = $messageInterface;
    }



    public function userMessages(){

        return $this->messageInterface->userMessages();
    }


    public function SendMessage(Request $request){

        return $this->messageInterface->SendMessage($request);
    }






}
