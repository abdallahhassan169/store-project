<?php

namespace App\Http\Controllers\Front;
use App\Product;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
      $color=Product::paginate(21);
      $products=Product::all();
      $brand=Product::where(function($q) use($request)
      {
        if($request->has('brand')){

        $q->where('brand','like','%'.$request->brand.'%');
      }
      })->latest()->paginate(10);
      $price=Product::where(function($q) use($request)
      {
        if($request->has('color')){

        $q->where('color','like','%'.$request->color.'%');
      }
      })->latest()->paginate(10);
      $displayed_products=Product::where(function($q) use($request)
      {
        if($request->has('price')){

        $q->where('price','<=',$request->max_val && '>=' ,$request->mini_val);
      }
      })->latest()->paginate(10);

      return view('Front/shop',compact('price','brand','color','products','displayed_products'));
    }
    public function show_product($id)
    {
      $product=Product::findOrFail('id');
      return view('front/show-product');
    }

}
