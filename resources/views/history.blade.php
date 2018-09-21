@extends('userdashboard.app')
@section('center')

@if(Session::has('error'))
<div class="alert alert-danger" role="alert">
<strong>{{Session::get('error')}} </strong>
</div>
@endif
@if(Session::has('loan'))
<div class="alert alert-success" role="alert">
<strong>{{Session::get('loan')}} </strong>
</div>
@endif
@if(Session::has('login'))
<div class="alert alert-danger" role="alert">
<strong>{{Session::get('login')}} </strong>
</div>
@endif
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Your Loan History') }}</div>

            <div class="card-body">
              <table class="table table-bordered">
                  <thead>
                  <tr>
                      <th>#</th>
                      <th>Amount Borrowed</th>
                      <th>Date</th>

                  </tr>
                  </thead>

                   <tbody>
                   @foreach($loans as $index =>   $loan)
                   <tr>
                       <td>{{$index + 1}}</td>
                       <td>{{$loan->amount}}</td>
                       <td>{{$loan->created_at}}</td>
                  </tr>
                      @endforeach
                   </tbody>
                </table>
                <h4>Your Total Debt : <strong>{{$balance->amount}}</strong></h4>
            </div>
        </div>
    </div>
</div>
@endsection
