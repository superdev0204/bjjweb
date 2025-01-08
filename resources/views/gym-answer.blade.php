@push('title')
    @if ($gym)
        <title>Answer for {{ $gym->name }}</title>
    @else
        <title>Answer for {{ $page_url }}</title>
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
                <li><span>Create Answer</span></li>
            </ul>
        </div>
    </section>

    <div class="container">
        <h2>Create your answer for: </h2>
        @if ($gym)
            <?php echo $gym->name; ?><br />
            <?php echo $gym->address . ' ' . $gym->city . ' ' . $gym->state; ?><br /><br />
        @endif
        Q: <?php echo $question->question; ?><br /><br />
        <?php echo $message; ?><br /><br/>
        
        @if( !$request->answer )
            <form method="post">
                @csrf
                <div class="form-content-section">
                    <div class="form-content" style="width:50%;">
                        @if (!$user)
                            <div class="form-group">
                                <label for="answer_userName">Your Name</label>
                                @if (isset($request->answer_userName))
                                    <input type="text" id="answer_userName" name="answer_userName" class="credentials-input" value="{{ $request->answer_userName }}">
                                @else
                                    <input type="text" id="answer_userName" name="answer_userName" class="credentials-input" value="{{ old('answer_userName') }}">
                                @endif
                                @error('answer_userName')
                                    <ul>
                                        <li>{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="answer_userEmail">Your Email</label>
                                @if (isset($request->answer_userEmail))
                                    <input type="email" id="answer_userEmail" name="answer_userEmail" class="credentials-input" value="{{ $request->answer_userEmail }}">
                                @else
                                    <input type="email" id="answer_userEmail" name="answer_userEmail" class="credentials-input" value="{{ old('answer_userEmail') }}">
                                @endif
                                @error('answer_userEmail')
                                    <ul>
                                        <li>{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                        @endif 
                        <div class="form-group">
                            <label for="answer">Your Answer</label>
                            <textarea id="answer" name="answer" class="credentials-input" cols="15" rows="5">{{ old('answer') }}</textarea>
                            @error('answer')
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
