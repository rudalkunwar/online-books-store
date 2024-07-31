<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('authors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
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
                'unique:authors', // Ensure the name is unique in the 'authors' table
                'regex:/^[a-zA-Z\s]+$/', // Ensure the name does not contain numbers
            ],
            'bio' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle photo upload if present
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/photos');
            $validatedData['photo'] = $photoPath;
        }

        // Create a new author
        Author::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('authors.index')->with('success', 'Author added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = Author::findOrFail($id); // Retrieve the author by ID
        return view('authors.show', ['author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author = Author::findOrFail($id); // Retrieve the author by ID
        return view('authors.edit', ['author' => $author]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $author = Author::findOrFail($id); // Retrieve the author by ID

        // Handle photo upload if present
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($author->photo) {
                Storage::delete($author->photo);
            }
            $photoPath = $request->file('photo')->store('public/photos');
            $validatedData['photo'] = $photoPath;
        }

        // Update the author
        $author->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('authors.index')->with('success', 'Author updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::findOrFail($id); // Retrieve the author by ID

        // Delete the author's photo if exists
        if ($author->photo) {
            Storage::delete($author->photo);
        }

        // Delete the author
        $author->delete();

        // Redirect to the index page with a success message
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully');
    }
}
