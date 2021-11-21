<?php

namespace App\Http\Controllers\Front;
use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function create_contact()
    {
      return view('front/contact');

    }
    public function store_contact(Request $request)
    {
      $validation=validator()->make($request->all(),['name'=>'required|min:3|max:50|regex:/^.*(?=.*[a-zA-Z]).*$/',
          'email'=>'required|email|min:5|max:50',
          'text'=>'required|min:20|max:1000'

    ]);
    if ($validation->fails())
    {
      $errors=$validation->errors();
      return redirect()->back()->with(['message'=>$errors]);

    }
    $contact=Contact::create($request->all());
    return redirect()->back();
    }
}
