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
                    <span>Password Reset</span>
                </li>
            </ul>
        </div>
    </section>
    <div id="left-col" class="container">
        <h2>Password Reset!</h2>
        <?php if (isset($message)) :?>
            <p><?php echo $message; ?></p>
        <?php endif;?>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-content">
                <div class="form-group">
                    <label class="credentials-label" for="email">Username (email):</label>
                    @if( isset($request->email) )
                        <input type="email" id="email" name="email" value="{{$request->email}}" class="credentials-input" size="30">
                    @else
                        <input type="email" id="email" name="email" value="{{old('email')}}" class="credentials-input" size="30">
                    @endif
                    @error('email')
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="hidden" name="challenge" value="g-recaptcha-response">
                    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js" async="" defer=""></script>
                    <div class="g-recaptcha" data-sitekey="{{ env("DATA_SITEKEY") }}" data-theme="light" data-type="image" data-size="normal">                                
                    </div>
                    @error('recaptcha-token')
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    @enderror
                </div>
                <div class="credentials-botom">
                    <button class="sign-btn" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <div id="right">
        <!-- widget -->
        <div class="widget">
        </div>
    </div>
@endsection
