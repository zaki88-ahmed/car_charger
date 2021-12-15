<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AuthInterface;
use App\Http\Interfaces\ContactInterface;
use App\Http\Interfaces\LastNewsInterface;
use App\Http\Interfaces\MessageInterface;
use App\Http\Traits\ApiDesignTrait;
use App\Models\Contact;
use App\Models\LastNew;
use App\Models\Message;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Nullable;


class LastNewsRepository implements lastNewsInterface
{

    use ApiDesignTrait;

    private $lastNewsModel;



    public function __construct(LastNew $lastNews)
    {
        $this->lastNewsModel = $lastNews;
    }


    public function allNews()
    {
        // TODO: Implement allNews() method.

        $data = $this->lastNewsModel::get();

        return $this->ApiResponse(200, 'Done', null, $data);
    }



    public function showLastNews($request)
    {
        // TODO: Implement showLastNews() method.

        $validation = Validator::make($request->all(),[
            'lastNews_id' => 'required|exists:last_news,id'
        ]);
        if ($validation->fails()){
            return $this->ApiResponse(422,'validation error',$validation->errors());
        }


        $data = $this->lastNewsModel::where('id', $request->lastNews_id)->first();

        return $this->ApiResponse(200,'Done',null,$data);


    }



    public function updateLastNews($request)
    {
        // TODO: Implement updateLastNews() method.



        $validation = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'body' => 'required|max:5000',
            'image' => 'required|mimes:jpeg,jpg,gif,png',
            'lastNews_id' => 'required|exists:last_news,id',
        ]);
        if ($validation->fails()){
            return $this->ApiResponse(422,'Validation Error',$validation->errors());
        }



        $data = $this->lastNewsModel::where('id', $request->lastNews_id)->first();
        $path = $data->image;

        if($request->has('image')){

            Storage::delete($path);

            $path = Storage::putFile('LastNews', $request->file('image'));
        }

        $data->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path,
        ]);


        return $this->ApiResponse(200,'Updated Successfully',null,$data);

    }









    public function deleteLastNews($request)
    {
        // TODO: Implement deleteLastNews() method.

        $validation = Validator::make($request->all(),[
            'lastNews_id' => 'required|exists:last_news,id',
        ]);
        if ($validation->fails()){
            return $this->ApiResponse(422,'validation error',$validation->errors());
        }

        $data = $this->lastNewsModel::find($request->lastNews_id);

        $path = $data->image;
        Storage::delete($path);

        $data->delete();

        return $this->ApiResponse(200,'Deleted Successfully',null,$data);

    }








    public function addLastNew($request)
    {
        // TODO: Implement addLastNew() method.

        $validation = Validator::make($request->all(),[
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpg,png',
        ]);
        if ($validation->fails()){
            return $this->ApiResponse(422,'validation error',$validation->errors());
        }



        $path = "";

        if($request->has('image')){

            $path = Storage::putFile('LastNews', $request->file('image'));
        }

        $data = $this->lastNewsModel::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path,
        ]);

        return $this->ApiResponse(200,'Done',null,$data);

    }
}
