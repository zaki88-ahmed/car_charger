<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Interfaces\AuthInterface;
use App\Http\Interfaces\dashboard\AboutInterface;
use App\Models\About;
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



    public function updateAbout(About $about, Request $request){

        return $this->aboutInterface->updateAbout($about, $request);
    }





    public function editAbout(About $about){

        return $this->aboutInterface->editAbout($about);
    }




    public function getAbout(){

        return $this->aboutInterface->getAbout();
    }

}
