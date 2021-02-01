<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\User;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(User $user)
    {
        return view('assignment',[
           'user' => $user
        ]);
    }

    public function store(Request $request , User $user)
    {
        $this->validate($request,[
            'name'=>'image|mimes:pdf,doc,docx'
        ]);

        if($request->hasFile('assignment'))
        {
            $uploadedAssignment = $request->assignment;
            $assignmentName = time().'.'. $uploadedAssignment->getClientOriginalExtension();
            $path = public_path('assignments');
            $uploadedAssignment->move($path,$assignmentName);

            Assignment::create([
                'name'=> $assignmentName,
                'user_id'=>$user->id
            ]);
            return back()->with('assignmentSuccess','Uploaded Sucessfully');
        }else{

        return back()->with('assignmentError','No attached File');
    }
    }

}
