<?php

namespace App\Http\Repositories\dashboard;

use App\Http\Interfaces\dashboard\LastNewsInterface;
use App\Http\Traits\ApiDesignTrait;
use App\Models\LastNew;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



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
        $data['news'] = $this->lastNewsModel->get();

        return view ('admin.lastNews.index')->with($data);
    }




    public function showLastNews($news)
    {
        // TODO: Implement showLastNews() method.
        $data['news'] = $news;
        return view('admin.lastNews.show')->with($data);
    }



    public function createNews($request)
    {
        // TODO: Implement createNews() method.
        return view("admin.lastNews.create");
    }




    public function storeNews($request)
    {
        // TODO: Implement storeNews() method.

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image',
        ]);

        $path = Storage::putFile('lastNews', $request->file('image'));

        $this->lastNewsModel::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path,
        ]);


        return redirect(url("dashboard/news"));
    }




    public function editNews($news)
    {
        // TODO: Implement editNews() method.

//        dd($news);
        $data['news'] = $news;
        return view('admin.lastNews.edit')->with($data);

    }




    public function updateLastNews($news, $request)
    {
        // TODO: Implement updateLastNews() method.


        $request->validate([
            'title' => 'string',
            'body' => 'string',
            'image' => 'image',
        ]);


        $path = $news->image;


        if($request->hasfile('image')){
            Storage::delete($path);
            $path = Storage::put('lastNews', $request->file('image'));
        }

        $news->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path,
        ]);



        $data['news'] = $this->lastNewsModel->get();

        return view ('admin.lastNews.index')->with($data);

    }




    public function deleteLastNews($news, $request)
    {
        // TODO: Implement deleteLastNews() method.

        $path = $news->image;
        $news->delete();

        Storage::delete($path);

        $msg = 'row deleted successfully';
        $request->session()->flash('msg', $msg);

        return back();

    }
}
