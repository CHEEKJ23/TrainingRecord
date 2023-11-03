@extends('home')
@section('content')

  <div class="container" style="background-color: #fff; margin-top:5%; border-radius:15px;">
  
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
    <div class="col-md-4">
        <label>Select Employee(s):</label>
        @foreach ($employees as $employee)
            <input type="checkbox" name="employee_ids[]" value="{{ $employee->id }}">
            {{ $employee->name }}
        @endforeach
    </div>
    <div class="col-md-4">
        <label>Select Event(s):</label>
        @foreach ($trainingEvents as $trainingEvent)
            <input type="checkbox" name="event_ids[]" value="{{ $trainingEvent->id }}">
            {{ $trainingEvent->name }}
        @endforeach
    </div>
    <div class="col-md-4">
        <button type="submit">Assign</button>
        
    </div>
</form>
</div>

</div>
@endsection