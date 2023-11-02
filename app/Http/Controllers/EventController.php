<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
// use App\Models\employee;
use App\Models\trainingEvent;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function showEvent(){
        $events = DB::table('training_events')
        // ->where('userID','=',Auth::id())
        ->latest()
        ->get();
        return view('eventList')->with('events',$events);
    }

    public function eventSearch(){
        $r=request();
        $keyword=$r->keyword;
        $events = DB::table('training_events')
        // ->where('role_as','=','0')
        ->where('training_events.name','like','%'.$keyword.'%')      
        ->latest()
        ->get();
        return view('eventList')->with('events',$events);
    }

    public function addEvent(Request $request)
{
    $request->validate([
        'Evname' => 'required',
        'Evtrainer' => 'required',
        'Evdescription' => 'required',
        'Evdate' => 'required',
        'Evlocation' => 'required',
        'Evfile' => 'required|file|mimes:pdf,ppt,pptx,doc,docx,jpg,png',
    ]);

    if ($request->hasFile('Evfile')) {
        $file = $request->file('Evfile');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName); // Store the file in the 'public/uploads' directory

        $event = trainingEvent::create([
            'name' => $request->input('Evname'),
            'trainer' => $request->input('Evtrainer'),
            'description' => $request->input('Evdescription'),
            'dateTime' => $request->input('Evdate'),
            'location' => $request->input('Evlocation'),
            'eveFile' => 'uploads/' . $fileName, // Store the file path in the 'eveFile' column
        ]);

        return redirect()->route('eventList')->with('success', 'Event added successfully');
    }

    return redirect()->back()->with('error', 'No file selected for upload.');
        // ______________________________________________________________________________________________________________________
        
}

public function deleteEvent($id){
    $event= trainingEvent::find($id);
    $event->delete();
    return back();
}

}
