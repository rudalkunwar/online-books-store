<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Publication;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('author', 'publication', 'category', 'genres')->get(); // Retrieve all books with relationships

        // dd($books);

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
        $genres = Genre::all();     // Fetch all genres

        // Return the view with the data
        return view('books.create', [
            'authors' => $authors,
            'publications' => $publications,
            'genres' => $genres,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255|unique:books|regex:/^[a-zA-Z\s]+$/',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'required|exists:authors,id',
            'publication_id' => 'required|exists:publications,id',
            'published_date' => 'nullable|date',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'genres' => 'nullable|array',
            'genres.*' => 'exists:genres,id',
        ]);


        // Handle the photo upload if present
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('public/books');
        }

        // Create a new book record
        $book = Book::create($validatedData);

        // Attach categories to the book
        if ($request->has('genres')) {
            $book->genres()->attach($request->input('genres'));
        }

        // Redirect to the index page with a success message
        return redirect()->route('books.index')->with('success', 'Book added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::with('author', 'publication', 'category', 'genres')->findOrFail($id); // Retrieve the book by ID

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
        $genres = Genre::all();     // Fetch all genres


        return view('books.edit', [
            'book' => $book,
            'authors' => $authors,
            'publications' => $publications,
            'categories' => $categories,
            'genres' => $genres
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData =  $request->validate([
            'title' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'required|exists:authors,id',
            'publication_id' => 'required|exists:publications,id',
            'published_date' => 'nullable|date',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'genres' => 'nullable|array',
            'genres.*' => 'exists:genres,id',
        ]);

        $book = Book::findOrFail($id);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/books');
            $book->photo = $photoPath;
        }

        $book->update($validatedData);

        // Sync categories
        $book->genres()->sync($request->input('genres', []));

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
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
        $book->genres()->detach();

        $book->delete();

        // Redirect to the index page with a success message
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
