<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AboutInterface;
use App\Http\Interfaces\AuthInterface;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    //
    private $aboutInterface;



    public function __construct(AboutInterface $aboutInterface)
    {
        $this->aboutInterface = $aboutInterface;
    }



    public function updateAbout(Request $request){

        return $this->aboutInterface->updateAbout($request);
    }

    public function getAbout(){

        return $this->aboutInterface->getAbout();
    }



}
