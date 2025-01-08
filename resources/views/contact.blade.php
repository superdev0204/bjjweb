@push('meta')
    <meta name="description" content="Contact BjjWeb.com - Please use the contact form to send your message.">
@endpush

@push('title')
    <title>Contact BJJWeb</title>
@endpush

@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/tiny_mce/tiny_mce.js') }}"></script>
    <script src="{{ asset('js/tiny_mce/tiny_mce_activate.js') }}"></script>

    <!-- breadcrumb navigation  -->
    <section class="breadcrumb-nav">
        <div class="container">
            <ul id="breadcrumb">
                <li><a href="/">Home</a></li>
                <span class="breadcrumb-divide">
                    <p>>></p>
                </span>
                <li><span>Contact</span></li>
            </ul>
        </div>
    </section>
    <div class="container">
        <h1>Contact BJJ Web</h1>
        <?php if (isset($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>

        @if( $message != "Email sent successfully" )
            <form method="post">
                @csrf
                <div class="form-content" style="width:50%;">
                    <div class="form-group">
                        <label class="credentials-label" for="name">Your Name:</label>
                        @if(isset($user->type))
                            <input type="text" class="credentials-input" id="name" name="name" value="{{ $user->firstname.' '.$user->lastname }}" readonly>
                        @else
                            @if( isset($request->name) )
                                <input type="text" class="credentials-input" id="name" name="name" value="{{$request->name}}">
                            @else
                                <input class="credentials-input" id="name" name="name" type="text" value="{{old('name')}}">
                            @endif
                        @endif
                        @error('name')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="email">Your e-mail address:</label>
                        @if(isset($user->type))
                            <input class="credentials-input" type="email" id="email" name="email" value="{{ $user->email }}" readonly>
                        @else
                            @if( isset($request->email) )
                                <input class="credentials-input" type="email" id="email" name="email" value="{{$request->email}}">
                            @else
                                <input class="credentials-input" id="email" name="email" type="email" value="{{old('email')}}">
                            @endif
                        @endif
                        @error('email')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="subject">Subject:</label>
                        @if( isset($request->subject) )
                            <input class="credentials-input" type="text" id="subject" name="subject" value="{{$request->subject}}">
                        @else
                            <input class="credentials-input" id="subject" name="subject" type="text" value="{{old('subject')}}">
                        @endif
                        @error('subject')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="message">Message:</label>
                        @if( isset($request->message) )
                            <textarea id="message" name="message" cols="15" rows="5">{{$request->message}}</textarea>
                        @else
                            <textarea id="message" name="message" cols="15" rows="5">{{old('message')}}</textarea>
                        @endif
                        @error('message')
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
                    <input type="hidden" name="referer" value="{{ isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '' }}">
                    <button type="submit" class="form-content-submit-btn" name="submit">Send e-mail</button>
                </div>
                <br/>
            </form>
        @endif
    </div>
@endsection
