<?php

namespace App\Http\Controllers;

use App\Models\Apparence;
use App\Models\Brand;
use App\Models\Category;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Subimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Fontendcontroller extends Controller
{
    public function index()
    {
       
        return view('fontend.index',
        ['products' => Product::orderBy('id', 'desc')->get(),
        'banersliders' => Product::where('status','Published' )->where('category_id', 15)->get(),
        'banersaide' => Product::where('status','Published' )->where('category_id', 15)->get(),
        'NewArrival' => Product::where('status','Published' )->orderBy('created_at', 'desc')->get(),
        'brands' => Product::where('status','Published' )->orderBy('brand_id', 'desc')->get(),
        'Affordable' => Product::where('status','Published' )->orderBy('Product_Price', 'asc')->get(),
        'horizontal' => Product::where('status','Published' )->orderBy('id', 'desc')->get(),
        'horizontal1' => Product::where('status','Published' )->orderBy('id', 'asc')->get(),
        'bestsaller' =>  Product::orderBy('id', 'desc')->get(),
        'populer' => Product::where('status','Published' )->orderBy('id', 'asc')->get(),
        'categories' => Category::where('status','Published' )->get(),
        'brand1' => Brand::where('status','Published' )->get(),
        'setting' => Apparence::get()
        
    ]);
    }

    public function about()
    {
        return view('fontend.about-us',[
            'categories' => Category::where('status','Published' )->get(),
            'brand1' => Brand::where('status','Published' )->get(),
            'setting' => Apparence::get(),
            'settingabout' => Apparence::first()
        ]);
    }
    public function privacy()
    {
        return view('fontend.privacy',[
            'categories' => Category::where('status','Published' )->get(),
            'brand1' => Brand::where('status','Published' )->get(),
            'setting' => Apparence::get(),
            'settingprivacy' => Apparence::first()
        ]);
    }
    public function contact()
    {
        return view('fontend.contact',[
            'categories' => Category::where('status','Published' )->get(),
            'brand1' => Brand::where('status','Published' )->get(),
            'setting' => Apparence::get(),
            'settingcontuct' => Apparence::first()
            
        ]);
    }

    public function category($slug)
    { 

  $category = Category::where('slug', $slug)->first();
        return view('fontend.shop-category',[

            'banersliders' => Product::where('status','Published' )->where('category_id', 15)->orderBy('id','desc')->get(),
         'categoryproducts' => Product::where('category_id', $category->id)->where('status','Published' )->orderBy('id','desc')->paginate(9),
            'categories' => Category::where('status','Published' )->get(),
            'brand1' => Brand::where('status','Published' )->get(),
            'setting' => Apparence::get()
        ]);
    }
/* search prodct */

    public function searchproduct(Request $request)
    { 
  $product = Product::where('Product_name', $request->slug)->first();
  if( $product){
    return view('fontend.product-details', [
        'product' =>$product,
        'related_products' => Product::where('category_id', $product->category_id)->where('status','Published' )->orderBy('id','desc')->get(), 
        'subimages'  => Subimage::where('product_id', $product->id)->get(),
        'categories' => Category::where('status','Published' )->get(),
        'brand1' => Brand::where('status','Published' )->get(),
        'setting' => Apparence::get()
    ]);
  }
  else{
    return redirect()->back()->with('message', 'No Product found');
  }
       
    }
    public function searchproductget(Request $request){
      
        $slug = $request->slug;
        $productData =  DB::table('products')->where('Product_name', 'LIKE','%'.$slug.'%')->get();
       $html = '';
        $html .= '<div><ul class="list-group float-left " >';
        if($productData){
            foreach($productData as $v){
                $html .= '<li class="list-group-item"> <img src="'. asset($v->image) .'" class=" mr-2" width="40px" height="30px" alt="">'.$v->Product_name.'</li>';

            }
        }
        $html .= '</ul></div>';
        return response()->json($html);
    }

/* search prodct */

    public function brand($slug)
    { 
        $brand = Brand::where('slug', $slug)->first();
        return view('fontend.shop-brand',[
            'banersliders1' => Product::where('status','Published' )->where('category_id', 15)->orderBy('id','asc')->get(),
            'brandproducts' => Product::where('brand_id', $brand->id)->where('status','Published' )->orderBy('id','desc')->paginate(9),
            'productbaner' => Product::where('brand_id', $brand->id)->where('status','Published' )->get(),
            'categories' => Category::where('status','Published' )->get(),
            'brand1' => Brand::where('status','Published' )->get(),
            'setting' => Apparence::get()

        ]);
    }

    public function accessories()
    { 
     
        return view('fontend.accessories',[
            'banersliders1' => Product::where('status','Published' )->where('category_id', 15)->orderBy('id','asc')->get(),
            'accessories' => Product::where('category_id', 26)->where('status','Published' )->orderBy('id','desc')->paginate(9),
            'categories' => Category::where('status','Published' )->get(),
            'brand1' => Brand::where('status','Published' )->get(),
            'setting' => Apparence::get()

        ]);
    }
    
    public function details($slug)
    { 
        $product = Product::where('slug', $slug )->first();
        return view('fontend.product-details', [
            'product' =>$product,
            'related_products' => Product::where('category_id', $product->category_id)->where('status','Published' )->orderBy('id','desc')->get(), 
            'subimages'  => Subimage::where('product_id', $product->id)->get(),
            'categories' => Category::where('status','Published' )->get(),
            'brand1' => Brand::where('status','Published' )->get(),
            'setting' => Apparence::get()

        ]);
    }
    
}
