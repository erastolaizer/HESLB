@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="row">
                <div class="col-md-2">
                  <div class="card" style="background-color:#222">
                      <div class="card-body">
                        <table class="table table-hover">
                          <tr><td><a href="{{url('admin/dashboard')}}"  class="text-success">Home</a></td></tr>
                          <tr><td><a href="{{url('admin/payments')}}" class="text-info">Students Payment</a></td></tr>
                          <tr><td><a href="{{url('admin/dashboard')}}">Transaction History</a> </td></tr>
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
