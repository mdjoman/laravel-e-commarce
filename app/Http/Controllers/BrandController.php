<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Contuctmasseg;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.band-manage', ['brands' => Brand::orderBy('created_at', 'DESC')->get(),
        'masseges' =>  Contuctmasseg::orderBY('id', 'desc')->get(),
        'ordersalart' =>  OrderDetails::orderBY('id', 'desc')->get(),
        'earning' =>  Order::first(),
        'user'   => User::first()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.band-create',[
            'masseges' =>  Contuctmasseg::orderBY('id', 'desc')->get(),
            'ordersalart' =>  OrderDetails::orderBY('id', 'desc')->get(),
            'earning' =>  Order::first(),
            'user'   => User::first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:brands,name,',
            'status' => 'required'
        ]);
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->Description = $request->Description;
        $brand->status = $request->status;
        $brand->slug = Str::slug($request->name, '-');
        $brand->save();

        return redirect()->back()->with('message', 'Brand info create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {

        return view('Admin.band-edite', ['brand' =>  $brand,
        'masseges' =>  Contuctmasseg::orderBY('id', 'desc')->get(),
        'ordersalart' =>  OrderDetails::orderBY('id', 'desc')->get(),
        'earning' =>  Order::first(),
        'user'   => User::first()
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->name = $request->name;
        $brand->Description = $request->Description;
        $brand->status = $request->status;
        $brand->save();

        return redirect('/brand')->with('message', 'brand info Update successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $products = Product::where('brand_id',  $brand->id)->first();
        if ($products) {
            return redirect()->back()->with('message', 'This brand is already used in your products.To delete this brand, first change the/those product brand. ');
        } else {
            $brand->delete();

            return redirect('/brand')->with('message', 'brand info Delete successfully');
        }
    }
}
