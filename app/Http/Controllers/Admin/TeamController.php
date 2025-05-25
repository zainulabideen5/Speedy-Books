<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use File;
class TeamController extends Controller
{
     public function index()
    {
        $seachTerm = request()->get('s');
        $teams = Team::orWhere('fullname', 'LIKE', "%$seachTerm%")->latest()->paginate(15);
    	return view('admin/team/index')
            ->with(compact('teams'));
    }

    public function create()
    {
    	return view('admin/team/create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'fullname' => 'required',
            'designation' => 'required',
            'email' => 'required|email',
            'facebook_id' => 'required',
            'twitter_id' => 'required',
            'pinterest_id' => 'required',
        ]);

        $fileName = null;
        if (request()->hasFile('team_img')) 
        {
            $file = request()->file('team_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        Team::create([
            'fullname' =>  $request->fullname,
            'designation' =>  $request->designation,
            'telephone' =>  $request->telephone,
            'mobile' =>  $request->mobile,
            'email' =>  $request->email,
            'facebook_id' =>  $request->facebook_id,
            'twitter_id' =>  $request->twitter_id,
            'pinterest_id' =>  $request->pinterest_id,
            'description' =>  $request->description,
            'profile' =>  $request->profile,
            'team_img' =>  $fileName,
            'status' =>  'DEACTIVE',
        ]);
        return redirect()->to('/admin/team');

    }

    public function edit($id)
    {
    	$team = Team::findOrFail($id);
        return view('admin/team/edit')
            ->with(compact('team'));
    }

    public function update($id, Request $request)
    {
        $team = Team::findOrFail($id);

        $currentImage = $team->team_img;
        $fileName = null;
        if (request()->hasFile('team_img')) 
        {
            $file = request()->file('team_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        $team->update([
            'fullname' =>  $request->fullname,
            'designation' =>  $request->designation,
            'telephone' =>  $request->telephone,
            'mobile' =>  $request->mobile,
            'email' =>  $request->email,
            'facebook_id' =>  $request->facebook_id,
            'twitter_id' =>  $request->twitter_id,
            'pinterest_id' =>  $request->pinterest_id,
            'description' =>  $request->description,
            'profile' =>  $request->profile,
            'team_img' =>  ($fileName) ? $fileName : $currentImage,
        ]);

        if ($fileName) {
            File::delete('./uploads/' . $currentImage);
        }
        return redirect()->to('/admin/team');        
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id); // where
        $currentImage = $team->team_img;
        $team->delete();
        File::delete('./uploads/' . $currentImage);
        return redirect()->back();
    }

    public function status($id)
    {
        $team = Team::findOrFail($id);
        $newStatus = ($team->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
        $team->update([
            'status' => $newStatus
        ]);
        return redirect()->back();
    }
}
