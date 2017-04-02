@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$person->name}}</div>

                <div class="panel-body">
                  <div class="text-center">
                  <img class="img img-rounded" src="{{Storage::url($person->picture_path)}}"/>
                  </div>
                  <br>
                  <strong>Name:</strong> {{$person->name}}
                  <br>
                  <strong>Alias:</strong> {{$person->alias}}
                  </br>
                  <strong>Age:</strong> {{$person->age}}
                  <br>
                  <strong>Weight:</strong> {{$person->weight}}
                  <br>
                  <strong>Height:</strong> {{$person->height}}
                  <br>
                  <strong>Eye Color:</strong> {{$person->eye_color}}
                  <br>
                  <strong>Hair Color:</strong> {{$person->hair_color}}
                  <br>
                  <strong>Last Seen:</strong> {{$person->last_seen}}
                  <br>
                  <strong>Last Known Location:</strong> {{$person->last_known_location}}
                  @if($person->reward != null)
                  <br>
                  <strong>Reward:</strong> {{$person->reward}}
                  @endif
                  <br>
                  <strong>Description:</strong> <p>{{$person->description}}</p>

                  <div class="jumbotron">
                    If you have any information about {{$person->name}}'s whereabouts
                    please contact {{$person->user->name}} at {{$person->user->phone}}
                    or {{$person->user->email}}
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
