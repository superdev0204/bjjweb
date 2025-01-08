@push('meta')
    <meta name="description" content="">
@endpush

@push('title')
    <title>Search for Brazillian Jiu Jitsu Schools</title>
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
                @if (isset($request->location))
                    <li><a href="#">{{ $request->location }}</a></li>
                @else
                    <li><span>Search</span></li>
                @endif
            </ul>
        </div>
    </section>

    <div id="container" class="container">
        <form method="POST" action="/search">
            @csrf
            <div class="gyms-search-holder">
                <div class="search-wrapper">
                    <div class="search-wrapper-icon">
                        <i class="search-icon fas fa-search"></i>
                        @if (isset($request->location))
                            <input type="text" id="location" name="location" class="search"
                                placeholder="Enter ZIP Code or City/State" value="{{ $request->location }}">
                        @else
                            <input type="text" id="location" name="location" class="search"
                                placeholder="Enter ZIP Code or City/State" value="{{ old('location') }}">
                        @endif
                    </div>
                </div>
                <button class="gyms-search-btn" type="submit">Search</button>
            </div><br/>

            <div id="optionalfields-element" class="form-content">
                <fieldset id="fieldset-optionalfields" style="border:0">
                    <legend style="padding:10px">Optional Fields</legend>
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
                        @if( isset($request->address) )
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
                        <label class="credentials-label" for="name">Phone:</label>
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
                </fieldset>
            </div>
        </form>
    </div>

    <!-- Articles Content -->
    <section class="articles-section">
        <div class="special-container artical">
            <div class="article-n-gyms-section">
                <div class="articles-holder">
                    <h2>Latest Brazillian Jiu Jitsu School
                        Listings</h2>
                    @if (isset($gyms))
                        @foreach ($gyms as $gym)
                            <div class="single-articles-holder">
                                <div class="article-img">
                                    <img class="articles-img" src="{{ $gym->logo_url }}">
                                </div>
                                <div class="article-txt">
                                    <div class="articles-text-c">
                                        <a href="/dojo-detail/{{ $gym->id }}"
                                            style="color:white; font-size: 18px; text-decoration: underline;">
                                            {{ ucwords(strtolower($gym->name)) }}</a>
                                        <p style="font-size: 18px;color: #1489DE;">
                                            <br>{{ ucwords(strtolower($gym->city)) }},
                                            {{ $gym->state }} - {{ $gym->zip }} |
                                            {{ $gym->phone }}</p>
                                        <p style="font-size: 16px;line-height: 23px;">
                                            <span style="color: #1489DE;">Details:</span>
                                            {{ $gym->details }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="articles-gym-list">
                    <div class="article-gym-list-title-wrap">
                        <h4 class="articles-gym-list-title" onclick="toggleList()">
                            BJJ GYMS IN THE US</h4>
                        <i class="caret-icon fa fa-caret-down" onclick="toggleList()"></i>
                    </div>

                    <div id="stateDropdown" class="articles-gym-list-h">
                        <div class="articles-gym-list-c">
                            <a href="/alabama-dojos">Alabama</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/alaska-dojos">Alaska</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/arizona-dojos">Arizona</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/arkansas-dojos">Arcansas</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/california-dojos">California</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/colorado-dojos">Colorado</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/connecticut-dojos">Connecticut</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/delaware-dojos">Delaware</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/district-of-columbia-dojos">District of Columbia</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/florida-dojos">Florida</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/georgia-dojos">Georgia</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/hawaii-dojos">Hawaii</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/idaho-dojos">Idaho</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/illinois-dojos">Illinois</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/indiana-dojos">Indiana</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/iowa-dojos">Iowa</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/kansas-dojos">Kansas</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/kentucky-dojos">Kentucky</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/louisiana-dojos">Louisiana</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/maine-dojos">Maine</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/maryland-dojos">Maryland</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/massachusetts-dojos">Massachusetts</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/michigan-dojos">Michigan</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/minnesota-dojos">Minnesota</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/mississippi-dojos">Mississippi</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/missouri-dojos">Missouri</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/montana-dojos">Montana</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/nebraska-dojos">Nebraska</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/nevada-dojos">Nevada</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/new-hampshire-dojos">New Hampshire</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/new-jersey-dojos">New Jersey</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/new-mexico-dojos">New Mexico</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/new-york-dojos">New York</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/north-carolina-dojos">North Carolina</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/north-dakota-dojos">North Dakota</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/ohio-dojos">Ohio</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/oklahoma-dojos">Oklahoma</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/oregon-dojos">Oregon</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/pennsylvania-dojos">Pennsylvania</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/rhode-island-dojos">Rhode Island</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/south-carolina-dojos">South Carolina</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/south-dakota-dojos">South Dakota</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/tennessee-dojos">Tennessee</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/texas-dojos">Texas</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/utah-dojos">Utah</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/vermont-dojos">Vermont</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/virginia-dojos">Virginia</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/washington-dojos">Washington</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/west-virginia-dojos">West Virginia</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/wisconsin-dojos">Wisconsin</a>
                        </div>
                        <div class="articles-gym-list-c">
                            <a href="/wyoming-dojos">Wyoming</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- State list -->
    </section>

    <script>
        function calculateMarginLeft() {
            // var tabsContainer = document.getElementById("tabs-container");
            var tabsContainer = document.querySelectorAll(".special-container");

            // Select the container element
            var container = document.getElementById('container');

            // Get the computed style of the container
            var containerStyle = window.getComputedStyle(container);

            // Extract the margin-left value
            var marginLeft = containerStyle.getPropertyValue('margin-left');

            // Convert the value to a numerical format
            var marginLeftValue = parseFloat(marginLeft);

            // Log the result to the console or update your application with the new value
            console.log('Margin-left:', marginLeft);
            console.log('Numeric value:', marginLeftValue);

            // tabsContainer.style.marginLeft = marginLeft;

            // Apply the margin-left to all containers
            tabsContainer.forEach(function(container) {
                container.style.marginLeft = marginLeft;
            });
        }

        // Initial calculation
        calculateMarginLeft();

        // Recalculate on window resize
        window.addEventListener('resize', calculateMarginLeft);
    </script>
@endsection
