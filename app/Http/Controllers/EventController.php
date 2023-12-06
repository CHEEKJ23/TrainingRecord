<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\Models\employee;
use App\Models\trainingEvent;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function showEvent(){
        $events = DB::table('training_events')
      
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
        'Evfile' => 'required|file|mimes:pdf,ppt,pptx,doc,docx,jpg,png,csv',
    ]);

    if ($request->hasFile('Evfile')) {
        $file = $request->file('Evfile');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName); 

        $event = trainingEvent::create([
            'name' => $request->input('Evname'),
            'trainer' => $request->input('Evtrainer'),
            'description' => $request->input('Evdescription'),
            'dateTime' => $request->input('Evdate'),
            'location' => $request->input('Evlocation'),
            'eveFile' => 'uploads/' . $fileName, 
        ]);

        Session::flash('success',"New Event Added");

        return redirect()->route('eventList');
    }

    return redirect()->back()->with('error', 'No file selected for upload.');
        // ______________________________________________________________________________________________________________________
        
}

// public function deleteEvent($id){
//     $event= trainingEvent::find($id);
//     $event->delete();
//     return back();
// }

public function deleteEvent($id){
    try {
        $event = trainingEvent::find($id);

        if ($event->employee->count() > 0) {
            return redirect()->route('eventList')->with('error', 'Cannot delete this event because it is associated with employees.');
        }

        $event->delete();
        return redirect()->route('eventList')->with('success', 'Event deleted successfully');
    } catch (QueryException $e) {
        return redirect()->route('eventList')->with('error', 'Failed to delete the event: ' . $e->getMessage());
    }
}

public function showEventDetails($id) {
    $event = trainingEvent::find($id);

    if (!$event) {

    }

    $event->load('employee');

    return view('trainingEventRecord', compact('event'));
}

public function editEventInfo($id) {
    $events=trainingEvent::all()->where('id',$id);
    // select * from categories where id='$id'
    // return view('dailyExpense',compact('incomes'))->with($income);
    return view('editEventInfo')->with('events',$events);

}

public function updateEventInfo(){
    $r=request();//retrive submited form data
    $events =trainingEvent::find($r->eventID);  //get the record based on income ID              
    $events->name=$r->Evname;
    $events->trainer=$r->Evtrainer;
    $events->description=$r->Evdescription;
    $events->dateTime=$r->Evdate;
    $events->location=$r->Evlocation;
    $events->eveFile=$r->Evfile;
    $events->save();
    return redirect()->route('eventList');
}

}
