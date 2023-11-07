{{-- @extends('home')
@section('content') --}}

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
          @if ($employee->events->count() > 0)
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
      @endif
      <br>
      <br>
        </div>
    </div>
</div>
<br>
<br>
<button id="generate-pdf">Generate PDF</button>

<script>
  document.getElementById('generate-pdf').addEventListener('click', function () {
      const employeeId = {{ $employee->id }};
      window.location.href = `/generate-pdf/${employeeId}`;
  });
</script>

{{-- @endsection --}}