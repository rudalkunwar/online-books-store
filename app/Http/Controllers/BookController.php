<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Publication;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('author', 'publication', 'categories')->get(); // Retrieve all books with relationships

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch data for form fields
        $authors = Author::all();          // Fetch all authors
        $publications = Publication::all(); // Fetch all publications
        $categories = Category::all();     // Fetch all categories

        // Return the view with the data
        return view('books.create', [
            'authors' => $authors,
            'publications' => $publications,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'required|exists:authors,id',
            'publication_id' => 'required|exists:publications,id',
            'published_date' => 'nullable|date',
            'price' => 'required|numeric|min:0',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        // Handle the photo upload if present
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('public/books');
        }

        // Create a new book record
        $book = Book::create($validatedData);

        // Attach categories to the book
        if ($request->has('categories')) {
            $book->categories()->attach($request->input('categories'));
        }

        // Redirect to the index page with a success message
        return redirect()->route('books.index')->with('success', 'Book added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::with('author', 'publication', 'categories')->findOrFail($id); // Retrieve the book by ID

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id); // Retrieve the book by ID
        $authors = Author::all();     // Fetch all authors
        $publications = Publication::all(); // Fetch all publications
        $categories = Category::all();     // Fetch all categories

        return view('books.edit', [
            'book' => $book,
            'authors' => $authors,
            'publications' => $publications,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id); // Retrieve the book by ID

        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'required|exists:authors,id',
            'publication_id' => 'required|exists:publications,id',
            'published_date' => 'nullable|date',
            'price' => 'required|numeric|min:0',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        // Handle the photo upload if present
        if ($request->hasFile('photo')) {
            // Delete old photo if it exists
            if ($book->photo) {
                Storage::delete($book->photo);
            }

            // Store the new photo and update the photo path in validated data
            $validatedData['photo'] = $request->file('photo')->store('public/books');
        }

        // Update the book record with the validated data
        $book->update($validatedData);

        // Sync categories to the book (update existing and attach new)
        if ($request->has('categories')) {
            $book->categories()->sync($request->input('categories'));
        } else {
            $book->categories()->detach(); // Remove all categories if none are provided
        }

        // Redirect to the index page with a success message
        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id); // Retrieve the book by ID

        // Delete the book's photo if it exists
        if ($book->photo) {
            Storage::delete($book->photo);
        }

        // Detach categories and delete the book
        $book->categories()->detach();
        $book->delete();

        // Redirect to the index page with a success message
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}