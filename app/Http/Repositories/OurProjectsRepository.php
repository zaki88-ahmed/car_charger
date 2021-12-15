<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AuthInterface;
use App\Http\Interfaces\ContactInterface;
use App\Http\Interfaces\LastNewsInterface;
use App\Http\Interfaces\MessageInterface;
use App\Http\Interfaces\OurProjectsInterface;
use App\Http\Traits\ApiDesignTrait;
use App\Models\Contact;
use App\Models\LastNew;
use App\Models\Message;
use App\Models\OurProject;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Nullable;


class OurProjectsRepository implements OurProjectsInterface
{

    use ApiDesignTrait;

    private $ourProjectModel;



    public function __construct(OurProject $ourProject)
    {
        $this->ourProjectModel = $ourProject;
    }




    public function allProjects()
    {
        // TODO: Implement allProjects() method.


        $data = $this->ourProjectModel::get();

        return $this->ApiResponse(200,'Done',null,$data);
    }






    public function showProject($request)
    {
        // TODO: Implement showProject() method.
        $validation = Validator::make($request->all(),[
            'project_id' => 'required|exists:our_projects,id',
        ]);
        if ($validation->fails()){
            return $this->ApiResponse(422,'Validation Error',$validation->errors());
        }
        $data = $this->ourProjectModel::where('id',$request->project_id)->first();

        return $this->ApiResponse(200,"Done",null,$data);

    }







    public function addProject($request)
    {
        // TODO: Implement addProject() method.

        $validation = Validator::make($request->all(),[
            'title' => 'required|min:5|max:255',
            'body' => 'required|min:5|max:5000',
            'image' => 'required',
        ]);

        if ($validation->fails()){
            return $this->ApiResponse(422,'validation error',$validation->errors());
        }


        $path = "";

        if($request->has('image')){

            $path = Storage::putFile('OurProjects', $request->file('image'));

        }

        $data = $this->ourProjectModel::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path,
        ]);


        return $this->ApiResponse(200,'Done',null,$data);
    }










    public function updateProject($request)
    {
        // TODO: Implement updateProject() method.

        $validation = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'body' => 'required|max:5000',
            'image' => 'required|mimes:jpeg,jpg,gif,png',
            'project_id' => 'required|exists:our_projects,id',
        ]);
        if ($validation->fails()){
            return $this->ApiResponse(422,'Validation Error',$validation->errors());
        }

        $data = $this->ourProjectModel::where('id', $request->project_id)->first();

        $path = $data->image;

        if($request->has('image')){

            Storage::delete($path);

            $path = Storage::putFile('OurProjects', $request->file('image'));
        }


        $data->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path,
        ]);
        return $this->ApiResponse(200,'Done',null, $data);
    }






    public function deleteProject($request)
    {
        // TODO: Implement deleteProject() method.

        $validation = Validator::make($request->all(),[
            'project_id' => 'required|exists:our_projects,id',
        ]);
        if ($validation->fails()){
            return $this->ApiResponse(422,'Validation Error',$validation->errors());
        }

        $data = $this->ourProjectModel::where('id',$request->project_id)->first();

        $path = $data->image;
        Storage::delete($path);
        $data->delete();

        return $this->ApiResponse(200,'successfully deleted', null, $data);
    }
}
