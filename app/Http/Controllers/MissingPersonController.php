<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MissingPerson;
class MissingPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $people = MissingPerson::paginate(25);
        $with = [
          'people' => $people
        ];
        return view('missing.all')->with($with);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $path = $request->file('picture_path')->store('public');
        $missingPerson = MissingPerson::Create([
          'name' => $request->name,
          'alias' => $request->alias,
          'last_seen' => \Carbon\Carbon::parse($request->last_seen),
          'age' => $request->age,
          'height' => $request->height,
          'weight' => $request->weight,
          'reward' => $request->reward,
          'picture_path' => $path,
          'description' => $request->description,
          'user_id' => $request->user()->id

        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $person = MissingPerson::findOrFail($id);
        $with = [
          'person' => $person
        ];
        return view('missing.individual')->with($with);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $person = MissingPerson::findOrFail($id);
        $with = [
          'person' => $person
        ];
        return view('missing.edit')->with($with);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $path = null;
        $person = MissingPerson::findOrFail($id);
        if($request->hasFile('picture_path')){
        $path = $request->file('picture_path')->store('public');
      }
        $person->fill([
          'name' => $request->name,
          'alias' => $request->alias,
          'last_seen' => \Carbon\Carbon::parse($request->last_seen),
          'age' => $request->age,
          'height' => $request->height,
          'weight' => $request->weight,
          'reward' => $request->reward,
          'picture_path' => $path != null ? $path : $person->picture_path,
          'description' => $request->description,
        ]);
        $person->save();
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        MissingPerson::destroy($id);
        return back();
    }
}
