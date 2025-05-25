<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class MainCategoryController extends Controller
{
    public function category_detail($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $books = Book::where('category_id', $category->id)->get();
        $categories = Category::where('status', 'ACTIVE')->get();
        return view('category.detail', compact('category', 'books', 'categories'));
    }
}
