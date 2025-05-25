<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use File;
class MediaController extends Controller
{
     public function index()
    {   
        $seachTerm = request()->get('s');
        $medias = Media::orWhere('title', 'LIKE', "%$seachTerm%")->latest()->paginate(15);
    	return view('admin/media/index')
            ->with(compact('medias'));
    }

    public function create()
    {
        return view('admin/media/create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'slug' => 'required',
            'media_type' => 'required|not_in:none',
            ]);

        $fileName = null;
        if (request()->hasFile('media_img')) 
        {
            $file = request()->file('media_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        Media::create([
            'title' =>  $request->title,
            'slug' =>  $request->slug,
            'media_type' =>  $request->media_type,
            'description' =>  $request->description,
            'media_img' =>  $fileName,
            'status' =>  'DEACTIVE',
        ]);
        return redirect()->to('/admin/media');    
    }

    public function edit($id)
    {
    	$media = Media::findOrFail($id);
        return view('admin/media/edit')
            ->with(compact('media'));
    }

    public function update($id, Request $request)
    {
        $media = Media::findOrFail($id);

        $currentImage = $media->media_img;
        $fileName = null;
        if (request()->hasFile('media_img')) 
        {
            $file = request()->file('media_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        $media->update([
            'title' =>  $request->title,
            'slug' =>  $request->slug,
            'media_type' =>  $request->media_type,
            'description' =>  $request->description,
            'media_img' =>  ($fileName) ? $fileName : $currentImage,                 
        ]);

        if ($fileName) {
            File::delete('./uploads/' . $currentImage);
        }
        return redirect()->to('/admin/media');    
    }

    public function destroy($id)
    {
        $media = Media::findOrFail($id); // where
        $currentImage = $media->media_img;
        $media->delete();
        File::delete('./uploads/' . $currentImage);
        return redirect()->back();
    }

    public function status($id)
    {
        $media = Media::findOrFail($id);
        $newStatus = ($media->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
        $media->update([
            'status' => $newStatus
        ]);
        return redirect()->back();
    }
}
