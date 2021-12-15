<?php

namespace App\Http\Controllers\dashboard;


use App\Http\Interfaces\dashboard\LastNewsInterface;
use App\Http\Interfaces\MessageInterface;
use App\Http\Interfaces\dashboard\OurProjectInterface;
use App\Models\LastNew;
use App\Models\OurProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class OurProjectController extends Controller
{
    //
    private $ourProjectsInterface;



    public function __construct(OurProjectInterface $ourProjectsInterface)
    {
        $this->ourProjectsInterface = $ourProjectsInterface;
    }



    public function allProjects()
    {
        return $this->ourProjectsInterface->allProjects();
    }




    public function showProject(OurProject $project)
    {
//        dd($project);
        return $this->ourProjectsInterface->showProject($project);
    }




    public function createProject(Request $request)
    {
        return $this->ourProjectsInterface->createProject($request);
    }



    public function storeProject(Request $request)
    {
        return $this->ourProjectsInterface->storeProject($request);
    }



    public function editProject(OurProject $project)
    {
//        dd($project);
        return $this->ourProjectsInterface->editProject($project);
    }




    public function updateProject(OurProject $project, Request $request)
    {
        return $this->ourProjectsInterface->updatePoject($project, $request);
    }




    public function deleteProject(OurProject $project, Request $request)
    {
        return $this->ourProjectsInterface->deleteProject($project, $request);
    }






}
