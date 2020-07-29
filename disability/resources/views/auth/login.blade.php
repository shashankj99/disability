@extends('layouts.app')

@section('login-content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('home') }}"><b>अपाङ्गता</b> र जेष्ठ नागरिक दर्ता</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
            <p class="login-box-msg">तपाइँको सत्र सुरू गर्न साइन इन गर्नुहोस्</p>
    
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="तपाईको इ-मेल ठेगाना लेख्नुहोस्">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="तपाईको पासवर्ड लेख्नुहोस्">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-8 mb-3">
                        <div class="icheck-primary">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('साईन ईन भएको सम्झनुहोस्') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-12 col-md-4">
                        <button type="submit" class="btn btn-primary btn-block">साईन ईन</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
    <!-- /.login-card-body -->
    </div>
</div>
@endsection
