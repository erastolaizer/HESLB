<?php

namespace App\Http\Controllers;
use App\Heslb ;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
      return view('admin.dashboard');
    }

    public function payments(){
      $heslb = Heslb::where('paid', 0)->get();
      return view('admin.payments')->with(compact('heslb'));
    }
}
