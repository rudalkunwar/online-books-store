<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::latest()->take(4)->get();
        $categories = Category::all();
        // $books = array_slice((array)$allBooks, 0, 5);
        return view('user.home', compact('books', 'categories'));
    }
    public function about(Request $request)
    {
        return view('user.about');
    }
    public function contact(Request $request)
    {
        return view('user.contact');
    }
}
