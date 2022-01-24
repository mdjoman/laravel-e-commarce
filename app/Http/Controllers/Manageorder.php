<?php

namespace App\Http\Controllers;

use App\Models\Apparence;
use App\Models\Billing;
use App\Models\Category;
use App\Models\Contuctmasseg;
use App\Models\Customar;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderPayment;
use App\Models\Product;
use App\Models\Shiping;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class Manageorder extends Controller
{
 
    public function dashboard(){
        return view('Admin.index',[
            'masseges' =>  Contuctmasseg::orderBY('id', 'desc')->get(),
            'ordersalart' =>  OrderDetails::orderBY('id', 'desc')->get(),
            'earning' =>  Order::first(),
            'user'   => User::first()
        ]);
    }
    
    public function manageorder()
    {

        return view('Admin.manage-order', [
            'Orders' =>  Order::orderBY('id', 'desc')->get(),
            'masseges' =>  Contuctmasseg::orderBY('id', 'desc')->get(),
            'ordersalart' =>  OrderDetails::orderBY('id', 'desc')->get(),
            'user'   => User::first()
        ]);
    }

    public function vieworder($id)
    {
        $order = Order::find($id);
        return view('Admin.view-order', [

            'Orders'        =>  $order,
            'billing'     => Billing::find($order->billing_id),
            'shiping'      => Shiping::find($order->shiping_id),
            'orderpyment'      => OrderPayment::where('order_id', $order->billing_id)->first(),
            'orderDetails'     => OrderDetails::where('order_id', $order->billing_id)->get(),
            'masseges' =>  Contuctmasseg::orderBY('id', 'desc')->get(),
            'ordersalart' =>  OrderDetails::orderBY('id', 'desc')->get(),

            'user'   => User::first()
        ]);
    }

    public function invoice($id)
    {

        $order = Order::find($id);
        $cartproducts = Cart::content();
        return view('Admin.invoice', [

            'Orders'        =>  $order,
            'shiping'      => Shiping::find($order->shiping_id),
            'billing'      => Billing::find($order->billing_id),
         
            'orderDetails'     => OrderDetails::where('order_id', $order->billing_id)->get(),



            'categories' => Category::where('status', 'Published')->get(),
            'products' => Product::orderBy('id', 'desc')->get(),
            'cartproducts' =>   $cartproducts,
            'cost' => Apparence::get()

        ]);
    }



    public function deleteorder($id)
    {
            $order = Order::find($id);
            $billing       = Billing::find($order->billing_id);
            $shiping       = Shiping::find($order->shiping_id);
            $orderpyment   = OrderPayment::where('order_id', $order->billing_id);
            $orderDetails  = OrderDetails::where('order_id', $order->billing_id)->get();
            $order->delete();
            $billing->delete();
            $shiping->delete();
            $orderpyment->delete();
            foreach($orderDetails as  $d){
                $d->delete();
            }


        return redirect('/manageorder')->with('message', 'Order info Delete successfully');
    }

    /* ============== order functionality ==========*/
}
