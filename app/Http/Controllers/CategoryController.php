<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Contuctmasseg;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.category-manage', ['categories' => Category::orderBy('created_at', 'DESC')->get(),
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
        return view('Admin.category-make',[
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
            'name' => 'required|unique:categories,name',

            'status' => 'required',


        ]);
        /*
          $image = $request->file('image');
          $imagename = $image->getClientOriginalName();
          $directory = 'category-image/';
          $image->move($directory, $imagename);
          $imageurl = $directory . $imagename;
      */

        $category = new Category();
        $category->name = $request->name;
        $category->Description = $request->Description;
        $category->slug = Str::slug($request->name, '-');
        /*$category->image = $imageurl;*/
        $category->status = $request->status;
        $category->save();

        return redirect()->back()->with('message', 'Category info create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('Admin.category-edite', ['category' =>  $category,
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => "required|unique:categories,name,$request->id",
        ]);

        /*
      
          if ($image = $request->file('image')) {
            if (file_Exists($category->image)) {
              unlink(($category->image));
            }
            $category->delete();
      
            $image = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $directory = 'category-image/';
            $image->move($directory, $imagename);
            $imageurl = $directory . $imagename;
          } else {
            $imageurl  = $category->image;
          }
      */
        $category->name = $request->name;
        $category->Description = $request->Description;
        $category->slug = Str::slug($request->name, '-');
        /* $category->image = $imageurl;*/
        $category->status = $request->status;
        $category->save();

        return redirect('/category')->with('message', 'Category info Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $products = Product::where('category_id',  $category->id)->first();
        if ($products) {
            return redirect()->back()->with('message', 'This category is already used in your products.To delete this category, first change the/those product category ');
        } else {
            $category->delete();
            return redirect('/category')->with('message', 'Category info Delete successfully');
        }
    }
}
