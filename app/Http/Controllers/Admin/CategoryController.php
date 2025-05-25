<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {   
        $seachTerm = request()->get('s');
        $categories = Category::orWhere('title', 'LIKE', "%$seachTerm%")->latest()->paginate(15);
        return view('admin/category/index')
            ->with(compact('categories'));
    }

    public function create()
    {
    	return view('admin/category/create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'slug' => 'required',
        ]);

        Category::create([
            'title' =>  $request->title,
            'slug' =>  $request->slug,
            'description' =>  $request->description,
            'status' =>  'DEACTIVE',
        ]);
        return redirect()->to('/admin/category');
    }

    public function edit($id)
    {
    	$category = Category::findOrFail($id);
        return view('admin/category/edit')
            ->with(compact('category'));
    }

    public function update($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'title' =>  $request->title,
            'slug' =>  $request->slug,
            'description' =>  $request->description,
        ]);
        return redirect()->to('/admin/category');
            
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id); // where
        $category->delete();
        return redirect()->back();
    }

    public function status($id)
    {
        $category = Category::findOrFail($id);
        $newStatus = ($category->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
        $category->update([
            'status' => $newStatus
        ]);
        return redirect()->back();
    }
}
