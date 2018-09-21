<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User ;
use App\Balance;
use App\Heslb;
use Session;

class UserController extends Controller
{
    //register User
    public function register(Request $request){
      $this->validate($request,[
          'name'=> 'required',
          'registration_no'=>'required|string|max:255|unique:users',
          'name_bank'=> 'required',
          'name_account'=>'required',
          'account_no'=> 'required|string|max:255|unique:users',
          'password'=>'required|string|min:6|confirmed',
          'university'=> 'required'
        ]);

$heslb = Heslb::where('reg_no', $request->registration_no)->where('university', $request->university)->where('name_bank', $request->name_bank)->where('account_no', $request->account_no)->first();
  if(!$heslb){
    Session::flash('register','Wrong details, Please fill your correct HESLB details');
    return redirect()->back();
  }
   $user = new User ;
   $user->name = $request->name ;
   $user->registration_no = $request->registration_no ;
   $user->university = $request->university ;
   $user->name_bank = $request->name_bank ;
   $user->name_account = $request->name_account ;
   $user->account_no = $request->account_no ;
   $user->password = bcrypt($request->password) ;
   $user->save();

   Session::flash('register','You are successfully registered, you can now login');
   return redirect()->route('login');

    }

    //Authenticates Users
    public function login(Request $request)
    {
      $this->validate($request,[
          'account_no'=> 'required|string|max:255',
          'password'=>'required|string|min:6'
        ]);

      if(Auth::attempt([
        'account_no'=> $request->account_no,
        'password'=> $request->password
      ]))
      {
        $user =User::where('account_no', $request->account_no)->first();
        $bala = Balance::where('user_id',$user->id)->first();
        if(!$bala){
          $balance = new Balance ;
          $balance->user_id = $user->id ;
          $balance->amount = 0 ;
          $balance->save();
        }

        if($user->position == "administrator"){
          return redirect()->route('admin/dashboard')->with(compact('user'));
        }
      return redirect()->route('home');
    }
    Session::flash('login','wrong Account Number or password');
    return redirect()->back();
}

}
