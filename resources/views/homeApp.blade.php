@extends('home')
@section('content')
<div class="container" style="background-color: #fff; margin-top:5%; border-radius:15px;">
    <div class="row">
        <div class="col-md-4 text-center mt-4">
            <h2>Training Events Record</h2>
            <hr>
        </div>
        {{-- <div class="box" style="background-color: rgb(154, 170, 204); position: absolute; margin-top:15%; margin-left:60%; border-radius:15px; width:100px; height: 100px;">
            <div class="row">
                <p style="margin-left:20%;margin-top:15%;" >Total User : </p>
            </div>
            <div class="row">
                <p style="margin-left:40%;margin-top:1%;">
                    {{ $totalUser }}
                </p>
            </div>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-2">
            <img src="/images/admindashboard.png" alt="" height="400px" width="500px">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 text-center">
            <h2>Training Schedule</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-2 text-center">
            <img src="/images/user.png" alt="" height="150px" width="150px">
            <a class="btn" 
            href="{{ route('eventList') }}" 
            style="text-decoration:none;color:black; background-color:rgb(135, 170, 209);">Training Events List</a>
        </div>
        <div class="col-md-4 text-center">
            <img src="/images/admin.png" alt="" height="150px" width="150px">
            <a class="btn"
             href="{{ route('employeeList') }}"  
             style="text-decoration:none;color:black;background-color:rgb(135, 170, 209);">Employee List</a>
        </div>
    </div>
</div>
<br><br>

@endsection