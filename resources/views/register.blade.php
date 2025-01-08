@push('meta')
    <meta name="description" content="Login to update your listing information.">
@endpush

@push('title')
    <title>Create New User</title>
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
                <li><span>Sign Up</span></li>
            </ul>
        </div>
    </section>

    <div class="container">
        <div class="signup_sections">
            <div style="width:40%">
                <form method="POST">
                    @csrf
                    <div class="login_form">
                        <label class="credentials-label" for="firstname">First Name</label>
                        @if( isset($request->firstname) )
                            <input class="credentials-input" type="text" id="firstname" name="firstname" value="{{$request->firstname}}">
                        @else
                            <input class="credentials-input" id="firstname" name="firstname" type="text" value="{{old('firstname')}}">
                        @endif
                        @error('firstname')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
    
                        <label class="credentials-label" for="lastname">Last Name</label>
                        @if( isset($request->lastname) )
                            <input class="credentials-input" type="text" id="lastname" name="lastname" value="{{$request->lastname}}">
                        @else
                            <input class="credentials-input" id="lastname" name="lastname" type="text" value="{{old('lastname')}}">
                        @endif
                        @error('lastname')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
    
                        <label class="credentials-label" for="email">Email address (will be your username)</label>
                        @if( isset($request->email) )
                            <input class="credentials-input" type="text" id="email" name="email" value="{{$request->email}}">
                        @else
                            <input class="credentials-input" id="email" name="email" type="text" value="{{old('email')}}">
                        @endif
                        @error('email')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
    
                        <label class="credentials-label" for="password">Password</label>
                        <input type="password" class="credentials-input" id="password" name="password" autocomplete="off" value="">
                        @error('password')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
    
                        <label class="credentials-label" for="password_confirmation">Retype Password</label>
                        <input type="password" class="credentials-input" id="password_confirmation" name="password_confirmation" autocomplete="off" value="">
                        @error('password_confirmation')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
    
                        <label class="credentials-label" for="city">City</label>
                        @if ($gym)
                            <input class="credentials-input" type="text" id="city" name="city" value="{{$gym->city}}">
                        @else
                            @if( isset($request->city) )
                                <input class="credentials-input" type="text" id="city" name="city" value="{{$request->city}}">
                            @else
                                <input class="credentials-input" id="city" name="city" type="text" value="{{old('city')}}">
                            @endif
                        @endif
                        @error('city')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
    
                        <label class="credentials-label" for="state">State</label>
                        @if ($gym)
                            <select class="credentials-input" id="state" name="state">
                                <option value="">-Select-</option>
                                @foreach ($states as $state)                                        
                                    @if ($state->state_code == $gym->state)
                                        <option value='{{ $state->state_code }}' selected>
                                            {{ $state->state_name }}
                                        </option>
                                    @else
                                        <option value='{{ $state->state_code }}'>{{ $state->state_name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>                                
                        @else
                            <select class="credentials-input" id="state" name="state">
                                <option value="">-Select-</option>
                                @foreach ($states as $state)
                                    @if( isset($request->state) )
                                        @if($state->state_code == $request->state)
                                            <option value='{{ $state->state_code }}' selected>{{ $state->state_name }}</option>
                                        @else
                                            <option value='{{ $state->state_code }}'>{{ $state->state_name }}</option>
                                        @endif
                                    @else                                        
                                        @if($state->state_code == old('state'))
                                            <option value='{{ $state->state_code }}' selected>{{ $state->state_name }}</option>
                                        @else
                                            <option value='{{ $state->state_code }}'>{{ $state->state_name }}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        @endif
                        @error('state')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
    
                        <label class="credentials-label" for="state">Zip Code</label>
                        @if ($gym)
                            <input class="credentials-input" type="text" id="zip" name="zip" value="{{ $gym->zip }}">
                        @else
                            @if( isset($request->zip) )
                                <input class="credentials-input" type="text" id="zip" name="zip" value="{{$request->zip}}">
                            @else
                                <input class="credentials-input" id="zip" name="zip" type="text" value="{{old('zip')}}">
                            @endif
                        @endif
                        @error('zip')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
    
                        <label class="credentials-label">&nbsp;</label>
                        <input type="hidden" name="challenge" value="g-recaptcha-response">
                        <script type="text/javascript" src="https://www.google.com/recaptcha/api.js" async="" defer=""></script>
                        <div class="g-recaptcha" data-sitekey="{{ env("DATA_SITEKEY") }}" data-theme="light" data-type="image" data-size="normal">                                
                        </div>
                        @error('recaptcha-token')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
    
                        <div class="credentials-botom">
                            <button class="sign-btn" type="submit">Register</button>
                        </div>
                    </div>
                </form>
                <br />
            </div>
    
            <div style="width:60%">
                <h1>Sign up now for free!</h1>
                @if (isset($message) && !empty($message))
                    <p><?PHP echo $message; ?></p>
                @else
                    <ol class="signup_desc">
                        <li>You must be <strong>18 or older</strong> to post your property information on our website.</li>
                        <li>You must signup with a <strong>valid Email address</strong>. Once you sign up a email will be
                            Immediately be sent to the email address you have signed up with. The email will be sent from
                            BrazillianJiuJitsuSchools.org</li>
                        <li>If you do not see an email from us, please <strong>check your Spam folder or Junk mail
                                folder</strong>.</li>
                        <li>Once you have checked your email folders and have <strong>clicked on the Link</strong> from
                            BrazillianJiuJitsuSchools.org you will be able to log in and begin posting.</li>
                    </ol>
                @endif
            </div>
        </div>
    </div>
@endsection
