<?php
 use App\Models\Product;
use App\Models\User;


function allwishlist(){
    return App\Models\Wishlist::where('user_id', auth()->id())->get();
}

function wishlistcheck($product_id){
    return App\Models\Wishlist::where('user_id', auth()->id())->where('product_id', $product_id)->exists();
}

function allcarts(){
    return App\Models\Cart::where('user_id', auth()->id())->get();
}


function totalproducttocart()
{
    return App\Models\Cart::where('user_id', auth()->id())->count();
}

function getvendorname($product_id)
{
    return User::find(Product::find($product_id)->user_id)->name;
}
function available_quantity($product_id)

{
    return Product::find($product_id)->product_quantity;

}
function update_product($product_id)

{
    return Product::find($product_id)->product_id;

}

