<?php
namespace App\Http\Interfaces\dashboard;


interface OurProjectInterface {


    public function allProjects();

    public function showProject($project);

    public function createProject($request);

    public function storeProject($request);

    public function editProject($project);

    public function updatePoject($project, $request);

    public function deleteProject($project, $request);


}


