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
                <li><span>Review Editor</span></li>
            </ul>
        </div>
    </section>

    <div class="container">
        <form method="POST" action="/admin/review_update">
            @csrf
            {{-- @method('PUT') --}}
            <div class="form-content" style="width:50%">
                @if(isset($review))
                    <div class="form-group">
                        <input type="hidden" name="review_id" id="review_id" value="{{ $review->id }}" required>
                        <label class="credentials-label" for="overall_rating">Overall:</label>
                        <select class="credentials-input" name="overall_rating" id="overall_rating" required>
                            @foreach($ratings as $key => $value)
                                @if($key == $review->overall_rating)
                                    <option value='{{ $key }}' selected>{{ $value }}</option>
                                @else
                                    <option value='{{ $key }}'>{{ $value }}</option>
                                @endif
                            @endforeach
                        </select>
                        {{-- <input type="text" name="rating" id="rating" value="{{ $locationreview->rating }}" required> --}}
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="facilities_rating">Facilities:</label>
                        <select class="credentials-input" name="facilities_rating" id="facilities_rating" required>
                            @foreach($ratings as $key => $value)
                                @if($key == $review->facilities_rating)
                                    <option value='{{ $key }}' selected>{{ $value }}</option>
                                @else
                                    <option value='{{ $key }}'>{{ $value }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="curriculum_rating">Curriculum:</label>
                        <select class="credentials-input" name="curriculum_rating" id="curriculum_rating" required>
                            @foreach($ratings as $key => $value)
                                @if($key == $review->curriculum_rating)
                                    <option value='{{ $key }}' selected>{{ $value }}</option>
                                @else
                                    <option value='{{ $key }}'>{{ $value }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="teachers_rating">Teachers:</label>
                        <select class="credentials-input" name="teachers_rating" id="teachers_rating" required>
                            @foreach($ratings as $key => $value)
                                @if($key == $review->teachers_rating)
                                    <option value='{{ $key }}' selected>{{ $value }}</option>
                                @else
                                    <option value='{{ $key }}'>{{ $value }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="safety_rating">Safety:</label>
                        <select class="credentials-input" name="safety_rating" id="safety_rating" required>
                            @foreach($ratings as $key => $value)
                                @if($key == $review->safety_rating)
                                    <option value='{{ $key }}' selected>{{ $value }}</option>
                                @else
                                    <option value='{{ $key }}'>{{ $value }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="comment">Comment:</label>
                        <textarea class="credentials-input" name="comment" id="comment" cols="15" rows="5">{{ $review->comment }}</textarea>
                    </div>
                    <button type="submit" class="form-content-submit-btn">Update</button>
                @endif
            </div><br/>
        </form>
    </div>
@endsection