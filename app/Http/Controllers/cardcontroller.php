<?php

namespace App\Http\Controllers;

use App\Models\Apparence;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
class cardcontroller extends Controller
{

    public function addcart1(Request $Request){
       
      $product = Product::find($Request->id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->Product_name,
            'qty'  =>   $Request->qnty,
            'price' =>  $product->Product_Price,
            'weight' =>$product->Product_Amount,
            'options' =>[
            'image'  =>$product->image
            ]

        ]);
       return redirect('show-cart')->with('message', 'Product info Add to cart successfully');


    }


    public function addcart($id, $price){
       
        $product = Product::find($id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->Product_name,
            'qty'  =>  1,
            'price' => $price,
            'weight' => $product->Product_Amount,
            'options' =>[
            'image'  =>$product->image
            ]

        ]);
       return redirect('show-cart')->with('message', 'Product info Add to cart successfully');


    }

    public function show(){
        $cartproducts = Cart::content();
        return view('fontend.show-cart',  [
            'categories' => Category::where('status','Published' )->get(),
            'brand1' => Brand::where('status','Published' )->get(),
            'products' => Product::orderBy('id', 'desc')->get(),
            'cartproducts' =>   $cartproducts,
            'setting' => Apparence::get(),
            'cost' => Apparence::get()
        

        ]);
    }
    public function remove($rowId){
        Cart::remove($rowId);

       return redirect('show-cart')->with('message', 'Product info Remove to cart successfully');

    }
    public function update(Request $Request){
        Cart::update($Request->rowId, $Request->qty);

        return redirect('show-cart')->with('message', 'Product info Update to cart successfully'); 
    }
 
    
}
