<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    //
    /**
    * Show the application resource screen.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
   public function index()
   {     
       return view('resources');
   }
}
