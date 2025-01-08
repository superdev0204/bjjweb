@push('meta')
    <meta name="description" content="Login to update your listing information.">
@endpush

@push('title')
    <title>Member Login</title>
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
                    <span>User Login</span>
                </li>
            </ul>
        </div>
    </section>

    <div class="container">
        <div>
            <h1>Please login.</h1>

            @if (isset(explode("?", request()->query('return_url'))[1]))
                <p>If you don't have a Login Account yet, please <a href="/user/new?{{ explode("?", request()->query('return_url'))[1] }}">Click here to Register</a>.</p>
            @else
                <p>If you don't have a Login Account yet, please <a href="/user/new">Click here to Register</a>.</p>
            @endif

            @if( isset($errorMessage) )
                <p>{{ $errorMessage }}</p>
            @endif
            <form method="POST">
                @csrf
                <div class="login_form" style="width:312px">
                    <label class="credentials-label" for="email2">Username or Email</label>
                    <input class="credentials-input" type="email" id="email2" name="email" size="30"
                        required>
                    <label class="credentials-label" for="password2">Password</label>
                    <div class="relative password1">
                        <input class="credentials-input" id="password2" type="password" name="password"
                            minlength="6" required>
                        <i class="far fa-eye" id="togglePassword2"></i>
                    </div>
                    <div class="credentials-botom">
                        <a class="forgot-pwd" href="/user/reset">Forgot your
                            password?</a>
                        <button class="sign-btn" type="submit">Sign In</button>
                    </div>
                </div>
            </form>
            <br />
            @if( isset($errorMessage) )
                <p>If you forget your password, click <a href="/user/reset">reset password</a>. </p>
            @endif
        </div>
    </div>

    <script>
        const togglePassword2 = document.querySelector('#togglePassword2');
        const password2 = document.querySelector('#password2');

        togglePassword2.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
            password2.setAttribute('type', type);
            // // // toggle the eye slash icon
            console.log(this)
            this.classList.toggle("fa-eye-slash");
        });
    </script>
@endsection
