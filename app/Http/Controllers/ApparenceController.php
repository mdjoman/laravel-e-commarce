<?php

namespace App\Http\Controllers;

use App\Models\Apparence;
use App\Models\Contuctmasseg;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Http\Request;

class ApparenceController extends Controller
{
  
    public function apparancecareate()
    {
        return view('Admin.site-seating',[
            'masseges' =>  Contuctmasseg::orderBY('id', 'desc')->get(),
            'ordersalart' =>  OrderDetails::orderBY('id', 'desc')->get(),
            'earning' =>  Order::first(),
            'user'   => User::first(),
            'setting' => Apparence::all()
           // 'setting' => Siteseationg::all()
        ]);
    }

    public function apparance(Request $request)
    {
        $setting = Apparence::find($request->id);

        if($image = $request->file('logo'))
        
        {
          if(file_Exists($setting->logo))
  
          {
            unlink(($setting->logo));
          }
  
        $imagename = $image->getClientOriginalName();
        $directory = 'logo/';
        $image->move($directory, $imagename);
        $imageurl = $directory.$imagename;
  
        }
        else
        {
          $imageurl  = $setting->logo;
        }
        $setting->Email = $request->Email;
        $setting->whatsapp = $request->whatsapp;
        $setting->instagram = $request->instagram;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter; 
        $setting->Site_name = $request->Site_name;
        $setting->siteDescription = $request->siteDescription; 
        $setting->About = $request->About;
        $setting->Privacy = $request->Privacy;
        $setting->logo =$imageurl;
        $setting->phone1 = $request->phone1;
        $setting->phone2 = $request->phone2;
        $setting->dhaka = $request->dhaka;
        $setting->other = $request->other;
        $setting->save();
        
      
     
     return redirect()->back()->with('message', 'setting info Update successfully');

    }
}
