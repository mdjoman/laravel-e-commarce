<?php

namespace App\Http\Controllers;

use App\Models\Apparence;
use App\Models\Contuctmasseg;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Http\Request;

class ContuctmassegController extends Controller
{
 
    public function storemassege(Request $request)
    {
    
        $contuctmasseg = new Contuctmasseg();
        $contuctmasseg->customerName = $request->customerName;
        $contuctmasseg->customerEmail = $request->customerEmail;
        $contuctmasseg->contactSubject = $request->contactSubject;
        $contuctmasseg->contactMessage = $request->contactMessage;   
        $contuctmasseg->save();
 
        return redirect()->back()->with('message', ' Your message has been successfully sent');
    }

    public function showmassege($id){
       
        $contuctmasseg = Contuctmasseg::find($id);

       return view('Admin.customarmasseg',[
           'contuctmasseg' => $contuctmasseg,
           'masseges' =>  Contuctmasseg::orderBY('id', 'desc')->get(),
           'ordersalart' =>  OrderDetails::orderBY('id', 'desc')->get(),        
           'user'   => User::first(),
           'setting' => Apparence::get()
       ]);


    }
    public function deletemassege($id)
    {

        $contuctmasseg = Contuctmasseg::find($id);
        $contuctmasseg->delete();

        return redirect('/dashboard');
    }

}
