@push('title')
    @if ($gym)
        <title>Question about {{ $gym->name }}</title>
    @else
        <title>Question about {{ $page_url }}</title>
    @endif
@endpush

@extends('layouts.app')

@section('content')
    <!-- breadcrumb navigation  -->
    <section class="breadcrumb-nav">
        <div class="container">
            <ul id="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <span class="breadcrumb-divide">
                    <p>>></p>
                </span>
                <li>
                    @if ($gym)
                        <a href="/dojo-detail/<?php echo $gym->id; ?>"><?php echo $gym->name; ?></a>
                    @else
                        <a href="<?php echo $page_url; ?>">Previous Page</a>
                    @endif
                </li>
                <span class="breadcrumb-divide">
                    <p>>></p>
                </span>
                <li><span>Create Question</span></li>
            </ul>
        </div>
    </section>

    <div class="container">
        <h2>Create your question for: </h2>
        @if ($gym)
            <?php echo $gym->name; ?><br />
            <?php echo $gym->address . ' ' . $gym->city . ' ' . $gym->state; ?><br /><br />
        @endif
        <?php echo $message; ?><br /><br/>
        
        @if( !$request->question )
            <form method="post">
                @csrf
                <div class="form-content-section">
                    <div class="form-content" style="width:50%;">
                        @if (!$user)
                            <div class="form-group">
                                <label for="userName">Your Name</label>
                                @if (isset($request->userName))
                                    <input type="text" id="userName" name="userName" class="credentials-input" value="{{ $request->userName }}">
                                @else
                                    <input type="text" id="userName" name="userName" class="credentials-input" value="{{ old('userName') }}">
                                @endif
                                @error('userName')
                                    <ul>
                                        <li>{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="userEmail">Your Email</label>
                                @if (isset($request->userEmail))
                                    <input type="email" id="userEmail" name="userEmail" class="credentials-input" value="{{ $request->userEmail }}">
                                @else
                                    <input type="email" id="userEmail" name="userEmail" class="credentials-input" value="{{ old('userEmail') }}">
                                @endif
                                @error('userEmail')
                                    <ul>
                                        <li>{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                        @endif                        
                        <div class="form-group">
                            <label for="question">Your Question</label>
                            <textarea id="question" name="question" class="credentials-input" cols="15" rows="5">{{ old('question') }}</textarea>
                            @error('question')
                                <ul>
                                    <li>{{ $message }}</li>
                                </ul>
                            @enderror
                        </div>
                        @if (!$user)
                            <div class="form-group">
                                <input type="hidden" name="challenge" value="g-recaptcha-response">
                                <script type="text/javascript" src="https://www.google.com/recaptcha/api.js" async="" defer=""></script>
                                <div class="g-recaptcha" data-sitekey="{{ env('DATA_SITEKEY') }}" data-theme="light"
                                    data-type="image" data-size="normal">
                                </div>
                                @error('recaptcha-token')
                                    <ul style="clear: both">
                                        <li>{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                        @endif
                        <button type="submit" class="form-content-submit-btn" name="submit">Submit </button>
                    </div>
                </div>
            </form>
        @endif
    </div><br/>

    <script>
        $("label").click(function() {
            $(this).parent().find("label").css({
                "background-color": "transparent"
            });
            $(this).css({
                "color": "yellow"
            });
            $(this).nextAll().css({
                "color": "yellow"
            });
        });
    </script>
@endsection
