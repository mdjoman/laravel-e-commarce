<?php

namespace App\Http\Controllers;

use App\Models\Apparence;
use App\Models\Billing;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Customar;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomarController extends Controller
{

  
    public function resistrationpage() {
        if($customar_id = Session::get('customar_id')){
            $cartproducts = Cart::content();
            $customar = Session::get('customar_id');
            return view('fontend.billing', [
                'categories' => Category::where('status', 'Published')->get(),
                'brand1' => Brand::where('status', 'Published')->get(),
                'cartproducts' =>   $cartproducts,
                'customar' => Customar::where('id',  $customar)->first(),
                'setting' => Apparence::get(),
                'cost' => Apparence::get()
            ]);
        }
        else{
            return view('fontend.login-register', [
                'categories' => Category::where('status', 'Published')->get(),
                'brand1' => Brand::where('status', 'Published')->get(),
                'setting' => Apparence::get()
            ]);
        }
       
    }
  
    
    public function Forgottenpasward()
    {
        return view('fontend.forget-password', [
            'categories' => Category::where('status', 'Published')->get(),
            'brand1' => Brand::where('status', 'Published')->get(),
            'setting' => Apparence::get()
        ]);
    }

    public function resistration(Request $request) {

        $request->validate([
            'email' => 'required|unique:customars,email',
        ]);
        $customar = new Customar();
        $customar->email = $request->email;
        $customar->Password = bcrypt($request->Password);
        $customar->fname = $request->fname;
        $customar->lname = $request->lname;
        $customar->mobile = $request->mobile;
        $customar->save();

        Session::put('customar_id', $customar->id);
        Session::put('customar_name', $customar->fname);


        return redirect('/billing')->with('message', 'Your login successfully');
    }


  

        public function update(Request $request){

        $customar = Customar::where('email', $request->email)->first();
        if ($customar) {
            $customar->Password = bcrypt($request->Password);
            $customar->save();
            return redirect('/login-resistration')->with('message', ' Your password successfully updated');
        } else {
            return redirect()->back()->with('message', ' No account found in your email');
        }
    }

    public function logoutcustomar(Request $request) {

        Session::forget('customar_id');
        Session::forget('customar_name');

        return redirect()->back();
    }

    public function logincustomar(Request $request) {

        $customarlogin = Customar::where('email', $request->email)->first();

        if ($customarlogin) {

            if (password_verify($request->password, $customarlogin->Password)) {
                Session::put('customar_id', $customarlogin->id);
                return redirect('/billing');
            } else {
                return redirect()->back()->with('message', ' The password you are entering is incorrect. Please enter the correct password');
            }
        } else {
            return redirect()->back()->with('message', ' No account found in your email');
        }
        Session::put('customar_id', $customarlogin->id);
    }
    public function billinginfo(Request $request){
        $cartproducts = Cart::content();

        if( $cartproducts->count()){
            $billing = new Billing();
            $billing->email = $request->email;
            $billing->fname = $request->fname;
            $billing->lname = $request->lname;
            $billing->mobile = $request->mobile;
            $billing->division = $request->division;
            $billing->postcode = $request->postcode;
            $billing->address = $request->address;
            $billing->save();
    
            Session::put('billing_id', $billing->id);
            Session::put('billing_name', $billing->fname);
           
    
            return redirect('/checkout');
        }
        else
        {
            return redirect()->back()->with('message', 'No product found in your cart. First add the desired product then try to enter the check-out page. Thank you.'); 
        }  
      }

}
