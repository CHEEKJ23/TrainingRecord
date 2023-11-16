<!-- {{-- @extends('home')
@section('content') --}} -->

<div class="container" style="background-color: #fff; margin-top:5%; border-radius:15px;">
    <!-- {{-- <div class="row">
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
    </div> --}} -->
    <div class="row">
        <div class="col-md-12 text-center">
            <br>
            <h2>{{$employee->name}} 's record</h2>
            <br>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-12">
          <h1>{{ $employee->name }}</h1>
          <p>Gender: {{ $employee->gender }}</p>
          <p>Age: {{ $employee->age }}</p>
          <p>Position: {{ $employee->position }}</p>
          <p>Department: {{ $employee->department }}</p>
          <p>Contact Number: {{ $employee->contactNumber }}</p>
            
          <h2>Associated Events</h2>

            <!-- {{-- @if ($employee->events->count() > 0)
            <ul>
              @foreach ($employee->events as $event)
                  <li>
                      <strong>{{ $event->name }}</strong><br>
                      Trainer: {{ $event->trainer }}
                      Description: {{ $event->description }}<br>
                      Date and Time: {{ $event->dateTime }}<br>
                      Location: {{ $event->location }}<br>
                      // Add more event details here as needed
                  </li>
              @endforeach
            </ul>
            @else
                <p>No associated events.</p>
            @endif --}} -->
            <table style="border: 1px solid">
                <thead>
                    <tr>
                        <th scope="col" style="border: 1px solid">Name</th>
                        <th scope="col"style="border: 1px solid">Trainer</th>
                        <th scope="col" style="border: 1px solid">Description</th>
                        <th scope="col" style="border: 1px solid">Date and Time</th>
                        <th scope="col" style="border: 1px solid; width:20%;">Location</th>
                        <th scope="col" style="border: 1px solid">Sign</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($employee->events->count() > 0)
                        @foreach ($employee->events as $event)
                        <tr>
                            <td style="border: 1px solid">{{$event->name}}</td>
                            <td style="border: 1px solid">{{$event->trainer}}</td>
                            <td style="border: 1px solid">{{$event->description}}</td>
                            <td style="border: 1px solid">{{$event->dateTime}}</td>
                            <td style="border: 1px solid;width:20%;">{{$event->location}}</td>
                            <td style="border: 1px solid"></td>
                            
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
        </div>
    </div>
</div>
<br>
<br>
<!-- {{-- <button id="generate-pdf">Generate PDF</button> --}} -->
<!-- {{-- <script>
    document.getElementById('generate-pdf').addEventListener('click', function () {
        const employeeId = {{ $employee->id }};
        window.location.href = `/generate-pdf/${employeeId}`;
    });
  </script> --}} -->
  <!-- {{-- <script>
    // Auto-generate PDF and open in a new tab when the page loads
    document.addEventListener('DOMContentLoaded', function () {
        const employeeId = {{ $employee->id }};
        window.open(`/generate-pdf/${employeeId}`, '_blank');
    });
</script> --}}

{{-- @endsection --}} -->