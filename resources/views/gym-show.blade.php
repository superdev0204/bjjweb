<?PHP
    $stateCode = $gym->state ?? '';
    $title = ucwords(strtolower($gym->name)) . ' | '
        . ucwords(strtolower($gym->city)) . ' '
        . $stateCode;
?>

@push('meta')
    <meta name="description" content="{{ ucwords(strtolower($gym->name)) }} is a Brazillian Jiu Jitsu school in {{ ucwords(strtolower($gym->city)) . $stateCode }}">
@endpush

@push('title')
    <title>{{ $title }}</title>
@endpush

@extends('layouts.app')

@section('content')
    <link rel="canonical" href="https://bjjweb.com/dojo-detail/{{ $gym->id }}">

    <!-- breadcrumb navigation  -->
    <section class="breadcrumb-nav">
        <div class="container">
            <ul id="breadcrumb">
                @if (!$state)
                    <li>{{ $gym->city }} Brazillian Jiu Jitsu Schools</li>
                    <span class="breadcrumb-divide">
                        <p>>></p>
                    </span>
                @else
                    <li><a href="/{{ $state->statefile }}-dojos">{{ $state->state_name }} Brazillian Jiu Jitsu Schools</a>
                    </li>
                    <span class="breadcrumb-divide">
                        <p>>></p>
                    </span>
                    <li><a href="/{{ $state->statefile }}-dojos/<?php echo $city ? $city->filename : ''; ?>-city">{{ $gym->city }} Brazillian Jiu
                            Jitsu Schools</a></li>
                    <span class="breadcrumb-divide">
                        <p>>></p>
                    </span>
                @endif
                <li><span>{{ $gym->name }}</span></li>
            </ul>
        </div>
    </section>

    <!-- claim-business -section  -->
    <div class="claim-businee-section">
        <div class="container">
            <div class="claim-business-section-inner-wrap">
                <h3>Is this your business?</h3>
                <p>Claim your business to immediately update business information, track page views, and more!</p>
                <div class="claim-btn">
                    <a href="{{ url('/dojo/update?id='.$gym->id) }}">Claim This Business</a>
                </div>
            </div>
        </div>
    </div>

    <!-- lion heart section  -->
    <div class="container">
        <div class="lionheart-details">
            <div class="lionhearts-content-left">
                <div class="lionheart-logo">
                    <img src="{{ $gym->logo_url }}" alt="" class="articles-img">
                </div>
                <div class="lionheart-name">
                    <h3>{{ $gym->name }}</h3>
                    <div class="contact-details-desktop">
                        <h5 class="blue-txt">{{ $gym->address }} {{ ucwords(strtolower($gym->city)) }}, {{ $gym->state }}
                            {{ $gym->zip }}
                        </h5>
                        <h4>Contact Phone: {{ $gym->phone }}</h4>
                        <h5 class="blue-txt bottom-txt">
                            Website: <a class="blue-txt" href="{{ $gym->website }}">{{ $gym->website }}</a>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="lionhearts-content-right">
                <div class="overall-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p class="based-on">Based on <span class="blue-txt">{{ count($reviews) }} review</span></p>
                <div class="lionheart-btn-section">
                    <div class="share-btn">
                        <div class="share-btn-icon"><i class="fa-solid fa-reply"></i></div>
                        <p>Share</p>
                    </div>
                    <div class="review-btn">
                        <div class="review-btn-icon"><i class="fa-solid fa-pen-to-square"></i></div>
                        <p>Write a Review</p>
                    </div>
                </div>
                <div class="contact-details-mobile">
                    <h5 class="blue-txt">2670 Valleydale Rd
                        Hoover AL, 35244
                    </h5>
                    <h4>Contact Phone: (205) 572-5921</h4>
                    <h5 class="blue-txt">Website: <a class="blue-txt" href=" https://www.trainbjj.com/">
                            https://www.trainbjj.com/</a></h5>
                </div>
            </div>
        </div>
    </div>

    <!-- map n video section  -->
    <div class="container">
        <div class="map-n-video-content">
            <div class="map-n-video-content-left">
                <div class="map-content-wrap">
                    <h3 class="map-title">
                        Map
                    </h3>
                    <div class="map">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <iframe
                                    src="https://maps.google.com/maps?q={{ $gym->address }}, {{ $gym->city }}, {{ $gym->state }} {{ $gym->zip }}&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                                    frameborder="0" scrolling="no" style="width: 100%; height: 100%;"></iframe>
                                <style>
                                    .mapouter {
                                        position: relative;
                                        height: 100%;
                                        width: 100%;
                                        background: #fff;
                                    }

                                    .maprouter a {
                                        color: #fff !important;
                                        position: absolute !important;
                                        top: 0 !important;
                                        z-index: 0 !important;
                                    }
                                </style>
                                <a href="https://blooketjoin.org/blooket-login/">blooket login</a>
                                <style>
                                    .gmap_canvas {
                                        overflow: hidden;
                                        height: 100%;
                                        width: 100%
                                    }

                                    .gmap_canvas iframe {
                                        position: relative;
                                        z-index: 2
                                    }
                                </style>
                            </div>
                        </div>
                        {{-- <img src="{{ asset('images/img/map.png') }}" alt="map"> --}}
                    </div>
                </div>
                <div class="video-content-wrap">
                    <h3 class="video-title">
                        Video
                    </h3>
                    <div class="video">
                        @if( !empty($gym->video_url) )
                            <iframe width="100%" height="300"
                                    src="{{ $gym->video_url }}"
                                    srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href={{ $gym->video_url }}><span>▶</span></a>"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                    title="The Dark Knight Rises: What Went Wrong? – Wisecrack Edition"></iframe>
                        @else
                            <p style="text-align: center">No Video Available</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="map-n-video-content-right">
                <div class="business-hour-wrap">
                    <h3 class="business-hour-title"></h3>
                    <div class="time-txt">
                        <div class="time-txt-top">
                            <h4>business hours</h4>
                        </div>
                        <div class="time-txt-bottom">
                            <p>{{ $gym->business_hour }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-divide"> </div>
    </div>

    <!-- photos=slider  -->
    <div class="container">
        <h3 class="photo-title">Photos</h3>
        <div class="photo-slider-content">
            <!-- desktop only  -->
            <div class="splide photo-slider-desktop" aria-label="Hero slider">
                <div class="splide__track">
                    <ul class="splide__list">
                        @if( count($images) == 0 )
                            <li>
                                No Images Available
                            </li>
                        @endif
                        @foreach ($images as $image)
                            <li class="splide__slide is-active">
                                <a class="button popup2btn" href="#popup2">
                                    <div class="photo-slider-img-wrap">
                                        <img src="{{ asset('images/gyms/'.substr($image->gym_id, -1).'/'.$image->gym_id.'/'.$image->imagename) }}" alt="{{$image->altname}}">
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Photo gallery modals -->
            <div id="popup2" class="overlay overlay2">
                <div class="popup">
                    <h2>Photos</h2>
                    <a class="close popup2Close" href="#">&times;</a>
                    <div class="content">
                        <section class="splide splidepopup2" aria-label="Splide Basic HTML Example">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach ($images as $image)
                                        <li class="splide__slide">
                                            <img src="{{ asset('images/gyms/'.substr($image->gym_id, -1).'/'.$image->gym_id.'/'.$image->imagename) }}" alt="{{$image->altname}}">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <!-- mobile-only  -->
        <div class="splide photo-slider-mobile" aria-label="Hero slider">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($images as $image)
                        <li class="splide__slide is-active">
                            <a class="button popup2btn" href="#popup2">
                                <div class="photo-slider-img-wrap">
                                    <img src="{{ asset('images/gyms/'.substr($image->gym_id, -1).'/'.$image->gym_id.'/'.$image->imagename) }}" alt="{{$image->altname}}">
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="splide__arrows splide__arrows--ltr video-arrows">
                <button class="splide__arrow splide__arrow--prev video-prev" type="button" aria-label="Previous slide"
                    aria-controls="splide01-track">
                    <div class="mobile-arrow-left">
                        <i class="fa-solid fa-chevron-left"></i>Back
                    </div>
                    <div class="desktop-arrow-left">
                        <i class="fa-solid fa-arrow-left"></i>
                    </div>

                </button>
                <button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide"
                    aria-controls="splide01-track">
                    <div class="mobile-arrow-left">
                        Next<i class="fa-solid fa-chevron-right"></i>
                    </div>
                    <div class="desktop-arrow-right">
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                </button>
            </div>
        </div>

        <a href="/dojo/uploadphoto?id={{$gym->id}}" class="add-photo-content" style="color:white; text-decoration:none">
            <div class="add-photo-icon">
                <i class="fa-solid fa-camera"></i>
            </div>
            <div class="add-photo-txt">
                <p>Add Photo</p>
            </div>
        </a>
    </div>

    <div class="section-divide"> </div>
    </div>
    <!-- gyms details  -->
    <div class="container">
        <div class="gym-details-content">
            <h3>Gyms Details:</h3>
            @if( $gym->head_professor )
                <p><span class="blue-txt">Head Professor: </span> {{ $gym->head_professor }}</p>
            @endif
            @if( $gym->details )
                <p><span class="blue-txt">Details: </span> {{ $gym->details }}</p>
            @endif
            @if( $gym->kids_program_url )
                <p><span class="blue-txt">Kids Program Url: </span><a href="<?php echo $gym->kids_program_url; ?>">
                        <?php echo $gym->kids_program_url; ?>
                    </a></p>
            @endif
            @if( $gym->kids_program_detail )
                <p><span class="blue-txt">Kids Program Detail: </span><?php echo $gym->kids_program_detail; ?></p>
            @endif
            @if( $gym->woman_only_program_url )
                <p><span class="blue-txt">Woman Only Program Url: </span> <a href="<?php echo $gym->woman_only_program_url; ?>">
                        <?php echo $gym->woman_only_program_url; ?></a></p>
            @endif
            @if( $gym->woman_only_program_detail )
                <p><span class="blue-txt">Woman Only Program Detail: </span> <?php echo $gym->woman_only_program_detail; ?></p>
            @endif
            @if( $gym->other_programs )
                <p><span class="blue-txt">Other Programs Available: </span><?php echo $gym->other_programs; ?></p>
            @endif
            @if( $gym->pricing )
                <p><span class="blue-txt">Pricing: </span><?php echo $gym->pricing; ?></p>
            @endif
            @if( $gym->schedule_url )
                <p><span class="blue-txt">Schedule Url: </span> <a href="<?php echo $gym->schedule_url; ?>">
                    <?php echo $gym->schedule_url; ?></a></p>
            @endif
            @if( $gym->special_offer )
                <p><span class="blue-txt">Special Offer: </span><?php echo $gym->special_offer; ?></p>
            @endif
            @if( $gym->email )
                <p><span class="blue-txt">Email: </span><?php echo $gym->email; ?></p>
            @endif
            @if( $gym->facebook_url )
                <p><span class="blue-txt">Facebook Url: </span> <a href="<?php echo $gym->facebook_url; ?>">
                    <?php echo $gym->facebook_url; ?></a></p>
            @endif
            @if( $gym->youtube_channel )
                <p><span class="blue-txt">Youtube Channel: </span> <a href="<?php echo $gym->youtube_channel; ?>">
                    <?php echo $gym->youtube_channel; ?></a></p>
            @endif
            @if( $gym->video_url )
                <p><span class="blue-txt">Video Url: </span> <a href="<?php echo $gym->video_url; ?>">
                    <?php echo $gym->video_url; ?></a></p>
            @endif
            @if( $gym->awards )
                <p><span class="blue-txt">Awards: </span><?php echo $gym->awards; ?></p>
            @endif
            @if( $gym->cname )
                <p><span class="blue-txt">Country: </span><?php echo $gym->cname; ?></p>
            @endif
            @if( $gym->multiple_locations )
                <p><span class="blue-txt">Multiple Locations: </span><?php echo $gym->multiple_locations; ?></p>
            @endif
        </div>

        <div class="section-divide"> </div>
    </div>

    <!-- form content  -->
    <div class="container">
        <div class="gym-form-n-review-section">
            <h3>Do you have experience with <span class="blue-txt">{{ $gym->name }}</span>? </h3>
            <div class="sub-title">
                <h4>Add your review/comment here</h4>
                <i class="ri-chat-new-fill"></i>
            </div>
            <form id="reviewForm" action="/send_review?gymId={{ $gym->id }}" method="post">
                @csrf
                <div class="form-content-section">
                    <div class="form-content">
                        @if (!isset($user->type))
                            <div class="form-group">
                                <label for="review_userEmail">Email address (will not be published):</label>
                                <input type="email" id="review_userEmail" name="review_userEmail" value="{{old('review_userEmail')}}" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="review_userName">Display Name:</label>
                                <input type="text" id="review_userName" name="review_userName" value="{{old('review_userName')}}" class="form-control"/>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="review">Write your comment/review:</label>
                            <textarea id="review" name="review" class="form-control" id="" cols="30" rows="15">{{old('review')}}</textarea>
                            <input type="hidden" id="submit_url" name="submit_url" value="{{ Request::path() }}">
                        </div>
                        @if (!isset($user->type))
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
                        <br>
                    </div>
                    <div class="form-content-right">
                        <div class="review-content">
                            <p>Please rate this GYM in the following categories</p>
                            <div class="feedback-content">
                                <div class="feedback-text">
                                    <p>Overall:</p>
                                </div>
                                <fieldset class="rating">
                                    <input type="radio" id="field1_star5" name="rating1" value="5" /><label
                                        class = "full" for="field1_star5"></label>

                                    <input type="radio" id="field1_star4" name="rating1" value="4" /><label
                                        class = "full" for="field1_star4"></label>

                                    <input type="radio" id="field1_star3" name="rating1" value="3" /><label
                                        class = "full" for="field1_star3"></label>

                                    <input type="radio" id="field1_star2" name="rating1" value="2" /><label
                                        class = "full" for="field1_star2"></label>

                                    <input type="radio" id="field1_star1" name="rating1" value="1" /><label
                                        class = "full" for="field1_star1"></label>
                                </fieldset>
                            </div>
                            <div class="feedback-content">
                                <div class="feedback-text">
                                    <p>Facilities:</p>
                                </div>
                                <fieldset class="rating">
                                    <input type="radio" id="field2_star5" name="rating2" value="5" /><label
                                        class = "full" for="field2_star5"></label>

                                    <input type="radio" id="field2_star4" name="rating2" value="4" /><label
                                        class = "full" for="field2_star4"></label>

                                    <input type="radio" id="field2_star3" name="rating2" value="3" /><label
                                        class = "full" for="field2_star3"></label>

                                    <input type="radio" id="field2_star2" name="rating2" value="2" /><label
                                        class = "full" for="field2_star2"></label>

                                    <input type="radio" id="field2_star1" name="rating2" value="1" /><label
                                        class = "full" for="field2_star1"></label>
                                </fieldset>
                            </div>
                            <div class="feedback-content">
                                <div class="feedback-text">
                                    <p>Curriculum:</p>
                                </div>
                                <fieldset class="rating">
                                    <input type="radio" id="field3_star5" name="rating3" value="5" /><label
                                        class = "full" for="field3_star5"></label>

                                    <input type="radio" id="field3_star4" name="rating3" value="4" /><label
                                        class = "full" for="field3_star4"></label>

                                    <input type="radio" id="field3_star3" name="rating3" value="3" /><label
                                        class = "full" for="field3_star3"></label>

                                    <input type="radio" id="field3_star2" name="rating3" value="2" /><label
                                        class = "full" for="field3_star2"></label>

                                    <input type="radio" id="field3_star1" name="rating3" value="1" /><label
                                        class = "full" for="field3_star1"></label>
                                </fieldset>
                            </div>
                            <div class="feedback-content">
                                <div class="feedback-text">
                                    <p>Teachers:</p>
                                </div>
                                <fieldset class="rating">
                                    <input type="radio" id="field4_star5" name="rating4" value="5" /><label
                                        class = "full" for="field4_star5"></label>

                                    <input type="radio" id="field4_star4" name="rating4" value="4" /><label
                                        class = "full" for="field4_star4"></label>

                                    <input type="radio" id="field4_star3" name="rating4" value="3" /><label
                                        class = "full" for="field4_star3"></label>

                                    <input type="radio" id="field4_star2" name="rating4" value="2" /><label
                                        class = "full" for="field4_star2"></label>

                                    <input type="radio" id="field4_star1" name="rating4" value="1" /><label
                                        class = "full" for="field4_star1"></label>
                                </fieldset>
                            </div>
                            <div class="feedback-content">
                                <div class="feedback-text">
                                    <p>Safety:</p>
                                </div>
                                <fieldset class="rating">
                                    <input type="radio" id="field5_star5" name="rating5" value="5" /><label
                                        class = "full" for="field5_star5"></label>

                                    <input type="radio" id="field5_star4" name="rating5" value="4" /><label
                                        class = "full" for="field5_star4"></label>

                                    <input type="radio" id="field5_star3" name="rating5" value="3" /><label
                                        class = "full" for="field5_star3"></label>

                                    <input type="radio" id="field5_star2" name="rating5" value="2" /><label
                                        class = "full" for="field5_star2"></label>

                                    <input type="radio" id="field5_star1" name="rating5" value="1" /><label
                                        class = "full" for="field5_star1"></label>
                                </fieldset>
                            </div>
                        </div>
                        {{-- <a href="/dojo/uploadphoto?id={{$gym->id}}" class="add-photo-content" style="color:white; text-decoration:none">
                            <div class="add-photo-icon">
                                <i class="fa-solid fa-camera"></i>
                            </div>
                            <div class="add-photo-txt">
                                <p>Add Photo</p>
                            </div>
                        </a>
                        <div class="small-photo-content">

                            <div class="add-more-img add-more">
                                <a class="button popup1btn" href="#popup1"><img
                                        src="{{ asset('images/img/sm-photo1.png') }}" alt=""></a>

                            </div>
                            <a class="button popup1btn" href="#popup1">
                                <div class="add-more add-more-img">
                                    <img src="{{ asset('images/img/sm-photo2.png') }}" alt="">
                                </div>
                            </a>
                            <div class="add-more">
                                <a href="#"><i class="fa-solid fa-circle-plus"></i></a>
                                <p>Add More</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div>
                    <button type="submit" class="form-content-submit-btn" name="submit">Submit </button>
                </div>
            </form>
        </div>

        <!-- Popup model -->
        <div id="popup1" class="overlay overlay1">
            <div class="popup">
                <h2>Photos</h2>
                <a class="close popup1Close" href="#">&times;</a>
                <div class="content">
                    <section class="splide popup1slider" aria-label="Splide Basic HTML Example">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide"><img src="{{ asset('images/img/Rectangle 215.png') }}"
                                        alt="">
                                </li>
                                <li class="splide__slide"> <img src="{{ asset('images/img/Rectangle 215.png') }}"
                                        alt="">
                                </li>
                                <li class="splide__slide"><img src="{{ asset('images/img/Rectangle 215.png') }}"
                                        alt="">
                                </li>
                                <li class="splide__slide"><img src="{{ asset('images/img/Rectangle 215.png') }}"
                                        alt="">
                                </li>
                            </ul>
                        </div>
                    </section>

                </div>
            </div>
        </div>

        <div class="all-comment-content">
            <h3>All Comments</h3>
            <i class="ri-message-fill"></i>
        </div>
        <div class="section-divide"> </div>
    </div>

    <!-- .all-comments-section  -->
    <div class="container all-comment-container">
        @foreach ($reviews as $review)
            <div class="all-comments-section">
                <div class="comment-content">
                    <h3>{{ $review->review_by }}</h3>
                    <div class="overall-rating">
                        <p>Overall:</p>
                        <div class="overall-star">
                            @for ($i = 1; $i <= $review->overall_rating; $i++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                        </div>
                    </div>
                    <p class="blue-txt">{{ $review->created_at }}</p>
                    <p class="comment-para">{{ $review->comment }}</p> <br>
                    <p class="blue-txt">Was this review helpful to you?</p>
                    <div class="like-wrapper">
                        <div class="likes-counter">
                            <div><a class="likes" class="cnt-btn"
                                    href="javascript:helpful({{ $review->id }}, {{ $review->helpful == '' ? 0 : $review->helpful }})"><i
                                        class="fa-solid fa-thumbs-up"></i></a></div>
                            <div id="first-l-counter-{{ $review->id }}">{{ $review->helpful == '' ? 0 : $review->helpful }}</div>
                        </div>
                        <div class="dislikes-counter">
                            <div><a class="dislikes" class="cnt-btn"
                                    href="javascript:nohelp({{ $review->id }}, {{ $review->nohelp == '' ? 0 : $review->nohelp }})"><i
                                        class="fa-solid fa-thumbs-down"></i></a></div>
                            <div id="first-d-counter-{{ $review->id }}">{{ $review->nohelp == '' ? 0 : $review->nohelp }}</div>
                        </div>
                    </div>
                </div>
                <div class="rating-content">
                    <div class="rating-content-inner-wrapper">
                        <div class="review-content-txt">
                            <p>Facilities:</p>
                        </div>
                        <div class="overall-star">
                            @for ($i = 1; $i <= $review->facilities_rating; $i++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                        </div>
                    </div>
                    <div class="rating-content-inner-wrapper">
                        <div class="review-content-txt">
                            <p>Curriculum:</p>
                        </div>
                        <div class="overall-star">
                            @for ($i = 1; $i <= $review->curriculum_rating; $i++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                        </div>
                    </div>
                    <div class="rating-content-inner-wrapper">
                        <div class="review-content-txt">
                            <p>Teachers:</p>
                        </div>
                        <div class="overall-star">
                            @for ($i = 1; $i <= $review->teachers_rating; $i++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                        </div>
                    </div>
                    <div class="rating-content-inner-wrapper">
                        <div class="review-content-txt">
                            <p>Safety:</p>
                        </div>
                        <div class="overall-star">
                            @for ($i = 1; $i <= $review->safety_rating; $i++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                        </div>
                    </div>
                    <div class="rating-content-img">
                        <img src="{{ asset('images/img/sm-photo1.png') }}" alt="">
                    </div>
                    <div class="share-btn">
                        <div class="share-btn-icon"><i class="fa-solid fa-reply"></i></div>
                        <p>Share Review</p>
                    </div>
                </div>
            </div>
            <div class="section-divide"> </div>
        @endforeach

        <!-- Popup -->
        <div class="popup-wrapper">
            @if (!empty($loginpopup))
                <div class="overlay" id="loginPopup" style="display:flex">
                @else
                    <div class="overlay" id="loginPopup">
            @endif
            <div class="popup">
                <span class="close-btn" onclick="closeLoginPopup()">&times;</span>
                <h2>Login</h2>
                <form id="loginForm" action="/user/loginPopup" method="post">
                    @csrf
                    @if (isset($loginpopup->id))
                        <input type="hidden" name="review_id" id="review_id" value="{{ $loginpopup->id }}" required>
                    @endif
                    {{-- <input type="hidden" name="location_filename" id="location_filename" value="{{ $location->filename }}" required> --}}
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        @if (isset($loginpopup->email))
                            <input type="email" name="email" id="email" value="{{ $loginpopup->email }}"
                                required readonly>
                        @else
                            <input type="email" name="email" id="email" required>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="review">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <input type="submit" value="Login">
                </form>
            </div>
        </div>
    </div>

    <div class="popup-wrapper">
        @if (!empty($signuppopup))
            <div class="overlay" id="signupPopup" style="display:flex">
            @else
                <div class="overlay" id="signupPopup">
        @endif
        <div class="popup">
            <span class="close-btn" onclick="closeSignupPopup()">&times;</span>
            <h2>Sign Up</h2>
            <form id="signupForm" action="/user/signupPopup" method="post">
                @csrf
                @if (isset($signuppopup->id))
                    <input type="hidden" name="review_id" id="review_id" value="{{ $signuppopup->id }}" required>
                @endif
                {{-- <input type="hidden" name="signup_location_filename" id="signup_location_filename" value="{{ $location->filename }}" required> --}}
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" required>
                </div>
                <div class="form-group">
                    <label for="new_email">Your Email</label>
                    @if (isset($signuppopup->email))
                        <input type="email" name="new_email" id="new_email" value="{{ $signuppopup->email }}"
                            required>
                    @else
                        <input type="email" name="new_email" id="new_email" required>
                    @endif
                </div>
                <div class="form-group">
                    <label for="new_password">Password</label>
                    <input type="password" name="new_password" id="new_password" minlength="6" required>
                </div>
                <input type="submit" value="Sign Up">
            </form>
        </div>
    </div>
    </div>
    </div>

    <!-- Question Section -->
    <section>
        <div class="container">
            <div class="section-title">
                <h2 class="black-title">Ask the Community</h2>
                <h3>Connect, Seek Advice, Share Knowledge</h3>
            </div>
            <div class="ask-question-btn">
                <a href="/send_question?gymId={{ $gym->id }}">Ask a Question</a>
            </div>
            <div class="question-wrapper">
                @foreach ($questions as $question)
                    <div class="single-question">
                        <div class="question">
                            <p>Question by {{ $question->question_by }} ({{ $question->passed }} ago):</p>
                            <p><?php echo $question->question;?></p>
                        </div>
                        @foreach ($question->answers as $answer)
                            <div class="answer">
                                <p>Answer:</p>
                                <p><?php echo $answer->answer;?></p>
                            </div>
                        @endforeach
                        <div>
                            <a href="/send_answer?gymId={{$gym->id}}&questionId={{$question->id}}">Answer the Question Above</a>
                        </div>
                    </div>
                @endforeach
            </div>            

            <!-- Popup -->
            <div class="popup-wrapper">
                <div class="overlay" id="questionPopup">
                    <div class="popup">
                        <span class="close-btn" onclick="closeQuestionPopup()">&times;</span>
                        <h2 style="color:black">Ask Your Question</h2>
                        <form id="questionForm" action="/send_question?gymID={{ $gym->id }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="userName">Your Name</label>
                                <input type="text" id="userName" name="userName" required>
                            </div>
                            <div class="form-group">
                                <label for="question">Your Question</label>
                                <textarea id="question" name="question" rows="4" required></textarea>
                            </div>
                            <input type="submit" value="Submit Question">
                        </form>
                    </div>
                </div>
            </div>

            <div class="popup-wrapper">
                <div class="overlay" id="answerPopup">
                    <div class="popup">
                        <span class="close-btn" onclick="closeAnswerPopup()">&times;</span>
                        <h2 style="color:black">Your Answer</h2>
                        <div class="alert alert-success" style="display: none">
                            Your answer has been successfully sent.
                        </div>
                        <form id="answerForm" action="/send_answer?gymID={{ $gym->id }}" method="post">
                            @csrf
                            <input type="hidden" id="question_id" name="question_id" required>
                            <div class="form-group" id="answer_userName-element">
                                <label for="userName">Your Name</label>
                                @if (!isset($user->type))
                                    <input type="text" id="answer_userName" name="answer_userName" required>
                                @else
                                    <input type="text" id="answer_userName" name="answer_userName"
                                        value="{{ $user->firstname . ' ' . $user->lastname }}" required readonly>
                                @endif
                                <ul class="errors">
                                    <li>Value is required and can't be empty</li>
                                </ul>
                            </div>
                            <div class="form-group" id="answer-element">
                                <label for="answer">Your Answer</label>
                                <textarea id="answer" name="answer" rows="4" required></textarea>
                                <ul class="errors">
                                    <li>Value is required and can't be empty</li>
                                </ul>
                            </div>
                            <input type="submit" value="Submit Answer">
                            {{-- <button type="button" onClick="send_answer();">Submit Answer</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // photo-slider -------------------------------------------------------------
        document.addEventListener('DOMContentLoaded', function() {

            var splide = new Splide('.photo-slider-desktop', {
                perPage: 4,
                gap: 30,
                perMove: 1,
                arrows: false,
                type: 'loop',
                autoplay: false,
                breakpoints: {
                    767: {
                        perPage: 1,
                        arrows: true,
                    },
                    991: {
                        perPage: 4,
                    }
                }
            });


            splide.mount();
        });


        // photo-slider -------------------------------------------------------------
        document.addEventListener('DOMContentLoaded', function() {

            var splide = new Splide('.photo-slider-mobile', {
                perPage: 1,
                gap: 50,
                perMove: 1,
                type: 'loop',
                autoplay: false,
                classes: {
                    arrows: 'splide__arrows video-arrows',
                    arrow: 'splide__arrow video-arrow',
                    prev: 'splide__arrow--prev video-prev',
                    next: 'splide__arrow--next',
                },
                pagination: false,
            });


            splide.mount();
        });

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

        // bottom slider 

        // Get the modal
        var modal = document.getElementById("myModal1");

        // Get the button that opens the modal
        // var btn = document.getElementById("myBtn1");

        // Get the <span> element that closes the modal
        // var closeBtn = document.querySelector(".close1");

        // console.log(closeBtn);


        // When the user clicks the button, open the modal 
        // btn.onclick = function() {
        //     modal.style.display = "block";
        // }

        // When the user clicks on <span> (x), close the modal
        // closeBtn.onclick = function() {
        //     modal.style.display = "none";
        // }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }


        // document.addEventListener('DOMContentLoaded', function() {

        //     var splide = new Splide('.small-photo-slider', {
        //         perPage: 1,
        //         gap: 25,
        //         perMove: 1,
        //         pagination: false,
        //         classes: {
        //             arrows: 'splide__arrows video-arrows',
        //             arrow: 'splide__arrow video-arrow',
        //             prev: 'splide__arrow--prev video-prev',
        //             next: 'splide__arrow--next video-next',
        //         },
        //         autoplay: false,
        //         type: 'loop',
        //     });


        //     splide.mount();
        // });

        // top slider 

        // Get the modal
        var modal2 = document.getElementById("myModal2");

        // Get the button that opens the modal
        // var btn2 = document.getElementById("myBtn2");

        // Get the <span> element that closes the modal
        // var closeBtn2 = document.querySelector(".close2");

        // When the user clicks the button, open the modal 
        // btn2.onclick = function() {
        //     alert("click on button two");
        //     modal2.style.display = "block";
        // }

        // When the user clicks on <span> (x), close the modal
        // closeBtn2.onclick = function() {
        //     modal2.style.display = "none";
        // }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event2) {
            if (event2.target == modal2) {
                modal2.style.display = "none";
            }
        }

        // document.addEventListener('DOMContentLoaded', function() {

        //     var splide = new Splide('.small-photo-slider2', {
        //         perPage: 1,
        //         gap: 25,
        //         perMove: 1,
        //         pagination: false,
        //         classes: {
        //             arrows: 'splide__arrows video-arrows',
        //             arrow: 'splide__arrow video-arrow',
        //             prev: 'splide__arrow--prev video-prev',
        //             next: 'splide__arrow--next video-next',
        //         },
        //         autoplay: false,
        //         type: 'loop',
        //     });


        //     splide.mount();
        // });

        $(".review-btn").click(function() {
            const scrollToEl = $('.gym-form-n-review-section');
            $('html').animate({
                    scrollTop: scrollToEl.offset().top - 50,
                },
                300 //speed
            );
        });
    </script>

    <script>
        // Popup One
        var poupOneBtn = document.querySelectorAll(".popup1btn");
        var popupOne = document.querySelector(".overlay1");
        var popupOneClose = document.querySelector(".popup1Close");
        poupOneBtn.forEach(btn => {
            btn.addEventListener('click', () => {
                popupOne.style.display = "block";
            })
        });

        popupOneClose.addEventListener('click', () => {
            popupOne.style.display = "none";
        })


        // Popup Two
        var poupTwoBtn = document.querySelectorAll(".popup2btn");
        var popupTwo = document.querySelector(".overlay2");
        var popupTwoClose = document.querySelector(".popup2Close");


        poupTwoBtn.forEach(btn => {
            btn.addEventListener('click', () => {
                popupTwo.style.display = "block";
            })
        });

        // poupTwoBtn.addEventListener('click', () => {
        //   alert("you clicked on the button");
        //   popupTwo.style.display = "block";
        // })

        popupTwoClose.addEventListener('click', () => {
            popupTwo.style.display = "none";
        })
    </script>


    <!-- Splide slider for popup2 -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var splide = new Splide('.splidepopup2');
            splide.mount();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var splide = new Splide('.popup1slider');
            splide.mount();
        });
    </script>

    <script>
        function helpful(id, count) {
            var firstLClicks = parseInt(count);
            firstLClicks += 1;

            if(!$.cookie('helpful_cookie_'+id)){
                $.ajax({
                    method: "POST",
                    url: "/helpful_counter",
                    data: {
                        review_id: id,
                        helpful: count,
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .done(function(msg) {
                    document.getElementById("first-l-counter-"+id).innerHTML = firstLClicks;
                    $.cookie('helpful_cookie_'+id, 'true', { expires: 365*10 });
                });
            }
        }

        function nohelp(id, count) {
            var firstDClicks = parseInt(count);
            firstDClicks += 1;

            if(!$.cookie('nohelp_cookie_'+id)){
                $.ajax({
                    method: "POST",
                    url: "/nohelp_counter",
                    data: {
                        review_id: id,
                        nohelp: count,
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .done(function(msg) {
                    document.getElementById("first-d-counter-"+id).innerHTML = firstDClicks;
                    $.cookie('nohelp_cookie_'+id, 'true', { expires: 365*10 });
                });
            }
        }
    </script>
@endsection
