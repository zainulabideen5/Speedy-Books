<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class MainBookController extends Controller
{
    public function book_detail($slug)
    {
        $book = Book::where('slug', $slug)->first();
        return view('book.detail', compact('book'));
    }
}
