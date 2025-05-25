<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Country;
use File;

class AuthorController extends Controller
{
    public function index()
    {
        $seachTerm = request()->get('s');
        $authors = Author::orWhere('title', 'LIKE', "%$seachTerm%")->latest()->paginate(15);
        return view('admin/author/index')
            ->with(compact('authors'));
    }

    public function create()
    {
        $countries = Country::get();
        return view('admin/author/create')
            ->with(compact('countries'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'slug' => 'required',
            'designation' => 'required',
            'dob' => 'required',
            'author_img' => 'required',
            'email' => 'required|email',
            'country' => 'required|not_in:none',
        ]);

        $fileName = null;
        if (request()->hasFile('author_img')) 
        {
            $file = request()->file('author_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        Author::create([
            'title' =>  $request->title,
            'slug' =>  $request->slug,
            'designation' =>  $request->designation,
            'dob' =>  $request->dob,
            'country' =>  $request->country,
            'email' =>  $request->email,
            'phone' =>  $request->phone,
            'description' =>  $request->description,
            'author_feature' =>  $request->author_feature,
            'facebook_id' =>  $request->facebook_id,
            'twitter_id' =>  $request->twitter_id,
            'youtube_id' =>  $request->youtube_id,
            'pinterest_id' =>  $request->pinterest_id,
            'author_img' =>  $fileName,
            'status' =>  'DEACTIVE',
        ]);
        return redirect()->to('/admin/author');
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);
        $countries = Country::get();
        return view('admin/author/edit')
            ->with(compact('author', 'countries'));
    }

    public function update($id, Request $request)
    {
        $author = Author::findOrFail($id);

        $currentImage = $author->author_img;
        $fileName = null;
        if (request()->hasFile('author_img')) 
        {
            $file = request()->file('author_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }


        $author->update([
            'title' =>  $request->title,
            'slug' =>  $request->slug,
            'designation' =>  $request->designation,
            'dob' =>  $request->dob,
            'country' =>  $request->country,
            'email' =>  $request->email,
            'phone' =>  $request->phone,
            'description' =>  $request->description,
            'author_feature' =>  $request->author_feature,
            'facebook_id' =>  $request->facebook_id,
            'twitter_id' =>  $request->twitter_id,
            'youtube_id' =>  $request->youtube_id,
            'pinterest_id' =>  $request->pinterest_id,
            'author_img' =>  ($fileName) ? $fileName : $currentImage,
        ]);

        if ($fileName) {
            File::delete('./uploads/' . $currentImage);
        }
        return redirect()->to('/admin/author');
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id); // where
        $currentImage = $author->author_img;
        $author->delete();
        File::delete('./uploads/' . $currentImage);
        echo 'true';
    }

    public function status($id)
    {
        sleep(1);
        $author = Author::findOrFail($id);
        $newStatus = ($author->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
        $author->update([
            'status' => $newStatus
        ]);

        echo $newStatus;
    }

    public function active_all_status(Request $request)
    {
	$checkAll = $request->get('checkAll');
	foreach($checkAll as $id) {
		echo Author::where('id', $id)->update([
			'status' => 'ACTIVE'
		]);
	}
        
    }

    public function deactive_all_status(Request $request)
    {
	$checkAll = $request->get('checkAll');
	foreach($checkAll as $id) {
		echo Author::where('id', $id)->update([
			'status' => 'DEACTIVE'
		]);
	}
        
    }

    public function delete_all(Request $request)
    {
	$checkAll = $request->get('checkAll');
	foreach($checkAll as $id) {
		echo Author::where('id', $id)->delete();
	}
        
    }

}
