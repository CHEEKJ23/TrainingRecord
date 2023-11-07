@extends('home')
@section('content')

  <div class="container" style="background-color: #fff; margin-top:5%; border-radius:15px;">
    <div class="row">
        <div class="col-md-12">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <p>Employees assigned to events successfully</p>
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
    @if(Session::has('info'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <p>The selected employee(s) already have a date & time conflicting event.</p>
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
            <h2>Add Employee to Training</h2>
            <br>
        </div>
    </div>
<div class="row">
    <form method="POST" action="{{ route('associateEmployeesToEvents') }}">
        @csrf
    <div class="col-md-12">
        <h3>Select Employee(s):</h3>
        @if(count($employees))
        @foreach ($employees as $employee)
            <input type="checkbox" name="employee_ids[]" value="{{ $employee->id }}" >
            {{ $employee->name }}
       
        @endforeach
        @else
       <p>No employee yet.</p>
        
        @endif
    </div>
    <div class="col-md-12">
        <h3>Select Event(s):</h3>
        @if(count($trainingEvents))
        @foreach ($trainingEvents as $trainingEvent)
            <input type="checkbox" name="event_ids[]" value="{{ $trainingEvent->id }}" >
            {{ $trainingEvent->name }}
        @endforeach
        @else
       <p>No event yet.</p>
        @endif
    </div>
    <br>
    <div class="col-md-12">
        <button type="submit" class="btn btn-secondary">Assign</button>
        
    </div>
    <br>
</form>
</div>

</div>
@endsection