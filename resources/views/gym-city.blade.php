@push('meta')
    <meta name="description" content="This include the list of all Brazillian Jiu Jitsu schools in {{ ucwords(strtolower($city->name)) }} {{ $state->state_code }}">
@endpush

@push('title')
    <title>Brazillian Jiu Jitsu School in {{ ucwords(strtolower($city->name)) }} {{ $state->state_code }}</title>
@endpush

@extends('layouts.app')

@section('content')
    <link rel="canonical" href="https://bjjweb.com/{{ $state->statefile }}-dojos/{{ $city->filename }}-city">
    
    <!-- breadcrumb navigation  -->
    <section class="breadcrumb-nav">
        <div class="container">
            <ul id="breadcrumb">
                <li><a href="{{ url('/') }}">Brazilian Jiu Jitsu Gyms</a></li>
                <span class="breadcrumb-divide">
                    <p>>></p>
                </span>
                <li><a href="/{{ $state->statefile }}-dojos">{{ $state->state_name }}</a></li>
                <span class="breadcrumb-divide">
                    <p>>></p>
                </span>
                <li><span>{{ ucwords(strtolower($city->city)) }}</span></li>
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
                        @if( isset($location) )
                            <input type="text" id="location" name="location" class="search" placeholder="Enter ZIP Code or City/State" value="{{ $location }}" required>
                        @else
                            <input type="text" id="location" name="location" class="search" placeholder="Enter ZIP Code or City/State" value="{{ old('location') }}" required>
                        @endif
                    </div>
                </div>
                <button class="gyms-search-btn" type="submit">Search</button>
            </div>
        </form>
    </div>

    <div class="container">
        <h1>Jiu Jitsu Dojos in <?php echo ucwords(strtolower($city->city)); ?></h1>
        <p>We welcome user reviews and corrections of listings, as we strive to provide the best and most up-to-date
            information possible. Simply click on the listing below for more information.</p>
    </div>
    
    <!-- Articles Content -->
    <section class="articles-section">
        <div class="special-container artical">
            <div class="article-n-gyms-section">
                <div class="articles-holder">
                    <h2>Latest Update to <?php echo $state->state_name; ?> Brazillian Jiu Jitsu School database:</h2>
                    @if( isset($gyms) )
                        @foreach ($gyms as $gym)
                            <div class="single-articles-holder">
                                <div class="article-img">
                                    <img class="articles-img" src="{{ $gym->logo_url }}">
                                </div>
                                <div class="article-txt">
                                    <div class="articles-text-c">
                                        <a href="/dojo-detail/{{ $gym->id }}" style="color:white; font-size: 18px; text-decoration: underline;">
                                            {{ ucwords(strtolower($gym->name)) }}</a>
                                        <p style="font-size: 18px;color: #1489DE;"> <br>{{ ucwords(strtolower($gym->city)) }},
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

    <!-- Question Section -->
    <section>
        <div class="container">
            <div class="section-title">
                <h2 class="black-title">Ask the Community</h2>
                <h3>Connect, Seek Advice, Share Knowledge</h3>
            </div>
            <div class="ask-question-btn">
                <a href="/send_question?page_url={{ $page_url }}">Ask a Question</a>
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
                            <a href="/send_answer?page_url={{ $page_url }}&questionId={{$question->id}}">Answer the Question Above</a>
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
