<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Loan;
use App\Balance;
use App\Heslb;
use App\Bank;
use Auth ;
use Session ;

class LoanController extends Controller
{
    //
    public function getLoan(Request $request){
      $this->validate($request,[
          'amount'=> 'required'
        ]);
        $user = Auth::user();
        $balance = Balance::where('user_id',$user->id)->first();
        if(!$balance || !$user){
          Session::flash('login','Something went wrong please login again');
          return redirect()->back();
        }
        $heslb = Heslb::where('account_no',$user->account_no)->where('reg_no',$user->registration_no)->first();
        if($balance->amount + $request->amount + 100000 > $heslb->loan_amount){
          //can not borrow
          Session::flash('error','You can not borrow now,please check loan probability');
          return redirect()->back();
        }
        //borrow

        //add amount to bank
        $bank = Bank::where('account_no',$user->account_no)->first();
        $bank->balance = $bank->balance + $request->amount ;
        $bank->save();


        //UPDATE LOAN BALANCE
        $balance->amount = $balance->amount + $request->amount ;
        $balance->save();

        //add loan details
        $loan = new Loan ;
        $loan->user_id = $user->id ;
        $loan->amount  = $request->amount ;
        $loan->save();

        Session::flash('loan','You are successfully borrow '.$request->amount);
        return redirect()->back();

    }
    public function history(){
      $user = Auth::user();
      $loans = Loan::where('user_id',$user->id)->get();
      $balance = Balance::where('user_id',$user->id)->first();
      return view('history')->with(compact('loans','balance'));
    }
    public function total_debt(){
      $user = Auth::user();
      $balance = Balance::where('user_id',$user->id)->first();
      return view('balance')->with(compact('balance'));
    }
}
