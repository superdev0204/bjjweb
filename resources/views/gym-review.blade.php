@push('title')
    <title>Review for {{ $gym->name }}</title>
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
                    <a href="/dojo-detail/<?php echo $gym->id; ?>"><?php echo $gym->name; ?></a>
                </li>
                <span class="breadcrumb-divide">
                    <p>>></p>
                </span>
                <li><span>Create Review</span></li>
            </ul>
        </div>
    </section>

    <div class="container">
        <h2>Create your comment for: </h2>
        <?php echo $gym->name; ?><br />
        <?php echo $gym->address . ' ' . $gym->city . ' ' . $gym->state; ?><br /><br />
        <?php echo $message; ?><br /><br/>
        @if (!isset($review->gym_id))
            <form id="reviewForm" action="/send_review?gymId={{ $gym->id }}" method="post">
                @csrf
                <div class="form-content-section">
                    <div class="form-content">
                        @if( !isset($user->type) )
                            <div class="form-group">
                                <label for="review_userEmail">Email address (will not be published):</label>
                                @if( isset($request->review_userEmail) )
                                    <input type="email" id="review_userEmail" name="review_userEmail" value="{{$request->review_userEmail}}" class="form-control"/>
                                @else
                                    <input type="email" id="review_userEmail" name="review_userEmail" value="{{old('review_userEmail')}}" class="form-control"/>
                                @endif
                                @error('review_userEmail')
                                    <ul>
                                        <li>{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="review_userName">Display Name:</label>
                                @if( isset($request->review_userName) )
                                    <input type="text" id="review_userName" name="review_userName" value="{{$request->review_userName}}" class="form-control"/>
                                @else
                                    <input type="text" id="review_userName" name="review_userName" value="{{old('review_userName')}}" class="form-control"/>
                                @endif
                                @error('review_userName')
                                    <ul>
                                        <li>{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="review">Write your comment/review:</label>
                            @if( isset($request->review) )
                                <textarea id="review" name="review" class="form-control" id="" cols="30" rows="15">{{ $request->review }}</textarea>
                            @else
                                <textarea id="review" name="review" class="form-control" id="" cols="30" rows="15">{{ old('review') }}</textarea>
                            @endif
                            @error('review')
                                <ul>
                                    <li>{{ $message }}</li>
                                </ul>
                            @enderror
                        </div>
                        @if( !isset($user->type) )
                            <div class="form-group">
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
                            </div>
                        @endif
                        <div>
                            <button type="submit" class="form-content-submit-btn" name="submit">Submit </button>
                        </div>
                    </div>

                    <div class="form-content-right">
                        <div class="review-content">
                            <p>Please rate this GYM in the following categories</p>
                            <div class="feedback-content">
                                <div class="feedback-text">
                                    <p>Overall:{{old('rating1')}}</p>
                                </div>
                                <fieldset class="rating">
                                    <input type="radio" id="field1_star5" name="rating1" value="5" />
                                    <label class = "full" for="field1_star5" id="field1_label5"></label>

                                    <input type="radio" id="field1_star4" name="rating1" value="4" /><label
                                        class = "full" for="field1_star4" id="field1_label4"></label>

                                    <input type="radio" id="field1_star3" name="rating1" value="3" /><label
                                        class = "full" for="field1_star3" id="field1_label3"></label>

                                    <input type="radio" id="field1_star2" name="rating1" value="2" /><label
                                        class = "full" for="field1_star2" id="field1_label2"></label>

                                    <input type="radio" id="field1_star1" name="rating1" value="1" /><label
                                        class = "full" for="field1_star1" id="field1_label1"></label>
                                </fieldset>
                            </div>
                            <div class="feedback-content">
                                <div class="feedback-text">
                                    <p>Facilities:</p>
                                </div>
                                <fieldset class="rating">
                                    <input type="radio" id="field2_star5" name="rating2" value="5" /><label
                                        class = "full" for="field2_star5" id="field2_label5"></label>

                                    <input type="radio" id="field2_star4" name="rating2" value="4" /><label
                                        class = "full" for="field2_star4" id="field2_label4"></label>

                                    <input type="radio" id="field2_star3" name="rating2" value="3" /><label
                                        class = "full" for="field2_star3" id="field2_label3"></label>

                                    <input type="radio" id="field2_star2" name="rating2" value="2" /><label
                                        class = "full" for="field2_star2" id="field2_label2"></label>

                                    <input type="radio" id="field2_star1" name="rating2" value="1" /><label
                                        class = "full" for="field2_star1" id="field2_label1"></label>
                                </fieldset>
                            </div>
                            <div class="feedback-content">
                                <div class="feedback-text">
                                    <p>Curriculum:</p>
                                </div>
                                <fieldset class="rating">
                                    <input type="radio" id="field3_star5" name="rating3" value="5" /><label
                                        class = "full" for="field3_star5" id="field3_label5"></label>

                                    <input type="radio" id="field3_star4" name="rating3" value="4" /><label
                                        class = "full" for="field3_star4" id="field3_label4"></label>

                                    <input type="radio" id="field3_star3" name="rating3" value="3" /><label
                                        class = "full" for="field3_star3" id="field3_label3"></label>

                                    <input type="radio" id="field3_star2" name="rating3" value="2" /><label
                                        class = "full" for="field3_star2" id="field3_label2"></label>

                                    <input type="radio" id="field3_star1" name="rating3" value="1" /><label
                                        class = "full" for="field3_star1" id="field3_label1"></label>
                                </fieldset>
                            </div>
                            <div class="feedback-content">
                                <div class="feedback-text">
                                    <p>Teachers:</p>
                                </div>
                                <fieldset class="rating">
                                    <input type="radio" id="field4_star5" name="rating4" value="5" /><label
                                        class = "full" for="field4_star5" id="field4_label5"></label>

                                    <input type="radio" id="field4_star4" name="rating4" value="4" /><label
                                        class = "full" for="field4_star4" id="field4_label4"></label>

                                    <input type="radio" id="field4_star3" name="rating4" value="3" /><label
                                        class = "full" for="field4_star3" id="field4_label3"></label>

                                    <input type="radio" id="field4_star2" name="rating4" value="2" /><label
                                        class = "full" for="field4_star2" id="field4_label2"></label>

                                    <input type="radio" id="field4_star1" name="rating4" value="1" /><label
                                        class = "full" for="field4_star1" id="field4_label1"></label>
                                </fieldset>
                            </div>
                            <div class="feedback-content">
                                <div class="feedback-text">
                                    <p>Safety:</p>
                                </div>
                                <fieldset class="rating">
                                    <input type="radio" id="field5_star5" name="rating5" value="5" /><label
                                        class = "full" for="field5_star5" id="field5_label5"></label>

                                    <input type="radio" id="field5_star4" name="rating5" value="4" /><label
                                        class = "full" for="field5_star4" id="field5_label4"></label>

                                    <input type="radio" id="field5_star3" name="rating5" value="3" /><label
                                        class = "full" for="field5_star3" id="field5_label3"></label>

                                    <input type="radio" id="field5_star2" name="rating5" value="2" /><label
                                        class = "full" for="field5_star2" id="field5_label2"></label>

                                    <input type="radio" id="field5_star1" name="rating5" value="1" /><label
                                        class = "full" for="field5_star1" id="field5_label1"></label>
                                </fieldset>
                            </div>
                        </div>
                        @error('rating')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
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

        $("#field1_label{{old('rating1')}}").click();
        $("#field2_label{{old('rating2')}}").click();
        $("#field3_label{{old('rating3')}}").click();
        $("#field4_label{{old('rating4')}}").click();
        $("#field5_label{{old('rating5')}}").click();

        $("#field1_label{{$request->rating1}}").click();
        $("#field2_label{{$request->rating2}}").click();
        $("#field3_label{{$request->rating3}}").click();
        $("#field4_label{{$request->rating4}}").click();
        $("#field5_label{{$request->rating5}}").click();
    </script>
@endsection
