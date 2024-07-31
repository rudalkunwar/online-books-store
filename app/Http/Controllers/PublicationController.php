<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::all(); // Retrieve all publications

        return view('publications.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publications.create');
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
                'unique:publications',
                'regex:/^[a-zA-Z\s]+$/',
            ],
            'address' => 'required|string',
            'contact' => 'required|digits:10',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload if exists
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('public/publications');
        }

        // Create and save the new publication using mass assignment
        Publication::create($validatedData);

        // Redirect with a success message
        return redirect()->route('publications.index')->with('success', 'Publication added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $publication = Publication::findOrFail($id); // Retrieve the publication by ID
        return view('publications.show', compact('publication'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $publication = Publication::findOrFail($id); // Retrieve the publication by ID
        return view('publications.edit', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $publication = Publication::findOrFail($id); // Retrieve the publication by ID

        // Validate the request data
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/',
            ],
            'address' => 'required|string',
            'contact' => 'required|digits:10',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if a new photo is uploaded
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($publication->photo) {
                Storage::delete($publication->photo);
            }
            // Store the new photo and update the photo path in validated data
            $validatedData['photo'] = $request->file('photo')->store('public/publications');
        }

        // Update the publication record with the validated data
        $publication->update($validatedData);

        // Redirect with a success message
        return redirect()->route('publications.index')->with('success', 'Publication updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publication = Publication::findOrFail($id); // Retrieve the publication by ID

        // Check if the publication has a photo and delete it from storage
        if ($publication->photo) {
            // Delete the photo file from storage
            Storage::delete($publication->photo);
        }

        // Delete the publication record
        $publication->delete();

        // Redirect with a success message
        return redirect()->route('publications.index')->with('success', 'Publication deleted successfully');
    }
}
