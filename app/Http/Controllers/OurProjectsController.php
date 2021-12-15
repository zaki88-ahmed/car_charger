<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AboutInterface;
use App\Http\Interfaces\AuthInterface;
use App\Http\Interfaces\ContactInterface;
use App\Http\Interfaces\LastNewsInterface;
use App\Http\Interfaces\MessageInterface;
use App\Http\Interfaces\OurProjectsInterface;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class OurProjectsController extends Controller
{
    //
    private $ourProjectInterface;



    public function __construct(OurProjectsInterface $ourProjectInterface)
    {
        $this->ourProjectInterface = $ourProjectInterface;
    }


    public function allProjects()
    {
        return $this->ourProjectInterface->allProjects();
    }

    public function showProject(Request $request)
    {
        return $this->ourProjectInterface->showProject($request);
    }

    public function addProject(Request $request)
    {
        return $this->ourProjectInterface->addProject($request);
    }

    public function updateProject(Request $request)
    {
        return $this->ourProjectInterface->updateProject($request);
    }
    public function deleteProject(Request $request)
    {
        return $this->ourProjectInterface->deleteProject($request);
    }






}
