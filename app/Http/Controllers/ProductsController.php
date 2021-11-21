<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $records=Product::where(function($q) use($request)
      {
        $q->where('name','like','%'.$request->name.'%')
        ->orWhere('color','like','%'.$request->name.'%')
        ->orWhere('brand','like','%'.$request->name.'%')
        ->orWhere('description','like','%'.$request->name.'%')
        ->orWhere('price','like','%'.$request->name.'%');

      })->latest()->paginate(10);
      return view('admin/products/list',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories=Category::all();
        return view('admin/products/create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation=validator($request->all(),[
        'name'=>'required|min:3|max:50',
        'brand'=>'required|min:3|max:50',
        'description'=>'required|min:20|max:300',
        'price'=>'required|max:30',
        'old_price'=>'required|max:30',
        'category_id'=>'exists:categories,id',
        'color'=>'required|min:3|max:30',
        'image'=>'required|image|mimes:jpg,jpeg,png'
      ]);
      if($validation->fails())
      {
        $errors=$validation->errors();
        return $errors;
      }
      $product=new Product;
      if($request->hasFile('image')){
  $image=$request->file('image');
  $name=$image->getClientOriginalName();
  $image_name=time().'.'.$name;

  $request->image->move(public_path('products_images'),$image_name);
  }
      $product->color=$request->input('color');
      $product->name=$request->input('name');
      $product->category_id=$request->input('category_id');
      $product->price=$request->input('price');
      $product->old_price=$request->input('old_price');
      $product->image=$image_name;
      $product->brand=$request->input('brand');
      $product->description=$request->input('description');
      $product->save();
return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record=Product::findOrFail($id);
        return view('admin/products/show',compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $record=Product::findOrFail($id);
      return view('admin/products/edit',compact('record'));
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
      $record=Product::findOrFail($id);
      $record->update($request->all());
      return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $record=Product::findOrFail($id);
      $record->delete();
      return redirect(route('products.index'));
    }

}
