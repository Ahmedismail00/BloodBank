<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Post::paginate(20);
        return view('posts.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' =>'required',
            'content' =>'required',
//            'image' => 'mimes:JPEG,PNG,JPG,GIF,SVG'
        ];
        $messages = [
            'title.required' => 'Name is required',
            'content.required' => 'Name is required'
        ];
        $this->validate($request,$rules,$messages);
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $image_name = "image".time().'.'.$extension;
//            dd($image_name);}
            $image->move('uploads/posts_images',$image_name);
        }else{
            $image_name = 'No image';
        }
        $record = Post::create([
            'title' => $request->title,
            'image' => $image_name,
            'content' => $request->content,
            'category_id' => $request->category +1,
        ]);
        flash()->success('Added');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Post::findorfail($id);
        return view('posts.edit',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' =>'required',
            'content' =>'required',
//            'image' => 'mimes:JPEG,PNG,JPG,GIF,SVG'
        ];
        $messages = [
            'title.required' => 'Title is required',
            'content.required' => 'Content is required'
        ];
        $this->validate($request,$rules,$messages);
        $record = Post::findorfail($id);
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $image_name = 'image'.time().'.'.$extension;
            $image->move('uploads/posts_images',$image_name);
        }else{
            $image_name = 'No image';
        }
        File::delete('uploads/posts_images/'.$record->image);
        $record->update([
            'title' => $request->title,
            'image' => $image_name,
            'content' => $request->content,
            'category_id' => $request->category +1,
        ]);
        flash()->success('Updated');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Post::find($id);
        File::delete('uploads/posts_images/'.$record->image);
        $record->delete();
        flash()->success('Deleted');
        return redirect(route('posts.index'));
    }
}
