<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class RizeController extends Controller
{
    
    public function index()
    {
      $rizes = \App\Rize::all();
      $user = Auth::user();

      $data = [
        "rizes" => $rizes,
        "user" => $user
      ];

      return view('rize.index')->with($data);
    }

    public function show($id)
    {
      $rize = \App\Rize::find($id);
      $user = Auth::user();

      $data = [
        "rize" => $rize,
        "user" => $user
      ];

      return view('rize.show')->with($data);
    }

    public function chime(Request $request)
    {
      if(!Auth::user()){
        return redirect('/register');
      }

      $rize = \App\Rize::find($request->id);

      $user = Auth::user();
      $chime = new \App\Chime();
      $chime->user_id = $user->id;
      $rize->chimes()->save($chime);
      return back();
    }

}
