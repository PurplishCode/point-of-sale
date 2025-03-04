<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     protected $product;

        public function __construct(){
            $this->product = new Product();
        }
    public function index()
    {
        $products = $this->product->all();
        $categories = Category::pluck('catname', 'id');
        $brands = Brand::pluck('brandname', 'id');
        return view('product.index', compact('products', 'categories', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('catname', 'id');
        $brands = Brand::pluck('brandname', 'id');
        return view('product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'productname' => 'required|string',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $this->product->create($request->all());
        toast('Product created successfully', 'success');
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = $this->product->find($id);
        $categories = Category::pluck('catname','id');
        $brands = Brand::pluck('brandname','id');
        return view('product.edit', compact('product','categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'productName' => 'required|string',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'price' => 'required|numeric',
        ]);
        $product = $this->product->find($id);
        $product->update($request->all());
        toast('Product updated successfully', 'success');
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);
        $product->delete();
        toast()->success('Product deleted successfully');
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
