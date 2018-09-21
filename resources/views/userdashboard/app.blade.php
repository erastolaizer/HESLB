@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="row">
                <div class="col-md-2">
                  <div class="card" style="background-color:#222">
                      <div class="card-body">
                        <table class="table table-hover">
                          <tr><td><a href="{{url('home')}}"  class="text-success">Home</a></td></tr>
                          <tr><td><a href="{{url('get_loan')}}" class="text-info">Request for Loan</a></td></tr>
                          <tr><td><a href="{{url('history')}}">Transaction History</a> </td></tr>
                          <tr><td><a href="{{url('total_debt')}}">Total Debt</a></td></tr>
                          <tr><td><a href="{{url('loan_probability')}}">Loan Possibility</a> </td></tr>
                          <tr><td><a href="{{url('about_us')}}">About Us</a></td></tr>
                        </table>
                      </div>
                    </div>
                  </div>
        <div class="col-md-10">

       @yield('center')

        </div>
    </div>
</div>
@endsection
