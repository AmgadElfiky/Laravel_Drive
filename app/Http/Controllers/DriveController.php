<?php

namespace App\Http\Controllers;

use App\Drive;
use Illuminate\Http\Request;

class DriveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userID = auth()->user()->id;
        $drives = Drive::where('userID','=',$userID)->get();
        return view('drives.index')->with('drives', $drives);
    }

    public function create()
    {
        return view('drives.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "description"=>"required|min:5|max:100",
            "inputFile"=>"required|file|max:10000,jpg,pdf",
            "level"=>"required"
        ]);
        
        $drive = new Drive();
        $drive->name = $request->name;
        $drive->description = $request->description;
        //File
        $file_data = $request->file('inputFile');
        $file_name = $file_data->getClientOriginalName();
        $file_data->move(public_path() . './upload/' , $file_name);
        $drive->file = $file_name;
        $drive->userID = auth()->user()->id;
        $drive->level = $request->level;
        $drive->save();
        return redirect('drives')->with('done', 'Uplouded Successfuly');
    }

    public function show($id)
    {
        $drive = Drive::find($id);
        return view('drives.show')->with('drive', $drive);
    }

    public function edit($id)
    {
        $drive = Drive::find($id);
        return view('drives.edit')->with('drive', $drive);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name"=>"required",
            "description"=>"required|min:5|max:100",
            "inputFile"=>"required|file|max:10000,jpg,pdf"
        ]);
        
        $drive = Drive::find($id);
        $drive->name = $request->name;
        $drive->description = $request->description;
        //File
        $file_data = $request->file('inputFile');
        $file_name = $file_data->getClientOriginalName();
        $file_data->move(public_path() . './upload/' , $file_name);
        $drive->file = $file_name;
        $drive->userID = auth()->user()->id;
        $drive->level = $request->level;
        $drive->save();
        return redirect('drives')->with('done', 'Uplouded Successfuly');
    }

    public function destroy($id)
    {
        $drive = Drive::find($id);
        $drive->delete();
        return redirect('drives')->with('done', 'Deleted Successfuly');
    }

    public function download($id)
    {
        $drive = Drive::where("id", "=", $id)->firstOrFail();
        $drive_path = public_path('upload/' . $drive->file);
        return response()->download($drive_path);
    }
}