<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Variable to store the Category model
    protected $category;

    // Constructor to initialize the Category model
    public function __construct(){
        $this->category = new Category();
    }
    // Function to display all categories
     public function index()
    {
        $response['categories'] = $this->category->all();
        return view('category.index')->with($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'catname' => 'required|string',
            'status' => 'required|boolean'
        ]);

        $this->category->create($request->all());
        toast('Category created successfully', 'success');
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = $this->category->find($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'catname' => 'required',
            'status' => 'required'
        ]);

        $category = $this->category->find($id);
        $category->update(array_merge($category->toArray(), $request->toArray()));
        toast()->success('Category updated successfully');
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = $this->category->find($id);
        $category->delete();
        toast()->success('Category deleted successfully');
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
