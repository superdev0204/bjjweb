@push('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <li><a href="{{ url('/admin') }}">Admin</a></li>
                <span class="breadcrumb-divide">
                    <p>>></p>
                </span>
                <li><span>Update Brazillian Jiu Jitsu School</span></li>
            </ul>
        </div>
    </section>

    <div id="content" class="container">
        <div id="primary" class="form-content" style="width:50%">
            <h1>Add New Brazillian Jiu Jitsu School</h1>
            <?php if (isset($message)) :?>
            <p><?php echo $message; ?></p>
            <?php endif;?>

            <?php if (!isset($request->name)) :?>
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <label class="credentials-label" for="name">Name:</label>
                        @if( isset($request->name) )
                            <input class="credentials-input" type="text" id="name" name="name" value="{{$request->name}}">
                        @else
                            @if( !empty(old('name')) )
                                <input class="credentials-input" id="name" name="name" type="text" value="{{old('name')}}">
                            @else
                                <input class="credentials-input" id="name" name="name" type="text" value="{{$gym->name}}">
                            @endif
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
                            @if( !empty(old('address')) )
                                <input class="credentials-input" id="address" name="address" type="text" value="{{old('address')}}">
                            @else
                                <input class="credentials-input" id="address" name="address" type="text" value="{{$gym->address}}">
                            @endif
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
                            @if( !empty(old('city')) )
                                <input class="credentials-input" id="city" name="city" type="text" value="{{old('city')}}">
                            @else
                                <input class="credentials-input" id="city" name="city" type="text" value="{{$gym->city}}">
                            @endif
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
                                        @if($country->id == $gym->country_id)
                                            <option value='{{ $country->id }}' selected>{{ $country->name }}</option>
                                        @else
                                            @if(!old('country') && !$gym->country_id && $country->id == "US")
                                                <option value='{{ $country->id }}' selected>{{ $country->name }}</option>
                                            @else
                                                <option value='{{ $country->id }}'>{{ $country->name }}</option>
                                            @endif
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
                                    @if( !empty(old('state')) )
                                        @if($state->state_code == old('state'))
                                            <option value='{{ $state->state_code }}' selected>{{ $state->state_name }}</option>
                                        @else
                                            <option value='{{ $state->state_code }}'>{{ $state->state_name }}</option>
                                        @endif
                                    @else
                                        @if($state->state_code == $gym->state)
                                            <option value='{{ $state->state_code }}' selected>{{ $state->state_name }}</option>
                                        @else
                                            <option value='{{ $state->state_code }}'>{{ $state->state_name }}</option>
                                        @endif
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
                            @if( !empty(old('zip')) )
                                <input class="credentials-input" id="zip" name="zip" type="text" value="{{old('zip')}}">
                            @else
                                <input class="credentials-input" id="zip" name="zip" type="text" value="{{$gym->zip}}">
                            @endif
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
                            @if( !empty(old('website')) )
                                <input class="credentials-input" id="website" name="website" type="text" value="{{old('website')}}">
                            @else
                                <input class="credentials-input" id="website" name="website" type="text" value="{{$gym->website}}">
                            @endif
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="phone">Phone:</label>
                        @if( isset($request->phone) )
                            <input class="credentials-input" type="text" id="phone" name="phone" value="{{$request->phone}}">
                        @else
                            @if( !empty(old('phone')) )
                                <input class="credentials-input" id="phone" name="phone" type="text" value="{{old('phone')}}">
                            @else
                                <input class="credentials-input" id="phone" name="phone" type="text" value="{{$gym->phone}}">
                            @endif
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
                            @if( !empty(old('phone')) )
                                <textarea class="credentials-input" id="details" name="details" cols="15" rows="5">{{old('details')}}</textarea>
                            @else
                                <textarea class="credentials-input" id="details" name="details" cols="15" rows="5">{{$gym->details}}</textarea>
                            @endif
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
                            @if( !empty(old('kidsProgramUrl')) )
                                <input class="credentials-input" id="kidsProgramUrl" name="kidsProgramUrl" type="text" value="{{old('kidsProgramUrl')}}">
                            @else
                                <input class="credentials-input" id="kidsProgramUrl" name="kidsProgramUrl" type="text" value="{{$gym->kids_program_url}}">
                            @endif
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="kidsProgramDetail">Kids Program Detail:</label>
                        @if( isset($request->kidsProgramDetail) )
                            <textarea class="credentials-input" id="kidsProgramDetail" name="kidsProgramDetail" cols="15" rows="5">{{$request->kidsProgramDetail}}</textarea>
                        @else
                            @if( !empty(old('kidsProgramDetail')) )
                                <textarea class="credentials-input" id="kidsProgramDetail" name="kidsProgramDetail" cols="15" rows="5">{{old('kidsProgramDetail')}}</textarea>
                            @else
                                <textarea class="credentials-input" id="kidsProgramDetail" name="kidsProgramDetail" cols="15" rows="5">{{$gym->kids_program_detail}}</textarea>
                            @endif
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="womanOnlyProgramUrl">Women Only Program URL:</label>
                        @if( isset($request->womanOnlyProgramUrl) )
                            <input class="credentials-input" type="text" id="womanOnlyProgramUrl" name="womanOnlyProgramUrl" value="{{$request->womanOnlyProgramUrl}}">
                        @else
                            @if( !empty(old('womanOnlyProgramUrl')) )
                                <input class="credentials-input" id="womanOnlyProgramUrl" name="womanOnlyProgramUrl" type="text" value="{{old('womanOnlyProgramUrl')}}">
                            @else
                                <input class="credentials-input" id="womanOnlyProgramUrl" name="womanOnlyProgramUrl" type="text" value="{{$gym->woman_only_program_url}}">
                            @endif
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="womanOnlyProgramDetail">Women Only Program Detail:</label>
                        @if( isset($request->womanOnlyProgramDetail) )
                            <textarea class="credentials-input" id="womanOnlyProgramDetail" name="womanOnlyProgramDetail" cols="15" rows="5">{{$request->womanOnlyProgramDetail}}</textarea>
                        @else
                            @if( !empty(old('womanOnlyProgramDetail')) )
                                <textarea class="credentials-input" id="womanOnlyProgramDetail" name="womanOnlyProgramDetail" cols="15" rows="5">{{old('womanOnlyProgramDetail')}}</textarea>
                            @else
                                <textarea class="credentials-input" id="womanOnlyProgramDetail" name="womanOnlyProgramDetail" cols="15" rows="5">{{$gym->woman_only_program_detail}}</textarea>
                            @endif
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="pricing">Rate/Pricing:</label>
                        @if( isset($request->pricing) )
                            <input class="credentials-input" type="text" id="pricing" name="pricing" value="{{$request->pricing}}">
                        @else
                            @if( !empty(old('pricing')) )
                                <input class="credentials-input" id="pricing" name="pricing" type="text" value="{{old('pricing')}}">
                            @else
                                <input class="credentials-input" id="pricing" name="pricing" type="text" value="{{$gym->pricing}}">
                            @endif
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="scheduleUrl">Schedule URL:</label>
                        @if( isset($request->scheduleUrl) )
                            <input class="credentials-input" type="text" id="scheduleUrl" name="scheduleUrl" value="{{$request->scheduleUrl}}">
                        @else
                            @if( !empty(old('scheduleUrl')) )
                                <input class="credentials-input" id="scheduleUrl" name="scheduleUrl" type="text" value="{{old('scheduleUrl')}}">
                            @else
                                <input class="credentials-input" id="scheduleUrl" name="scheduleUrl" type="text" value="{{$gym->schedule_url}}">
                            @endif
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="businessHour">Business Hour:</label>
                        @if( isset($request->businessHour) )
                            <input class="credentials-input" type="text" id="businessHour" name="businessHour" value="{{$request->businessHour}}">
                        @else
                            @if( !empty(old('businessHour')) )
                                <input class="credentials-input" id="businessHour" name="businessHour" type="text" value="{{old('businessHour')}}">
                            @else
                                <input class="credentials-input" id="businessHour" name="businessHour" type="text" value="{{$gym->business_hour}}">
                            @endif
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="headProfessor">Head Professor:</label>
                        @if( isset($request->headProfessor) )
                            <input class="credentials-input" type="text" id="headProfessor" name="headProfessor" value="{{$request->headProfessor}}">
                        @else
                            @if( !empty(old('headProfessor')) )
                                <input class="credentials-input" id="headProfessor" name="headProfessor" type="text" value="{{old('headProfessor')}}">
                            @else
                                <input class="credentials-input" id="headProfessor" name="headProfessor" type="text" value="{{$gym->head_professor}}">
                            @endif
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="specialOffer">Special Offer:</label>
                        @if( isset($request->specialOffer) )
                            <input class="credentials-input" type="text" id="specialOffer" name="specialOffer" value="{{$request->specialOffer}}">
                        @else
                            @if( !empty(old('specialOffer')) )
                                <input class="credentials-input" id="specialOffer" name="specialOffer" type="text" value="{{old('specialOffer')}}">
                            @else
                                <input class="credentials-input" id="specialOffer" name="specialOffer" type="text" value="{{$gym->special_offer}}">
                            @endif
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="facebookUrl">Facebook URL:</label>
                        @if( isset($request->facebookUrl) )
                            <input class="credentials-input" type="text" id="facebookUrl" name="facebookUrl" value="{{$request->facebookUrl}}">
                        @else
                            @if( !empty(old('facebookUrl')) )
                                <input class="credentials-input" id="facebookUrl" name="facebookUrl" type="text" value="{{old('facebookUrl')}}">
                            @else
                                <input class="credentials-input" id="facebookUrl" name="facebookUrl" type="text" value="{{$gym->facebook_url}}">
                            @endif
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="youtubeChannel">Youtube Channel:</label>
                        @if( isset($request->youtubeChannel) )
                            <input class="credentials-input" type="text" id="youtubeChannel" name="youtubeChannel" value="{{$request->youtubeChannel}}">
                        @else
                            @if( !empty(old('youtubeChannel')) )
                                <input class="credentials-input" id="youtubeChannel" name="youtubeChannel" type="text" value="{{old('youtubeChannel')}}">
                            @else
                                <input class="credentials-input" id="youtubeChannel" name="youtubeChannel" type="text" value="{{$gym->youtube_channel}}">
                            @endif
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="videoUrl">Video URL:</label>
                        @if( isset($request->videoUrl) )
                            <input class="credentials-input" type="text" id="videoUrl" name="videoUrl" value="{{$request->videoUrl}}">
                        @else
                            @if( !empty(old('videoUrl')) )
                                <input class="credentials-input" id="videoUrl" name="videoUrl" type="text" value="{{old('videoUrl')}}">
                            @else
                                <input class="credentials-input" id="videoUrl" name="videoUrl" type="text" value="{{$gym->video_url}}">
                            @endif
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="awards">Awards:</label>
                        @if( isset($request->awards) )
                            <input class="credentials-input" type="text" id="awards" name="awards" value="{{$request->awards}}">
                        @else
                            @if( !empty(old('awards')) )
                                <input class="credentials-input" id="awards" name="awards" type="text" value="{{old('awards')}}">
                            @else
                                <input class="credentials-input" id="awards" name="awards" type="text" value="{{$gym->awards}}">
                            @endif
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
                                @if( old('multipleLocations') != "" )
                                    @if(old('multipleLocations') == 1)
                                        <option value="0">No</option>
                                        <option value="1" selected>Yes</option>
                                    @else
                                        <option value="0" selected>No</option>
                                        <option value="1">Yes</option>
                                    @endif
                                @else
                                    @if($gym->multiple_locations == 1)
                                        <option value="0">No</option>
                                        <option value="1" selected>Yes</option>
                                    @else
                                        <option value="0" selected>No</option>
                                        <option value="1">Yes</option>
                                    @endif
                                @endif
                            @endif
                        </select>
                    </div>
                    {{-- <div class="form-group">
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
                    </div> --}}
                    <br/>
                    <button type="submit" class="form-content-submit-btn">Submit</button>
                </form>
            <?php endif;?>
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
