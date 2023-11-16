@extends("home")
@section("content")

<div class="row">
    <div class="col-sm-2">&nbsp;</div>
    <div class="col-sm-8">

    <div class="modal-header">
      <h4 class="modal-title"style="color:green;">Event</h4>
     
    </div>

    <form action="{{ route('updateEventInfo') }}" method="post" enctype="multipart/form-data"> @csrf
    @foreach($events as $event)
    <div class="modal-body">
        <div class="form-group">
          <label>Event name</label>
          <input type="hidden" class="form-control" name="eventID" value="{{$event->id}}" readonly>
          <input type="text" name="Evname"  class="form-control" value="{{$event->name}}"/>
        </div>
        
        <div class="form-group">
          <label>Event Trainer</label>
          <input type="text" name="Evtrainer"  class="form-control" value="{{$event->trainer}}"/>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Event Description</label>
              <input type="text" name="Evdescription"  class="form-control" value="{{$event->description}}"/>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Event Date</label>
              <input type="datetime-local" name="Evdate" class="form-control" value="{{$event->dateTime}}"/>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Event Location</label>
              <input type="text" name="Evlocation" class="form-control" value="{{$event->location}}"/>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Event File</label>
              <input type="file" name="Evfile" class="form-control"/> 
            </div>
          </div>
        </div>
    <div class="modal-footer">
      <a type="button" class="btn btn-default" href="/event-list" >Back</a>
      <button type="submit" class="btn btn-success" href="" >Save</button>
    </div>
    </div>
    @endforeach
  </form>

</div>
<div class="col-sm-2">&nbsp;</div>
</div>
@endsection