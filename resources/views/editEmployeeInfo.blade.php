@extends("home")
@section("content")

<div class="row">
    <div class="col-sm-2">&nbsp;</div>
    <div class="col-sm-8">

    <div class="modal-header">
      <h4 class="modal-title"style="color:green;">Employee</h4>
     
    </div>

    <form action="{{ route('updateEmployeeInfo') }}" method="post" enctype="multipart/form-data"> @csrf
    @foreach($employees as $employee)
    <div class="modal-body">
        <div class="form-group">
          <label>Employee name</label>
          <input type="hidden" class="form-control" name="employeeID" value="{{$employee->id}}" readonly>
          <input type="text" name="Empname"  class="form-control" value="{{$employee->name}}"/>
        </div>
        
        <div class="form-group">
          <label>Employee Gender</label>
          <input type="text" name="Empgender"  class="form-control" value="{{$employee->gender}}"/>
        </div>
        
        <div class="form-group">
          <label>Employee Contact Number</label>
          <input type="text" name="EmpcontactNo"  class="form-control" value="{{$employee->contactNumber}}"/>
        </div>
     
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Employee Age</label>
              <input type="text" name="Empage"  class="form-control" value="{{$employee->age}}"/>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Employee Position</label>
              <input type="text" name="Empposition" class="form-control" value="{{$employee->position}}"/>
            </div>
          </div>

       
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Employee Department</label>
              <input type="text" name="Empdepartment" class="form-control" value="{{$employee->department}}"/>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Employee File</label>
              <input type="file" name="Empfile" class="form-control" value="{{$employee->empFile}}"/> 
            </div>
          </div>
        </div>
    <div class="modal-footer">
      <a type="button" class="btn btn-default" href="/employee-list" >Back</a>
      <button type="submit" class="btn btn-success" href="" >Save</button>
    </div>
    </div>
    @endforeach
  </form>

</div>
<div class="col-sm-2">&nbsp;</div>
</div>
@endsection