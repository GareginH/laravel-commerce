<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Image;
use App\Category;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop(Request $request)
    {
        $products = Product::all();
        return view('shop.index', compact('products'));
    }

    public function latestProducts(){
        $products = Product::orderBy('created_at', 'desc')->simplePaginate(4);
        return response()->json($products);
    }
    public function vueShop(Request $request)
    {
        if($request->Title != null){
            $products = Product::where('Title', 'Like', '%'.$request->Title.'%')->simplePaginate(2);
            return response()->json($products);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image'=>['required', 'image', 'max:2000'],
        ]);
        $rand = str_random(10);
        $name = $rand.$request->image->getClientOriginalName();
        $path = "storage/products/".$name;
        $img = Image::make($request->image->getRealPath());
        $water = Image::make('storage/products/'.'watermark.png');
        $water->resize(550, 550);
        $img->resize(600, 600);
        $img->insert($water, 'center');
        $img->save($path);
        
        Category::where('name', $data['category'])->first()->product()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'image' => $path,
        ]);
        return redirect('admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image'=>['required', 'image', 'max:2000'],
        ]);
        $rand = str_random(10);
        $name = $rand.$request->image->getClientOriginalName();
        $path = "storage/products/".$name;
        $img = Image::make($request->image->getRealPath());
        $water = Image::make('storage/products/'.'watermark.png');
        $water->resize(550, 550);
        File::delete($product->Image);
        $img->resize(600, 600);
        $img->insert($water, 'center');
        $img->save($path);

        $nPath = "http://drive.google.com/uc?export=view&id=".$name;
        
        \Storage::cloud()->delete('https://drive.google.com/file/d/'.$name);
        \Storage::cloud()->put($name, $img);
        $product->Title = $data['title'];
        $product->Description = $data['description'];
        $product->Price = $data['price'];
        $product->Quantity = $data['quantity'];
        
        $product->Image = $path;
        
        $product->save();
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
