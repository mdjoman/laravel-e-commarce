<?php

namespace App\Http\Controllers;

use App\Models\Apparence;
use App\Models\Billing;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Customar;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderPayment;
use App\Models\Product;
use App\Models\Shiping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Ordercontroller extends Controller
{
    public function congratulation()
    {
        return view('fontend.congurtolation', [
            'categories' => Category::where('status', 'Published')->get(),
            'brand1' => Brand::where('status', 'Published')->get(),
            'setting' => Apparence::get()

        ]);
    }

    public function billing()
    {
        $cartproducts = Cart::content();
        $customar = Session::get('customar_id');
        return view('fontend.billing', [
            'categories' => Category::where('status', 'Published')->get(),
            'brand1' => Brand::where('status', 'Published')->get(),
            'cartproducts' =>   $cartproducts,
            'customar' => Customar::where('id',  $customar)->first(),
            'setting' => Apparence::get(),
            'cost' => Apparence::get(),

        ]);
    }

    public function checkout()
    {
        $cartproducts = Cart::content();
        $billing = Session::get('billing_id');
        return view('fontend.checkout', [
            'categories' => Category::where('status', 'Published')->get(),
            'brand1' => Brand::where('status', 'Published')->get(),
            'cartproducts' =>   $cartproducts,
            'customar' => Billing::where('id',  $billing)->first(),
            'setting' => Apparence::get(),
            'cost' => Apparence::get(),
            

        ]);
    }
    public function shipinginfo(Request $request)
    {

        $shiping = new Shiping();
        $shiping->email = $request->email;
        $shiping->fname = $request->fname;
        $shiping->lname = $request->lname;
        $shiping->mobile = $request->mobile;
        $shiping->division = $request->division;
        $shiping->postcode = $request->postcode;
        $shiping->address = $request->address;
        $shiping->save();

        Session::put('shiping_id', $shiping->id);
        Session::put('shiping_name', $shiping->fname);
        /* ============== order functionality ==========*/
        /* ============== order functionality ==========*/


        $shiping_id = Session::get('shiping_id');
        $division = Shiping::where('id',  $shiping_id)->first();

        if ($division->division == 'Dhaka') {
            $total = Session::get('grand_total') + (100);
        } else {
            $total = Session::get('grand_total') + (300);
        }
        $paymentmethod = $request->payment;

        if ($paymentmethod == 'cash') {
            $order = new Order();
            $order->customar_id = Session::get('customar_id');
            $order->shiping_id = Session::get('shiping_id');
            $order->billing_id = Session::get('billing_id');
            $order->amount = $total;
            $order->status = 'Processing';
            $order->order_date = date('Y-m-d');
            $order->payment_method = $paymentmethod;
            $order->save();
          

            $cartproducts = Cart::content();
            foreach ($cartproducts as $cartproduct) {
                $orderDetails = new OrderDetails();

                $orderDetails->order_id      = Session::get('billing_id');
                $orderDetails->Product_id    = $cartproduct->id;
                $orderDetails->product_name  = $cartproduct->name;
                $orderDetails->product_image = $cartproduct->options->image;
                $orderDetails->product_price = $cartproduct->price;
                $orderDetails->product_qty   = $cartproduct->qty;
                $orderDetails->save();

                Cart::remove($cartproduct->rowId);
                $product = Product::find($cartproduct->id);
                $product->Product_Amount = ($product->Product_Amount - $cartproduct->qty);
                $product->save();
            }

       
            Session::put('grand_total', 0);
            Session::put('vat', 0);



            return redirect('congratulation');
        } elseif ($paymentmethod == 'online') {


            return redirect('example2');
            
        } elseif ($paymentmethod == 'bank') {
        }
    }

    public function updatestatus(Request $request){
       
        $order =  Order::find($request->id);
        $order->status = $request->status;
        $order->save();
        return redirect()->back()->with('message', 'order status update successfully.'); 
    }
    /* ============== order functionality ==========*/

}