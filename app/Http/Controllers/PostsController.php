<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
      $records = Post::where(function($q)use($request){
        if($request->has('name')){
          $q->where('name','like','%'.$request->name.'%')->
          orWhere('content','like','%'.$request->name.'%')->
          orWhere('id','like','%'.$request->name.'%');
        }
      })
      ->latest()->paginate(10);
      return view('admin/posts/list',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories=Category::all();
      return view('admin/posts/create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules=[
      'title'=>'required',
      'content'=>'required',
      'image'=>'image|mimes:jpg,jpeg,png',
      ];
        $messages=['title.required'=>'title is required',
      'body.required'=>'body is required',];
            $this->validate($request,$rules,$messages
                );
              $post=new Post;

        if($request->hasFile('image')){
  $image=$request->file('image');
  $name=$image->getClientOriginalName();
  $image_name=time().'.'.$name;

  $request->image->move(public_path('images'),$image_name);
    }
    $post->category_id=$request->input('category_id');
    $post->image=$image_name;
    $post->content=$request->input('content');
    $post->title=$request->input('title');
            $post->save();
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
      $record=Post::findOrFail($id);
      return view('admin/posts/show',compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $categories=Category::all();
        $record=Post::findOrFail($id);
        return view('admin/Posts/edit',compact('record','categories'));
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
      $record=Post::findOrFail($id);
      $record->update($request->all());
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $record=Post::findOrFail($id);
      $record->delete();
      return redirect()->back();

    }
}
