@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{$person->name}}</div>

                <div class="panel-body">

                    <form method="post" action="{{url('/missing-person/'.$person->id)}}" enctype="multipart/form-data">
                      <input type="hidden" name="_method" value="PUT">
                      <input name="name" class="form-control" value="{{$person->name}}" placeholder="Name" required/>
                      <input name="alias" class="form-control" value="{{$person->alias}}" placeholder="Alias or Nickname (optional)" />
                      <input name="age" class="form-control" value="{{$person->age}}" placeholder="Age" required/>
                      <input name="weight" class="form-control" value="{{$person->weight}}" placeholder="Weight" required/>
                      <input name="height" class="form-control" value="{{$person->height}}" placeholder="Height" required/>
                      <input name="eye_color" class="form-control" value="{{$person->eye_color}}" placeholder="Eye Color" required/>
                      <input name="hair_color" class="form-control" value="{{$person->hair_color}}" placeholder="Hair Color" required/>
                      <input name="last_seen" type="date" class="form-control date" value="{{$person->last_seen}}" placeholder="Date Last Seen" required/>
                      <input name="last_known_location" type="text" class="form-control " value="{{$person->last_known_location}}" placeholder="Last Known Location" required/>
                      <input name="reward" class="form-control" value="{{$person->reward}}" placeholder="Reward (optional)" />
                      <input name="picture_path" type="file" class="form-control" />
                      <textarea class="form-control" name="description" required placeholder="Short description">{{$person->description}}</textarea>
                      {{ csrf_field() }}
                      <button class="btn" type="submit"> Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
