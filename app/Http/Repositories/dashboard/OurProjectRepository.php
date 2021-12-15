<?php

namespace App\Http\Repositories\dashboard;

use App\Http\Interfaces\dashboard\LastNewsInterface;
use App\Http\Interfaces\dashboard\OurProjectInterface;
use App\Http\Traits\ApiDesignTrait;
use App\Models\LastNew;


use App\Models\OurProject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class OurProjectRepository implements OurProjectInterface
{

    use ApiDesignTrait;

    private $ourProjectModel;



    public function __construct(OurProject $ourProjectModel)
    {
        $this->ourProjectModel = $ourProjectModel;
    }



    public function allProjects()
    {
        // TODO: Implement allNews() method.
        $data['projects'] = $this->ourProjectModel->get();

        return view ('admin.ourProjects.index')->with($data);
    }




    public function showProject($project)
    {
        // TODO: Implement showLastNews() method.
        $data['project'] = $project;
//        dd($project->id);
        return view('admin.ourProjects.show')->with($data);
    }



    public function createProject($request)
    {
        // TODO: Implement createNews() method.
        return view("admin.ourProjects.create");
    }




    public function storeProject($request)
    {
        // TODO: Implement storeNews() method.

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image',
        ]);

        $path = Storage::putFile('OurProjects', $request->file('image'));

        $this->ourProjectModel::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path,
        ]);


        return redirect(url("dashboard/projects"));
    }




    public function editProject($project)
    {
        // TODO: Implement editNews() method.

//        dd($project);
        $data['project'] = $project;
        return view('admin.ourProjects.edit')->with($data);

    }




    public function updatePoject($project, $request)
    {
        // TODO: Implement updateLastNews() method.


        $request->validate([
            'title' => 'string',
            'body' => 'string',
            'image' => 'image',
        ]);


        $path = $project->image;


        if($request->hasfile('image')){
            Storage::delete($path);
            $path = Storage::put('OurProjects', $request->file('image'));
        }

//        dd($project);
//        dd($project->title);
        $project->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path,
        ]);



        $data['projects'] = $this->ourProjectModel->get();

        return view ('admin.ourProjects.index')->with($data);

    }




    public function deleteProject($project, $request)
    {
        // TODO: Implement deleteLastNews() method.

        $path = $project->image;
        $project->delete();

        Storage::delete($path);

        $msg = 'row deleted successfully';
        $request->session()->flash('msg', $msg);

        return back();

    }
}
