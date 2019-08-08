@extends('layouts.app')

@section('content')
 
                        

<form id="zarvi" class="login100-form zarvi validate-form" method="POST" action="{{ route('login') }}">
@csrf


                   
                    <span class="login100-form-title p-b-34 p-t-27">
                        <img src="{{ asset('images/indomaret.png') }}" alt="" class="img-responsive" width="250" />
                    </span>
                    <hr/>

                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
                        <input class="input100" type="text"  placeholder="Username" class="form-control {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" name="login" value="{{ old('username') ?: old('email') }}" required >

                        <span class="focus-input100" data-placeholder="&#xf207;"></span> 

                    </div>
                      @if ($errors->has('username') || $errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                    </span>
                                @endif

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100  @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">

                                <span class="focus-input100" data-placeholder="&#xf191;"></span> 
                    </div>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif 

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>
 
                </form>
 
@endsection
