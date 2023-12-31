<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\Models\employee;
// use App\Models\trainingEvent;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function showEmployee(){
        $employees = DB::table('employees')
        // ->where('userID','=',Auth::id())
        ->latest()
        ->get();
        return view('employeeList')->with('employees',$employees);
    }

    public function employeeSearch(){
        $r=request();
        $keyword=$r->keyword;
        $employees = DB::table('employees')
        ->where('employees.name','like','%'.$keyword.'%')      
        ->latest()
        ->get();
        return view('employeeList')->with('employees',$employees);
    }

    public function addEmployee(Request $request)
{
    
    $request->validate([
        'Empname' => 'required',
        'Empgender' => 'required',
        'Empage' => 'required',
        'Empposition' => 'required',
        'Empdepartment' => 'required',
        'EmpcontactNo' => 'required',
        'Empfile' => 'required|file|mimes:pdf,ppt,pptx,doc,docx,jpg,png',
    ]);

    if ($request->hasFile('Empfile')) {
        $file = $request->file('Empfile');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName); 

        $employee = employee::create([
            'name' => $request->input('Empname'),
            'gender' => $request->input('Empgender'),
            'age' => $request->input('Empage'),
            'position' => $request->input('Empposition'),
            'department' => $request->input('Empdepartment'),
            'empFile' => 'uploads/' . $fileName, 
            'contactNumber' => $request->input('EmpcontactNo'),
        ]);
        Session::flash('success',"New Employee Added");

        return redirect()->route('employeeList');

    }

    return redirect()->back()->with('error', 'No file selected for upload.');
        // ______________________________________________________________________________________________________________________
        
}

public function deleteEmployee($id){
    try {
        $employee = employee::find($id);

        // Check if the employee is associated with any events
        if ($employee->trainingEvent->count() > 0) {
            return redirect()->route('employeeList')->with('error', 'Cannot delete this employee because it is associated with events.');
        }

        // If no associated events, proceed with deletion
        $employee->delete();
        return back()->with('success', 'Employee deleted successfully');
    } catch (QueryException $e) {
        // Handle other exceptions if needed
        return back()->with('error', 'Failed to delete the employee: ' . $e->getMessage());
    }
}

public function showEmployeeDetails($id) {
    $employee = Employee::find($id);

    if (!$employee) {

    }

    $employee->load('events');

    return view('employeeTrainingRecord', compact('employee'));
}

public function editEmployeeInfo($id) {
    $employees=employee::all()->where('id',$id);
    // select * from categories where id='$id'
    // return view('dailyExpense',compact('incomes'))->with($income);
    return view('editEmployeeInfo')->with('employees',$employees);

}

public function updateEmployeeInfo(){
    $r=request();//retrive submited form data
    $employees =employee::find($r->employeeID);  //get the record based on income ID              
    $employees->name=$r->Empname;
    $employees->gender=$r->Empgender;
    $employees->age=$r->Empage;
    $employees->position=$r->Empposition;
    $employees->contactNumber=$r->EmpcontactNo;
    $employees->department=$r->Empdepartment;
    $employees->empFile=$r->Empfile;
    $employees->save();
    return redirect()->route('employeeList');
}

}
