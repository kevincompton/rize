<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class EventController extends Controller
{
    
    public function index()
    {
      $events = \App\Event::all();
      $user = Auth::user();

      $data = [
        "events" => $events,
        "user" => $user
      ];

      return view('event.index')->with($data);
    }

    public function show($id)
    {
      $event = \App\Event::find($id);
      $user = Auth::user();

      $data = [
        "event" => $event,
        "user" => $user
      ];

      return view('event.show')->with($data);      
    }

    public function chime(Request $request)
    {
      if(!Auth::user()){
        return redirect('/register');
      }

      $event = \App\Event::find($request->id);

      $user = Auth::user();
      $chime = new \App\Chime();
      $chime->user_id = $user->id;
      $event->chimes()->save($chime);
      return back();
    }

    public function new()
    {
      $user = Auth::user();

      $data = [
        "user" => $user
      ];

      return view('event.new')->with($data);
    }

    public function store(Request $request)
    {
      $user = Auth::user();

      $event = new \App\Event();
      $event->title = $request->title;
      $event->description = $request->description;
      $event->date = $request->date;
      $event->city = $request->city;
      $event->user_id = $user->id;
      if($request->file('image')) {
        $imageName = $event->id . '.' . 
          $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(
            base_path() . '/public/images/events/', $imageName
        );
        $event->image = $imageName;
      }
      $event->save();

      return redirect('/events');

    }

    public function edit($id)
    {
      $event = \App\Event::find($id);
      $user = Auth::user();

      if($event->user_id != $user->id) {
        return back();
      }

      $data = [
        "event" => $event,
        "user" => $user
      ];

      return view('event.edit')->with($data);      
    }

    public function update(Request $request)
    {

      $event = \App\Event::find($request->event_id);
      $user = Auth::user();

      if($event->user_id != $user->id) {
        return back();
      }

      if($request->file('image')) {
        $imageName = $event->id . '.' . 
          $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(
            base_path() . '/public/images/events/', $imageName
        );
        $event->image = $imageName;
      }

      $event->title = $request->title;
      $event->description = $request->description;
      $event->save();

      return redirect('/events');

    }

}
