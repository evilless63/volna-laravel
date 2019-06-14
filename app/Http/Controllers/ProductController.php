<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $products; 
    public function __construct() {
        $this->products = Product::latest()->paginate(15);
    } 

    public function index()
    {
        $products = $this->products;
        return View('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if($request->hasFile('main_image_path')) {
            $path = $request->file('main_image_path')->store('uploads\product_images', 'public');
            $data['main_image_path'] = $path;
        }
       
        $data['is_active'] = $request->has('is_active');
        $data['add_shema'] = $request->has('add_shema');
        $product = Product::create($data);

        $request->session()->flash('alert-success', 'Информация успешно добавлена !');
        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $product = Product::findBySlugOrFail($slug);
        return View('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $product = Product::findBySlugOrFail($slug);

        $data = $request->all();

        if($request->hasFile('main_image_path')) {
            $path = $request->file('main_image_path')->store('uploads\product_images', 'public');
            $data['main_image_path'] = $path;
        }

        $data['is_active'] = $request->has('is_active');
        $data['add_shema'] = $request->has('add_shema');
        
        $product->update($data);

        $request->session()->flash('alert-success', 'Информация успешно изменена !');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        $product = Product::findBySlugOrFail($slug);

        // dd(Storage::files($product->main_image_path));
        Storage::delete('/public/' . $product->main_image_path);
        $product->delete();

        $request->session()->flash('alert-success', 'Информация успешно изменена !');
        return redirect()->route('product.index');
    }
}
