@extends('home')
@section('content')

  <div class="container" style="background-color: #fff; margin-top:5%; border-radius:15px;">
    <div class="row">
      <div class="col-md-12">
        @if(Session::has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>employee added</p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <p>Cannot delete this employee because it is associated with events.</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
          <br>
          <h2>Employee List</h2>
          <br>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
          <form class="form-inline my-2 my-lg-0" action="{{route('employeeSearch')}}" method="post">
              @csrf
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="keyword" name="keyword" style="height:40px;">
              <button class="btn btn-secondary" type="submit" style="height:40px;">Search</button>
          </form>
          <!-- <form class="form-inline my-2 my-lg-0" action="{{route('addEvent')}}" method="post">
              @csrf
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="keyword" name="keyword" style="height:40px;">
              <button class="btn btn-secondary" data-toggle="modal" data-target="#addEvent-modal">Add Training Event</button>
          </form>  -->
      </div>

      <div class="col-md-3"></div>

      <div class="col-md-3">
          <button class="btn btn-secondary" data-toggle="modal" data-target="#addEvent-modal">Add Employee</button>
      </div>
    </div>
    <br>

  <!-- modalPlus -->
  <div class="modal fade" id="addEvent-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Employee Details</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>

        <form action="{{ route('addEmployee') }}" method="post" enctype="multipart/form-data"> 
          @csrf
          <div class="modal-body">
              <div class="form-group">
                <label>Employee Name</label>
                <input type="text" name="Empname"  class="form-control" required/>
              </div>
              
              <div class="form-group">
                <label>Gender</label>
                <!-- {{-- <input type="text" name="Empgender"  class="form-control" > --}} -->
                <input list="browsers" name="Empgender"  class="form-control" required/>
                <datalist id="browsers">
                  <option value="Male">
                  <option value="Female">
                </datalist>
              </div>

              <div class="form-group">
                <label>Contact Number</label>
                <input type="text" name="EmpcontactNo"  class="form-control" >
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Age</label>
                    <input type="text" name="Empage"  class="form-control" required/>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Position</label>
                    <input type="text" name="Empposition" class="form-control" required/>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Department</label>
                    <input type="text" name="Empdepartment" class="form-control" required/>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Employee Files</label>
                    <input type="file" name="Empfile" class="form-control"  /> 
                  </div>
                </div>
              </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
              <button type="submit" class="btn btn-success" href="" >Save</button>
            </div>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modalPlus -->

  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Age</th>
            <th scope="col">Position</th>
            <th scope="col">Department</th>
            <th scope="col">Contact Number</th>
            {{-- <th scope="col">Employee Files</th> --}}
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if(count($employees))
            @foreach($employees as $employee)
            <tr>
              <th scope="row">{{$employee->id}}</th>

              <td>{{$employee->name}}</td>
              <td>{{$employee->gender}}</td>
              <td>{{$employee->age}}</td>
              <td>{{$employee->position}}</td>
              <td>{{$employee->department}}</td>
              <td>{{$employee->contactNumber}}</td>
              <!-- {{-- <td>
                  @if ($employee->empFile)
                    <a class="btn btn-success" href="{{ asset($employee->empFile) }}" target="_blank">{{ $employee->empFile }}</a> |
                    <a class="btn btn-success" href="{{ asset($employee->empFile) }}" download>Download File</a>
                  @else
                    No File Available
                  @endif
              </td> --}} -->

              <td>
                <a class="btn" href="{{route('deleteEmployee',['id'=>$employee->id])}}" onClick="return confirm('Are you sure you want to delete this user?')"><i class="fa fa-trash"></i> 
                  Delete
                </a>
                <a class="btn"href="{{route('showEmployeeDetails',['id'=>$employee->id])}}">
                <i class="fa fa-folder"></i> 
                  View Record
                </a>
                <a class="btn" href="{{route('editEmployeeInfo',['id'=>$employee->id])}}"><i class="fa fa-edit"></i> Edit</a>
              </td>
            </tr>
            @endforeach
          @else
            <tr>
              <th scope="row">--</th>
              <td>--</td>
              <td>--</td>
              <td>--</td>
              <td>--</td>
              <td>--</td>
              <td>--</td>
              <td>--</td>
              <td>--</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
<br>
<br>
@endsection

