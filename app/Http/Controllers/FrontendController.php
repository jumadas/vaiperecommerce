<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    public function index(){

        return view('frontend.index',[
            'categories'=>Category::where('status','show')->get(),
            'all_products'=>Product::all()
        ]);
    }
   public function productdetails($slug){

    $wishlist_status= Wishlist::where('user_id',auth()->id())->where('product_id',Product::where('product_slug',$slug)->first()->id)->exists();
    if ($wishlist_status) {
            $wishlist_id = Wishlist::where('user_id', auth()->id())->where('product_id', Product::where('product_slug', $slug)->first()->id)->first()->id;
    }
    else{
        $wishlist_id ="";
    }
       $related_product= Product::where('product_slug','!=',$slug)->where('category_id', Product::where('product_slug', $slug)->firstorFail()->category_id)->get();
    // echo  $related_product;
       return view('frontend.productdetails',[
           'single_product_details'=> Product::where('product_slug', $slug)->firstorFail(),
            'related_products'=> $related_product,
            'wishlist_status'=> $wishlist_status,
            'wishlist_id'=> $wishlist_id
       ]);
   }
   public function categorywiseproducts($category_id){

        return view('frontend.categorywiseproducts', [
            'all_product_count'=>Product::count(),
            'category_name'=> Category::find($category_id)->category_name,
            'products' =>Product::where('category_id',$category_id)->get(),
        ]);
   }
}
