@push('meta')
    <meta name="robots" content="noindex,follow">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('title')
    <title>Add New Brazillian Jiu Jitsu School</title>
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
                <li><span>Add New Brazillian Jiu Jitsu School</span></li>
            </ul>
        </div>
    </section>

    <div id="content" class="container">
        <div id="primary" class="form-content" style="width:50%">
            <h1>Add New Brazillian Jiu Jitsu School</h1>
            <?php if (isset($message)) :?>
            <p><?php echo $message; ?></p>
            <?php endif;?>

            @if( $gym )
                <div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Name:&nbsp;</label>
                        <span>{{ $gym->name }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Address:&nbsp;</label>
                        <span>{{ $gym->address }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">City:&nbsp;</label>
                        <span>{{ $gym->city }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Country:&nbsp;</label>
                        <span>{{ $gym->country_id }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">State:&nbsp;</label>
                        <span>{{ $gym->state }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Zip Code:&nbsp;</label>
                        <span>{{ $gym->zip }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Website:&nbsp;</label>
                        <span>{{ $gym->website }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Phone:&nbsp;</label>
                        <span>{{ $gym->phone }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Description:&nbsp;</label>
                        <span>{{ $gym->details }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Kids Program URL:&nbsp;</label>
                        <span>{{ $gym->kids_program_url }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Kids Program Detail:&nbsp;</label>
                        <span>{{ $gym->kids_program_detail }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Women Only Program URL:&nbsp;</label>
                        <span>{{ $gym->woman_only_program_url }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Women Only Program Detail:&nbsp;</label>
                        <span>{{ $gym->woman_only_program_detail }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Rate/Pricing:&nbsp;</label>
                        <span>{{ $gym->pricing }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Schedule URL:&nbsp;</label>
                        <span>{{ $gym->schedule_url }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Business Hour:&nbsp;</label>
                        <span>{{ $gym->business_hour }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Head Professor:&nbsp;</label>
                        <span>{{ $gym->head_professor }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Special Offer:&nbsp;</label>
                        <span>{{ $gym->special_offer }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Facebook URL:&nbsp;</label>
                        <span>{{ $gym->facebook_url }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Youtube Channel:&nbsp;</label>
                        <span>{{ $gym->youtube_channel }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Video URL:&nbsp;</label>
                        <span>{{ $gym->video_url }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Awards:&nbsp;</label>
                        <span>{{ $gym->awards }}</span>
                    </div>
                    <div style="display:flex; margin-bottom:10px">
                        <label class="credentials-label">Multiple Locations:&nbsp;</label>
                        <span>{{ ($gym->multiple_locations == 0) ? "No" : "Yes" }}</span>
                    </div>
                </div>
            @else
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <label class="credentials-label" for="name">Name:</label>
                        @if( isset($request->name) )
                            <input class="credentials-input" type="text" id="name" name="name" value="{{$request->name}}">
                        @else
                            <input class="credentials-input" id="name" name="name" type="text" value="{{old('name')}}">
                        @endif
                        @error('name')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="address">Address:</label>
                        @if( isset($request->name) )
                            <input class="credentials-input" type="text" id="address" name="address" value="{{$request->address}}">
                        @else
                            <input class="credentials-input" id="address" name="address" type="text" value="{{old('address')}}">
                        @endif
                        @error('address')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="city">City:</label>
                        @if( isset($request->city) )
                            <input class="credentials-input" type="text" id="city" name="city" value="{{$request->city}}">
                        @else
                            <input class="credentials-input" id="city" name="city" type="text" value="{{old('city')}}">
                        @endif
                        @error('city')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="country">Country:</label>
                        <select class="credentials-input" name="country" id="country">
                            <option value="">-Select-</option>
                            @foreach ($countries as $country)
                                @if( isset($request->country) )
                                    @if($country->id == $request->country)
                                        <option value='{{ $country->id }}' selected>{{ $country->name }}</option>
                                    @else
                                        <option value='{{ $country->id }}'>{{ $country->name }}</option>
                                    @endif
                                @else
                                    @if($country->id == old('country'))
                                        <option value='{{ $country->id }}' selected>{{ $country->name }}</option>
                                    @else
                                        @if(!old('country') && $country->id == "US")
                                            <option value='{{ $country->id }}' selected>{{ $country->name }}</option>
                                        @else
                                            <option value='{{ $country->id }}'>{{ $country->name }}</option>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        </select>
                        @error('country')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="state">State:</label>
                        <select class="credentials-input" name="state" id="state" <?php echo (count($states) == 0) ? "disabled" : "";?>>
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
                        @error('state')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="zip">Zip Code:</label>
                        @if( isset($request->zip) )
                            <input class="credentials-input" type="text" id="zip" name="zip" value="{{$request->zip}}">
                        @else
                            <input class="credentials-input" id="zip" name="zip" type="text" value="{{old('zip')}}">
                        @endif
                        @error('zip')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="website">Website:</label>
                        @if( isset($request->website) )
                            <input class="credentials-input" type="text" id="website" name="website" value="{{$request->website}}">
                        @else
                            <input class="credentials-input" id="website" name="website" type="text" value="{{old('website')}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="phone">Phone:</label>
                        @if( isset($request->phone) )
                            <input class="credentials-input" type="text" id="phone" name="phone" value="{{$request->phone}}">
                        @else
                            <input class="credentials-input" id="phone" name="phone" type="text" value="{{old('phone')}}">
                        @endif
                        @error('phone')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="details">Description:</label>
                        @if( isset($request->details) )
                            <textarea class="credentials-input" id="details" name="details" cols="15" rows="5">{{$request->details}}</textarea>
                        @else
                            <textarea class="credentials-input" id="details" name="details" cols="15" rows="5">{{old('details')}}</textarea>
                        @endif
                        @error('details')
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="kidsProgramUrl">Kids Program URL:</label>
                        @if( isset($request->kidsProgramUrl) )
                            <input class="credentials-input" type="text" id="kidsProgramUrl" name="kidsProgramUrl" value="{{$request->kidsProgramUrl}}">
                        @else
                            <input class="credentials-input" id="kidsProgramUrl" name="kidsProgramUrl" type="text" value="{{old('kidsProgramUrl')}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="kidsProgramDetail">Kids Program Detail:</label>
                        @if( isset($request->kidsProgramDetail) )
                            <textarea class="credentials-input" id="kidsProgramDetail" name="kidsProgramDetail" cols="15" rows="5">{{$request->kidsProgramDetail}}</textarea>
                        @else
                            <textarea class="credentials-input" id="kidsProgramDetail" name="kidsProgramDetail" cols="15" rows="5">{{old('kidsProgramDetail')}}</textarea>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="womanOnlyProgramUrl">Women Only Program URL:</label>
                        @if( isset($request->womanOnlyProgramUrl) )
                            <input class="credentials-input" type="text" id="womanOnlyProgramUrl" name="womanOnlyProgramUrl" value="{{$request->womanOnlyProgramUrl}}">
                        @else
                            <input class="credentials-input" id="womanOnlyProgramUrl" name="womanOnlyProgramUrl" type="text" value="{{old('womanOnlyProgramUrl')}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="womanOnlyProgramDetail">Women Only Program Detail:</label>
                        @if( isset($request->womanOnlyProgramDetail) )
                            <textarea class="credentials-input" id="womanOnlyProgramDetail" name="womanOnlyProgramDetail" cols="15" rows="5">{{$request->womanOnlyProgramDetail}}</textarea>
                        @else
                            <textarea class="credentials-input" id="womanOnlyProgramDetail" name="womanOnlyProgramDetail" cols="15" rows="5">{{old('womanOnlyProgramDetail')}}</textarea>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="pricing">Rate/Pricing:</label>
                        @if( isset($request->pricing) )
                            <input class="credentials-input" type="text" id="pricing" name="pricing" value="{{$request->pricing}}">
                        @else
                            <input class="credentials-input" id="pricing" name="pricing" type="text" value="{{old('pricing')}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="scheduleUrl">Schedule URL:</label>
                        @if( isset($request->scheduleUrl) )
                            <input class="credentials-input" type="text" id="scheduleUrl" name="scheduleUrl" value="{{$request->scheduleUrl}}">
                        @else
                            <input class="credentials-input" id="scheduleUrl" name="scheduleUrl" type="text" value="{{old('scheduleUrl')}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="businessHour">Business Hour:</label>
                        @if( isset($request->businessHour) )
                            <input class="credentials-input" type="text" id="businessHour" name="businessHour" value="{{$request->businessHour}}">
                        @else
                            <input class="credentials-input" id="businessHour" name="businessHour" type="text" value="{{old('businessHour')}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="headProfessor">Head Professor:</label>
                        @if( isset($request->headProfessor) )
                            <input class="credentials-input" type="text" id="headProfessor" name="headProfessor" value="{{$request->headProfessor}}">
                        @else
                            <input class="credentials-input" id="headProfessor" name="headProfessor" type="text" value="{{old('headProfessor')}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="specialOffer">Special Offer:</label>
                        @if( isset($request->specialOffer) )
                            <input class="credentials-input" type="text" id="specialOffer" name="specialOffer" value="{{$request->specialOffer}}">
                        @else
                            <input class="credentials-input" id="specialOffer" name="specialOffer" type="text" value="{{old('specialOffer')}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="facebookUrl">Facebook URL:</label>
                        @if( isset($request->facebookUrl) )
                            <input class="credentials-input" type="text" id="facebookUrl" name="facebookUrl" value="{{$request->facebookUrl}}">
                        @else
                            <input class="credentials-input" id="facebookUrl" name="facebookUrl" type="text" value="{{old('facebookUrl')}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="youtubeChannel">Youtube Channel:</label>
                        @if( isset($request->youtubeChannel) )
                            <input class="credentials-input" type="text" id="youtubeChannel" name="youtubeChannel" value="{{$request->youtubeChannel}}">
                        @else
                            <input class="credentials-input" id="youtubeChannel" name="youtubeChannel" type="text" value="{{old('youtubeChannel')}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="videoUrl">Video URL:</label>
                        @if( isset($request->videoUrl) )
                            <input class="credentials-input" type="text" id="videoUrl" name="videoUrl" value="{{$request->videoUrl}}">
                        @else
                            <input class="credentials-input" id="videoUrl" name="videoUrl" type="text" value="{{old('videoUrl')}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="awards">Awards:</label>
                        @if( isset($request->awards) )
                            <input class="credentials-input" type="text" id="awards" name="awards" value="{{$request->awards}}">
                        @else
                            <input class="credentials-input" id="awards" name="awards" type="text" value="{{old('awards')}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="multipleLocations">Multiple Locations:</label>
                        <select class="credentials-input" name="multipleLocations" id="multipleLocations">
                            @if( isset($request->multipleLocations) )
                                @if($request->multipleLocations == 1)
                                    <option value="0">No</option>
                                    <option value="1" selected>Yes</option>
                                @else
                                    <option value="0" selected>No</option>
                                    <option value="1">Yes</option>
                                @endif
                            @else
                                @if(old('multipleLocations') == 1)
                                    <option value="0">No</option>
                                    <option value="1" selected>Yes</option>
                                @else
                                    <option value="0" selected>No</option>
                                    <option value="1">Yes</option>
                                @endif
                            @endif                        
                        </select>
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
                        </div><br/>
                    @endif

                    <button type="submit" class="form-content-submit-btn">Submit</button>                
                </form>
            @endif
        </div><br/>
    </div>

    <script>
        $(function() {
            $('body').on('change', '#country', function(e) {
                e.preventDefault();

                $.ajax({
                    method: "POST",
                    url: "/states_in_country",
                    data: {
                        country_id: e.target.value,
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .done(function(states) {
                    if(states.length == 0){
                        $('#state').prop('disabled', true);
                    }
                    else{
                        $('#state').prop('disabled', false);
                        $('#state').empty();
                        $('#state').append($('<option value="">-Select-</option>'));
                        states.forEach(function(state) {
                            $('#state').append($('<option value="' + state.state_code + '">' + state.state_name + '</option>'));
                        });
                    }
                });
            })
        });
    </script>
@endsection
