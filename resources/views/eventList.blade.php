@extends('home')
@section('content')

  <div class="container" style="background-color: #fff; margin-top:5%; border-radius:15px;">
    <div class="row">
      <div class="row">
        <div class="col-md-12">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <p>Event added</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <p>Cannot delete this event because it is associated with employees.</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <br>
            <h2>Training Event List</h2>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form class="form-inline my-2 my-lg-0" action="{{route('eventSearch')}}" method="post">
                @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="keyword" name="keyword" style="height:40px;">
                <button class="btn btn-secondary" type="submit" style="height:40px;">Search</button>
            </form>
{{-- 
            <form class="form-inline my-2 my-lg-0" action="{{route('addEvent')}}" method="post">
                @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="keyword" name="keyword" style="height:40px;">
                <button class="btn btn-secondary" data-toggle="modal" data-target="#addEvent-modal">Add Training Event</button>
            </form> --}}
        </div>
        <div class="col-md-3">

        </div>
        <div class="col-md-3">
            <button class="btn btn-secondary" data-toggle="modal" data-target="#addEvent-modal">Add Training Event</button>

        </div>
    </div>
    <br>

      <!-- modalPlus -->
  <div class="modal fade" id="addEvent-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Event Details</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <form action="{{ route('addEvent') }}" method="post" enctype="multipart/form-data"> @csrf
        <div class="modal-body">
            <div class="form-group">
              <label>Event Name</label>
              <input type="text" name="Evname"  class="form-control" required/>
            </div>
            
            <div class="form-group">
              <label>Trainer</label>
              <input type="text" name="Evtrainer"  class="form-control" >
            </div>
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Event Description</label>
                  <textarea type="text" name="Evdescription"  class="form-control" required ></textarea>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Date and Time</label>
                  <input type="datetime-local" name="Evdate" class="form-control" required/>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Location</label>
                  <input type="text" name="Evlocation" class="form-control" required/>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Event Files</label>
                  <input type="file" name="Evfile" class="form-control"  /> 
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
                        <th scope="col">Trainer</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date and Time</th>
                        <th scope="col">Location</th>
                        <th scope="col">Event Files</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($events))
                        @foreach($events as $event)
                        <tr>
                            <th scope="row">{{$event->id}}</th>
                            <td>{{$event->name}}</td>
                            <td>{{$event->trainer}}</td>
                            <td>{{$event->description}}</td>
                            <td>{{$event->dateTime}}</td>
                            <td>{{$event->location}}</td>
                            <td>
                                @if ($event->eveFile)
                                    <a class="btn btn-success" href="{{ asset($event->eveFile) }}" target="_blank">{{ $event->eveFile }}</a> |
                                    <a class="btn btn-success" href="{{ asset($event->eveFile) }}" download>Download File</a>
                                @else
                                    No File Available
                                @endif
                            </td>
             
                            <td>
                            <a class="btn" href="{{route('deleteEvent',['id'=>$event->id])}}" onClick="return confirm('Are you sure you want to delete this user?')"><i class="fa fa-trash"></i> Delete</a>
                           
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
        </div>
    </div>
</div>
@endsection