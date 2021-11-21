<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
      $comments=Comment::all();
        $posts=Post::paginate(12);
        return view('index',compact('posts','comments'));
    }
    public function post_show($id)
    {
      $record=Post::findOrFail($id);
      $comments=$record->comments()->get();
      return view('post-show',compact('record','comments'));
    }
    public function categories()
    {
      $categories=Category::all();
      return view('categories',compact('categories'));
    }
    public function category_posts($id)
    {
      $category=Category::findOrFail($id);
        $posts=$category->posts()->paginate(10);
        return view('category-posts',compact('posts'));
    }
  }
