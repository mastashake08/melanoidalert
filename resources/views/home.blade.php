@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Missing Persons</div>

                <div class="panel-body">
                  <table class="table">
                    <thead>
                    <tr>
                      <th>Name</th>
                      <th>Alias</th>
                      <th>Age</th>
                      <th>Weight</th>
                      <th>Height</th>
                      <th>Eye Color</th>
                      <th>Hair Color</th>
                      <th>Last Seen</th>
                      <th>Last Known Location</th>
                      <th>Reward</th>
                      <th>Photo</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach(auth()->user()->missingPeople as $person)
                    <tr>
                      <td>{{$person->name}}</td>
                      <td>{{$person->alias}}</td>
                      <td>{{$person->age}}</td>
                      <td>{{$person->weight}}</td>
                      <td>{{$person->height}}</td>
                      <td>{{$person->eye_color}}</td>
                      <td>{{$person->hair_color}}</td>
                      <td>{{$person->last_seen}}</td>
                      <td>{{$person->last_known_location}}</td>
                      <td>{{$person->reward}}</td>
                      <td><img src="{{Storage::url($person->picture_path)}}"/></td>
                      <td>{{$person->description}}</td>
                      <td>
                        <a href="{{url('/missing-person/'.$person->id.'/edit')}}" class="btn btn-warning"> Edit </a>
                        <form action="{{url('/missing-person/'.$person->id)}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-danger"> Delete </button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                  </table>
                  <br>
                    <form method="post" action="{{url('/missing-person')}}" enctype="multipart/form-data">
                      <input name="name" class="form-control" value="{{old('name')}}" placeholder="Name" required/>
                      <input name="alias" class="form-control" value="{{old('alias')}}" placeholder="Alias or Nickname (optional)" />
                      <input name="age" class="form-control" value="{{old('age')}}" placeholder="Age" required/>
                      <input name="weight" class="form-control" value="{{old('weight')}}" placeholder="Weight" required/>
                      <input name="height" class="form-control" value="{{old('height')}}" placeholder="Height" required/>
                      <input name="eye_color" class="form-control" value="{{old('eye_color')}}" placeholder="Eye Color" required/>
                      <input name="hair_color" class="form-control" value="{{old('hair_color')}}" placeholder="Hair Color" required/>
                      <input name="last_seen" type="date" class="form-control date" value="{{old('last_seen')}}" placeholder="Date Last Seen" required/>
                      <input name="last_known_location" type="text" class="form-control " value="{{old('last_known_location')}}" placeholder="Last Known Location" required/>
                      <input name="reward" class="form-control" value="{{old('reward')}}" placeholder="Reward (optional)" />
                      <input name="picture_path" type="file" class="form-control" required/>
                      <textarea class="form-control" name="description" required placeholder="Short description"></textarea>
                      {{ csrf_field() }}
                      <button class="btn" type="submit"> Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
