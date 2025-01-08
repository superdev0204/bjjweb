@push('title')
    <title>Password Reset</title>
@endpush

@extends('layouts.app')

@section('content')

    <!-- breadcrumb navigation  -->
    <section class="breadcrumb-nav">
        <div class="container">
            <ul id="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <span class="breadcrumb-divide">
                    <p>>></p>
                </span>
                <li>
                    <span>{{ __('Reset Password') }}</span>
                </li>
            </ul>
        </div>
    </section>

    <div class="container">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <div class="form-group row">
                <label for="password" class="credentials-label">{{ __('Password') }}</label>
                <div class="col-md-6">
                    <input type="password" id="password" name="password" autocomplete="off" value="" class="credentials-input" size="30">
                    @error('password')
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="credentials-label">{{ __('Confirm Password') }}</label>
                <div class="col-md-6">
                    <input type="password" id="password_confirmation" name="password_confirmation" value="" class="credentials-input" size="30">
                    @error('password_confirmation')
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    @enderror
                </div>
            </div>

            <div class="credentials-botom">
                <button class="sign-btn" type="submit">Submit</button>
            </div><br/>
        </form>
    </div>
@endsection