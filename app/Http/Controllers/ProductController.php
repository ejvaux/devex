<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Inertia\Inertia;
use URL;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Products/Index', [
            'products' => Product::with('category')->get()->map(function($product){
                $imgpath = [];
                foreach (json_decode($product->image) as $image) {
                    $imgpath[] = Storage::url($image);
                }
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'category' => $product->category->name,
                    'description' => $product->description,                
                    'image' => $imgpath,
                    'datetime' => $product->datetime,
                    'edit_url' => 'products/'.$product->id.'/edit',
                ];
            }),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Products/Create',[
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $imgData = [];
        if($request->hasfile('image')){
            foreach($request->file('image') as $file)
            {
                $name = $file->getClientOriginalName();
                $path = $file->storeAs('public/images', $name);
                $imgData[] = $path;
            }
        }

        $product = new Product;

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->image = json_encode($imgData);
        $product->datetime = $request->datetime;

        $product->save();

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return Inertia::render('Products/Edit',[
            'product' => Product::find($product->id),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $imgData = [];        

        $product = Product::find($product->id);

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;

        if($request->hasfile('image')){
            foreach($request->file('image') as $file)
            {
                $name = $file->getClientOriginalName();
                $path = $file->storeAs('public/images', $name);
                $imgData[] = $path;
            }
            $product->image = json_encode($imgData);
        }

        $product->datetime = $request->datetime;

        $product->save();

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
