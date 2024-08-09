<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all(); // Retrieve all genres

        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.create');
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
                'unique:genres', // Ensure the name is unique in the 'genres' table
                'regex:/^[a-zA-Z\s]+$/', // Ensure the name does not contain numbers
            ],
            'description' => 'nullable|string',
        ]);

        // Create a new Genre
        Genre::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('genres.index')->with('success', 'Genre added successfully');
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
        $genre = Genre::findOrFail($id); // Retrieve the Genre by ID

        // Return the edit view with the Genre data
        return view('genres.edit', compact('genre'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Genre = Genre::findOrFail($id); // Retrieve the Genre by ID

        // Validate the request data
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:genres,name,' . $id, // Exclude the current record from uniqueness check
                'regex:/^[a-zA-Z\s]+$/', // Ensure the name does not contain numbers
            ],
            'description' => 'nullable|string',
        ]);

        // Update the Genre
        $Genre->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('genres.index')->with('success', 'Genre updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Genre = Genre::findOrFail($id); // Retrieve the Genre by ID
        $Genre->delete(); // Delete the Genre

        // Redirect to the index page with a success message
        return redirect()->route('genres.index')->with('success', 'Genre deleted successfully');
    }
}
