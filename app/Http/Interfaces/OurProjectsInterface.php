<?php
namespace App\Http\Interfaces;


interface OurProjectsInterface {


    public function allProjects();

    public function showProject($request);

    public function createProject($request);

    public function storeProject($request);

    public function editProject($request);

    public function updatePoject($ourProject, $request);

    public function deleteProject($ourProject, $request);


}


