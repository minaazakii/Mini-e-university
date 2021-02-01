<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(User $user)
    {
        $assigments = Assignment::all();
        $assignment = $assigments->where('user_id',$user->id);
        return view('profile',[
            'user'=>$user,
            'assignment'=>$assignment,
            'assignments'=>$assigments

        ]);
    }

    public function upload(Request $request,User $user)
    {
        $this->validate($request,[
            'image' => 'image|mimes:png,jpg,svg,jpeg'
        ]);

        if($request->hasFile('image'))
        {
            $uploadedImage = $request->image;
            $imageName = time().".".$uploadedImage->getClientOriginalExtension();
            $imagePath = public_path('/images');
            $uploadedImage -> move($imagePath ,$imageName);
            $user->image = '/images/'.$imageName;
            $user->save();
        }
        return back();

    }

    public function download($id)
    {
        $file = Assignment::find($id);
        $path =str_replace('\\','/', public_path())."/assignments/".$file->name;
        if(file_exists($path))
        {
            return response()->download($path,$file->name);
        }

    }

    public function delete(Assignment $assignment)
    {
        $name = $assignment->name;
        $path =str_replace('\\','/', public_path())."/assignments/".$name;
        if(file_exists($path))
        {
            //return 'found';
            unlink($path); //to remove from folder
            $assignment->delete();
            return back();
        }
    }

}
