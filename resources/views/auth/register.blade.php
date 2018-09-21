@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('custom/register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="registration_no" class="col-md-4 col-form-label text-md-right">{{ __('Registration Number') }}</label>

                            <div class="col-md-6">
                                <input id="registration_no" type="text" class="form-control{{ $errors->has('registration_no') ? ' is-invalid' : '' }}" name="registration_no" value="{{ old('registration_no') }}" required>

                                @if ($errors->has('registration_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('registration_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="university" class="col-md-4 col-form-label text-md-right">{{ __('Choose your University') }}</label>

                            <div class="col-md-6">
                                <select id="university" type="text" class="form-control{{ $errors->has('university') ? ' is-invalid' : '' }}" name="university" required autofocus>
                                <option value=""  >--select--</option>
                                   <option value="UDSM">UDSM</option>
                                   <option value="ARDHI">ARDHI</option>
                                   <option value="IFM">IFM</option>
                                   <option value="UDOM">UDOM</option>
                                </select>
                                @if ($errors->has('university'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('university') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_bank" class="col-md-4 col-form-label text-md-right">{{ __('Name of the bank') }}</label>

                            <div class="col-md-6">
                                <select id="name_bank" type="text" class="form-control{{ $errors->has('name_bank') ? ' is-invalid' : '' }}" name="name_bank" required autofocus>
                                  <option value=""  >--select--</option>
                                     <option value="CRDB">CRDB</option>
                                     <option value="NMB">NMB</option>
                                     <option value="NBC">NBC</option>
                                     <option value="EXIM BANK">EXIM BANK</option>
                                  </select>
                                @if ($errors->has('name_bank'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name_bank') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_account" class="col-md-4 col-form-label text-md-right">{{ __('Name of Acccount') }}</label>

                            <div class="col-md-6">
                                <input id="name_account" type="text" class="form-control{{ $errors->has('name_account') ? ' is-invalid' : '' }}" name="name_account" value="{{ old('name_account') }}" required autofocus>

                                @if ($errors->has('name_account'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name_account') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="account_no" class="col-md-4 col-form-label text-md-right">{{ __('Acccount Number') }}</label>

                            <div class="col-md-6">
                                <input id="account_no" type="text" class="form-control{{ $errors->has('account_no') ? ' is-invalid' : '' }}" name="account_no" value="{{ old('account_no') }}" required>

                                @if ($errors->has('account_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('account_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div><br>
                      <div class="">
                        @if(Session::has('register'))
                        <div class="alert alert-danger" role="alert">
                        <strong>{{Session::get('register')}} </strong>
                        </div>
                        @endif
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
