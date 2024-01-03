@extends('home')
@section('content')

<div class="container" style="background-color: #fff; margin-top:5%; border-radius:15px;">
    <div class="row">
        <div class="col-md-4 text-center mt-4">
            <h2>Training Events Record</h2>
            <hr>
        </div>
    </div>

    <!-- <div class="row">
        <div class="col-md-6 offset-md-2">
            <img src="/images/admindashboard.png" alt="" height="400px" width="500px">
        </div>
    </div> -->

    <div class="row">
        <div class="col-md-4 text-center">
            <h2>Training Schedule</h2>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4  text-center">
         <img src="/images/168Z_programming1.jpg" alt="" height="150px" width="150px"> 
            <a class="btnList" 
            href="{{ route('eventList') }}">Training Events List</a>
        </div>

        <div class="col-md-4 text-center">
          <img src="/images/software_developers2.jpg" alt="" height="150px" width="150px">
            <a class="btnList"
             href="{{ route('employeeList') }}">Employee List</a>
        </div>
        
        <div class="col-md-4 text-center">
           <img src="/images/thg_m591_01.jpg" alt="" height="150px" width="150px">
            <a class="btnList"
             href="{{ route('showEmployeeAndEvent') }}"  
             {{-- href="/assignEmployee" --}}>Employee Training</a>
        </div>
    </div>
</div>
<br><br>

@endsection

<style>
 .btnList {
    text-decoration: none;
    color: black;
    background-color:#e9ebf2;
    border: 1px solid #daddea;
    padding: 10px;
    border-radius: 5px;
    font-size: 15px;
    transition-duration: 0.3s;
 }

.btnList:hover {
    background-color: white;
    text-decoration: none;
    color: black;
}

</style>