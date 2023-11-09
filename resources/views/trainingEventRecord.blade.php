@extends('home')
@section('content')

<div class="container" style="background-color: #fff; margin-top:5%; border-radius:15px;">
    {{-- <div class="row">
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
    </div> --}}
    <div class="row">
        <div class="col-md-12 text-center">
            <br>
            <h2>{{$event->name}} 's record</h2>
            <br>
        </div>
    </div>

    <br>


    <div class="row">
        <div class="col-md-12">
           
          <h1>{{ $event->name }}</h1>
          <p>Trainer: {{ $event->trainer }}</p>
          <p>Description: {{ $event->description }}</p>
          <p>Date & Time: {{ $event->dateTime }}</p>
          <p>Location: {{ $event->location }}</p>
            
          <h2>Associated Employees</h2>

          {{-- @if ($employee->events->count() > 0)
          <ul>
              @foreach ($employee->events as $event)
                  <li>
                      <strong>{{ $event->name }}</strong><br>
                      Trainer: {{ $event->trainer }}
                      Description: {{ $event->description }}<br>
                      Date and Time: {{ $event->dateTime }}<br>
                      Location: {{ $event->location }}<br>
                      <!-- Add more event details here as needed -->
                  </li>
              @endforeach
          </ul>
      @else
          <p>No associated events.</p>
      @endif --}}
      <table style="border: 1px solid" class="table">
        <thead>
            <tr>
                <th scope="col" style="border: 1px solid">Name</th>
                <th scope="col"style="border: 1px solid">Gender</th>
                <th scope="col" style="border: 1px solid">Age</th>
                <th scope="col" style="border: 1px solid">Position</th>
                <th scope="col" style="border: 1px solid; width:20%;">Department</th>
                <th scope="col" style="border: 1px solid">Contact Number</th>
                <th scope="col" style="border: 1px solid">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($event->employee->count() > 0)
            @foreach ($event->employee as $employee)
                <tr>
                    <td style="border: 1px solid">{{$employee->name}}</td>
                    <td style="border: 1px solid">{{$employee->gender}}</td>
                    <td style="border: 1px solid">{{$employee->age}}</td>
                    <td style="border: 1px solid">{{$employee->position}}</td>
                    <td style="border: 1px solid;">{{$employee->department}}</td>
                    <td style="border: 1px solid;">{{$employee->contactNumber}}</td>
                    <td style="border: 1px solid;">
                     
                        <a class="btn" href="{{ route('deleteEmployeeFromEvent', ['employeeId' => $employee->id, 'eventId' => $event->id]) }}"><i class="fa fa-trash"></i> Delete Employee from Event</a>
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
                </tr>
            @endif
        </tbody>
    </table>
      <br>
      <br>
        </div>
    </div>
</div>
<br>
<br>
{{-- <button id="generate-pdf">Generate PDF</button>

<script>
  document.getElementById('generate-pdf').addEventListener('click', function () {
      const employeeId = {{ $employee->id }};
      window.location.href = `/generate-pdf/${employeeId}`;
  });
</script> --}}

@endsection