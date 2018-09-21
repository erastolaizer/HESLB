@extends('admin.app')
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
            <div class="card-header">{{ __('PAYMENTS FOR STUDENTS') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ url('loan') }}" aria-label="{{ __('Loan') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="amount" class="col-sm-4 col-form-label text-md-right">{{ __('Choose Account Numbers') }}</label>

                        <div class="col-md-6">
                          <select  id="account_no[]" type="text" class="form-control{{ $errors->has('account_no') ? ' is-invalid' : '' }}" name="account_no[]" required autofocus multiple="multiple">
                          <option value=""  >--select--</option>
                          @foreach ($heslb as $key => $heslb)
                            <option value="{{$heslb->account_no}}"  >{{$heslb->account_no}}</option>
                          @endforeach
                          </select>
                            @if ($errors->has('account_no'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('account_no') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="amount" class="col-sm-4 col-form-label text-md-right">{{ __('Choose Amount') }}</label>
                        <div class="col-md-6">
                          <select id="amount" type="text" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" required autofocus>
                          <option value=""  >--select--</option>
                             <option value="720000">510000</option>
                             <option value="720000">7200000</option>
                          </select>
                            @if ($errors->has('amount'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('amount') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
