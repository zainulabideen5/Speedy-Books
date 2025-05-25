<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Country;
use App\Models\Author;
use App\Models\Category;
use File;

class BookController extends Controller
{
    public function index()
    {
        $seachTerm = request()->get('s');
    	$books = Book::orWhere('title', 'LIKE', "%$seachTerm%")->latest()->paginate(15); 
        return view('admin/book/index')
            ->with(compact('books'));
    }

    public function create()
    {
    	$countries = Country::get();
        $authors = Author::get();
        $categories = Category::get();
        return view('admin/book/create')
            ->with(compact('countries', 'authors', 'categories'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'slug' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
            'availability' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $fileName = null;
        if (request()->hasFile('book_img')) 
        {
            $file = request()->file('book_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        $bookUpload = null;
        if (request()->hasFile('book_upload')) 
        {
            $file = request()->file('book_upload');
            $bookUpload = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $bookUpload);
        }

        Book::create([
            'title' =>  $request->title,
            'slug' =>  $request->slug,
            'category_id' =>  $request->category_id,
            'author_id' =>  $request->author_id,
            'availability' =>  $request->availability,
            'price' =>  $request->price,
            'rating' =>  'ratings',
            'publisher' =>  $request->publisher,
            'country_of_publisher' =>  $request->country_of_publisher,
            'isbn' =>  $request->isbn,
            'isbn-10' =>  $request->isbn_10,
            'audience' =>  $request->audience,
            'format' =>  $request->format,
            'language' =>  $request->language,
            'description' =>  $request->description,
            'book_upload' =>  $bookUpload,
            'book_img' =>  $fileName,
            'total_pages' =>  $request->total_pages,
            'edition_number' =>  $request->edition_number,
            'recommended' =>  $request->recomended,
            'downloaded' =>  '1',
            'status' =>  'DEACTIVE',
        ]);
        return redirect()->to('/admin/book');
    }

    public function edit($id)
    {
    	$book = Book::findOrFail($id);
        $countries = Country::get();
        $authors = Author::get();
        $categories = Category::get();
        return view('admin/book/edit')
            ->with(compact('book', 'countries', 'authors', 'categories'));
    }

    public function update($id, Request $request)
    {
        $book = Book::findOrFail($id);

        $currentImage = $book->book_img;
        $fileName = null;
        if (request()->hasFile('book_img')) 
        {
            $file = request()->file('book_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        $book->update([
            'title' =>  $request->title,
            'slug' =>  $request->slug,
            'category_id' =>  $request->category_id,
            'author_id' =>  $request->author_id,
            'availability' =>  $request->availability,
            'price' =>  $request->price,
            'rating' =>  'ratings',
            'publisher' =>  $request->publisher,
            'country_of_publisher' =>  $request->country_of_publisher,
            'isbn' =>  $request->isbn,
            'isbn-10' =>  $request->isbn_10,
            'audience' =>  $request->audience,
            'format' =>  $request->format,
            'language' =>  $request->language,
            'description' =>  $request->description,
            'book_upload' =>  'No book found',
            'book_img' =>  ($fileName) ? $fileName : $currentImage,
            'total_pages' =>  $request->total_pages,
            'edition_number' =>  $request->edition_number,
            'recommended' =>  $request->recomended,
            'downloaded' =>  '1',
        ]);

        if ($fileName) {
            File::delete('./uploads/' . $currentImage);
        }

        return redirect()->to('/admin/book');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id); // where
        $currentImage = $book->book_img;
        $book->delete();
        File::delete('./uploads/' . $currentImage);
        return redirect()->back();
    }

    public function status($id)
    {
        $book = Book::findOrFail($id);
        $newStatus = ($book->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
        $book->update([
            'status' => $newStatus
        ]);
        return redirect()->back();
    }
}
