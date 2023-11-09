<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use PDF;
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

//     public function associateEmployeesToEvents(Request $request){

//     $employeeIds = $request->input('employee_ids');
//     $eventIds = $request->input('event_ids');

//     foreach ($eventIds as $eventId) {
//         $event = trainingEvent::find($eventId);

//         if ($event) {
//             $event->employee()->sync($employeeIds);
//         }
//     }

//     return back()->with('success', 'Employees assigned to events successfully');
// }
public function associateEmployeesToEvents(Request $request) {
    $employeeIds = $request->input('employee_ids');
    $eventIds = $request->input('event_ids');

    $hasConflictingEvent = false;

    foreach ($eventIds as $eventId) {
        $event = trainingEvent::find($eventId);

       
        foreach ($employeeIds as $employeeId) {
            $employee = Employee::find($employeeId);

            if ($employee->events->contains('dateTime', $event->dateTime)) {
                $hasConflictingEvent = true;
                break; 
            }
        }

        if ($hasConflictingEvent) {
        
            return redirect()->route('showEmployeeAndEvent')->with('info', 'One or more selected employees already have a conflicting event.');
        }

        $event->employee()->sync($employeeIds);
    }

    return back()->with('success', 'Employees assigned to events successfully');
}

public function generatePDF($id)
{
    $employee = Employee::with('events')->find($id);

    if (!$employee) {
        return redirect()->route('employeeList')->with('error', 'Employee not found.');
    }

    // $pdf = PDF::loadView('employeeTrainingRecord', compact('employee'));
    $pdf = PDF::loadView('employeePDF', ['employee' => $employee]);


    // return $pdf->download('employeeTrainingRecord.pdf');
    return $pdf->stream();
}

}
