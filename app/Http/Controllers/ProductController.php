<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contuctmasseg;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Subimage;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product-manage', ['products' =>  Product::orderBy('created_at', 'DESC')->get(),
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
        return view('admin.product-create', [
            'categorys'  => Category::all(),
            'brands'  => Brand::all(),
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
            'Product_name' => 'required|unique:products,Product_name',
            'Product_Price' => 'required',
            'status' => 'required',
            'Product_Amount' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'sDescription' => 'required',
            'Image' => 'required',
            'sImage' => 'required',

        ]);

        $image = $request->file('Image');
        $imagename = time() . '.' . $image->getClientOriginalName();
        $directory = 'Product-image/';
        $image->move($directory, $imagename);
        $imageurl = $directory . $imagename;


        $product = new Product();
        $product->Product_name = $request->Product_name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->Product_code = $request->Product_code;
        $product->Product_Price = $request->Product_Price;
        $product->discount_Price = $request->discount_Price;
        $product->coupon = $request->coupon;
        $product->Product_Amount = $request->Product_Amount;
        $product->sDescription = $request->sDescription;
        $product->lDescription = $request->lDescription;
        $product->image = $imageurl;
        $product->status = $request->status;
        $product->slug = Str::slug($request->Product_name, '-');
        $product->save();


        $images = $request->file('sImage');

        foreach ($images as $image) {
            $imagename = $image->getClientOriginalName();
            $directory = 'Product-sub-image/';
            $image->move($directory, $imagename);
            $imageurl = $directory . $imagename;


            $subimage  = new Subimage();
            $subimage->Product_id = $product->id;
            $subimage->subimage = $imageurl;
            $subimage->save();
        }
        return redirect()->back()->with('message', 'Product info create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.view-product', ['product' => $product,
        'masseges' =>  Contuctmasseg::orderBY('id', 'desc')->get(),
        'ordersalart' =>  OrderDetails::orderBY('id', 'desc')->get(),
        'earning' =>  Order::first(),
        'user'   => User::first()
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product-edit', [
            'product' =>  $product,
            'categories'  => Category::all(),
            'brands'  => Brand::all(),
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'Product_name' => "required|unique:products,Product_name,$request->id",
        ]);

        if ($image = $request->file('Image')) {
            if (file_Exists($product->image)) {
                unlink(($product->image));
            }
            $product->delete();


            $imagename = time() . '.' . $image->getClientOriginalName();
            $directory = 'Product-image/';
            $image->move($directory, $imagename);
            $imageurl = $directory . $imagename;
        } else {
            $imageurl  = $product->image;
        }

        $product->Product_name = $request->Product_name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->Product_code = $request->Product_code;
        $product->Product_Price = $request->Product_Price;
        $product->discount_Price = $request->discount_Price;
        $product->coupon = $request->coupon;
        $product->Product_Amount = $request->Product_Amount;
        $product->sDescription = $request->sDescription;
        $product->lDescription = $request->lDescription;
        $product->image = $imageurl;
        $product->slug = Str::slug($request->Product_name, '-');
        $product->status = $request->status;
        $product->save();


        if ($images = $request->file('sImage')) {
            $subimages = Subimage::where('product_id', $product->id)->get();
            foreach ($subimages as $subimage) {
                if (file_Exists($subimage->subimage)) {
                    unlink(($subimage->subimage));
                }
                $subimage->delete();
            }

            foreach ($images as $image) {
                $imagename = $image->getClientOriginalName();
                $directory = 'Product-sub-image/';
                $image->move($directory, $imagename);
                $imageurl = $directory . $imagename;


                $subimage  = new Subimage();
                $subimage->Product_id = $product->id;
                $subimage->subimage = $imageurl;
                $subimage->save();
            }
        }
        return redirect('/product')->with('message', 'product info Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/product')->with('message', 'product info Delete successfully');
    }
}
