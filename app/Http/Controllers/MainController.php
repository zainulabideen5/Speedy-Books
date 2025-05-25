<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Category;
use App\Models\Media;
use App\Models\Book;
use App\Models\Team;

class MainController extends Controller
{
    public function index()
    {
        $sliders = Media::where(['status' => 'ACTIVE', 'media_type' => 'slider'])->get();
        $upcoming_books = Book::where('status', 'UPCOMING')->limit(5)->get();
        $downloaded_books = Book::with('author', 'category')->orderBy('downloaded', 'DESC')->get();
        $recommended_books = Book::where('recommended', '1')->get();
        $categories = Category::where('status', 'ACTIVE')->get();
        $books = Book::with('author')->where('status', 'ACTIVE')->paginate(10);
        $author_feature = Author::where(['status' => 'ACTIVE', 'author_feature' => 'yes'])->inRandomOrder()->first();
        $galleries = Media::where(['status' => 'ACTIVE', 'media_type' => 'gallery'])->limit(6)->get();
        return view('index', compact('sliders', 'upcoming_books', 'downloaded_books', 'recommended_books', 'categories', 'books', 'author_feature', 'galleries'));
    }

    public function about()
    {
        $teams = Team::where('status', 'active')->limit(5)->get();
        return view('about', compact('teams'));
    }

    public function gallery()
    {
        $galleries = Media::where(['status' => 'ACTIVE', 'media_type' => 'gallery'])->paginate(8);
        return view('gallery', compact('galleries'));
    }

    public function author()
    {
        $searchTerm = request()->get('letter');
        $authors = Author::where('title', 'LIKE', "$searchTerm%")->paginate(10);
        $author_features = Author::where('author_feature', 'yes')->limit(5)->get();
        $downloaded_books = Book::orderBy('downloaded', 'DESC')->limit(5)->get();
        return view('author', compact('authors', 'author_features', 'downloaded_books'));
    }

    public function contact()
    {
        return view('contact');
    }
}
