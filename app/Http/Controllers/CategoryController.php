<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all(); // Retrieve all categories

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:categories', // Ensure the name is unique in the 'categories' table
                'regex:/^[a-zA-Z\s]+$/', // Ensure the name does not contain numbers
            ],
            'description' => 'nullable|string',
        ]);

        // Create a new category
        Category::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('categories.index')->with('success', 'Category added successfully');
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
        $category = Category::findOrFail($id); // Retrieve the category by ID

        // Return the edit view with the category data
        return view('categories.edit', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id); // Retrieve the category by ID

        // Validate the request data
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:categories,name,' . $id, // Exclude the current record from uniqueness check
                'regex:/^[a-zA-Z\s]+$/', // Ensure the name does not contain numbers
            ],
            'description' => 'nullable|string',
        ]);

        // Update the category
        $category->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id); // Retrieve the category by ID
        $category->delete(); // Delete the category

        // Redirect to the index page with a success message
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
