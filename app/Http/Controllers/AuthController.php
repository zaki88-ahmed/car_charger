<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AuthInterface;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //
    private $authInterface;



    public function __construct(AuthInterface $authInterface)
    {
        $this->authInterface = $authInterface;
    }



//public  function __construct(AuthInterface $authInterface)
//{
//    $this->authInterface = $authInterface;
//}


    public function login(Request $request){

        return $this->authInterface->login($request);

    }



    public function addTestUser(Request $request){


        return $this->authInterface->addTestUser();
    }

//    public function test(){
//
//        return "test";
//    }


}
