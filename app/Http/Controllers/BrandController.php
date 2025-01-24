<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $brand;

        public function __construct(){
            $this->brand = new Brand();
        }
    public function index()
    {
        return view('brand.index')->with('brands', $this->brand->all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brandname' => 'required|string',
            'status' => 'required|boolean'
        ]);

        $this->brand->create($request->all());
        toast('Brand created successfully', 'success');
        return redirect()->route('brands.index')->with('success', 'Brand created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brands = $this->brand->find($id);
        return view('brand.edit', compact('brands'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brandname' => 'required',
            'status' => 'required'
        ]);

        $brand = $this->brand->find($id);
        $brand->update(array_merge($brand->toArray(), $request->toArray()));
        toast()->success('Brand updated successfully');
        return redirect()->route('brands.index')->with('success','Brand created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $this->brand->destroy($brand->id);
        toast('Brand deleted successfully', 'success');
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully');
    }
}
