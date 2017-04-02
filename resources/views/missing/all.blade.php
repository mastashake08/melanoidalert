@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Missing Persons</div>

                <div class="panel-body">
                  <table class="table">
                    <thead>
                    <tr>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Alias</th>
                      <th>Age</th>
                      <th>Weight</th>
                      <th>Height</th>
                      <th>Last Seen</th>
                      <th>Reward</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($people as $person)
                    <tr>
                      <td><img src="{{Storage::url($person->picture_path)}}"/></td>
                      <td><a href="{{url('/missing-person/'.$person->id)}}" target="_blank">{{$person->name}}</a></td>
                      <td>{{$person->alias}}</td>
                      <td>{{$person->age}}</td>
                      <td>{{$person->weight}}</td>
                      <td>{{$person->height}}</td>
                      <td>{{$person->last_seen}}</td>
                      <td>{{$person->reward}}</td>

                      <td>{{$person->description}}</td>
                      <td><form action="{{url('/missing-person/'.$person->id)}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-danger"> Delete </button>
                    </form></td>
                    </tr>
                    @endforeach
                  </tbody>
                  </table>
                  {!!$people->links()!!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
