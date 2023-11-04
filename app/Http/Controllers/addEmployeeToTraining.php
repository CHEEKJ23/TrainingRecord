<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\Models\employee;
use App\Models\trainingEvent;
use Illuminate\Support\Facades\Storage;

class addEmployeeToTraining extends Controller
{
    public function showEmployeeAndEvent(){
        $employees=employee::all();
        $trainingEvents=trainingEvent::all();
        return view('addEmployeeToEvent', compact('employees', 'trainingEvents'));
    }

    public function associateEmployeesToEvents(Request $request){

    $employeeIds = $request->input('employee_ids');
    $eventIds = $request->input('event_ids');

    foreach ($eventIds as $eventId) {
        $event = trainingEvent::find($eventId);

        if ($event) {
            $event->employee()->sync($employeeIds);
        }
    }

    return back()->with('success', 'Employees assigned to events successfully');
}
}
