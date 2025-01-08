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
                <li><span>Answer Editor</span></li>
            </ul>
        </div>
    </section>
    <div class="container">
        <form method="POST" action="/admin/answer_update">
            @csrf
            {{-- @method('PUT') --}}
            <div class="form-content" style="width:50%">
                @if(isset($answer))
                    <div class="form-group">
                        <label class="credentials-label" for="userName">Name:</label>
                        <input class="credentials-input" type="text" id="userName" name="userName" value="{{ $answer->answer_by }}" required>
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="userEmail">Email:</label>
                        <input class="credentials-input" type="email" id="userEmail" name="userEmail" value="{{ $answer->answer_email }}" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="answer_id" id="answer_id" value="{{ $answer->id }}" required>
                        <label class="credentials-label" for="answer">Answer:</label>
                        <textarea class="credentials-input" name="answer" id="answer" cols="15" rows="5">{{ $answer->answer }}</textarea>
                    </div>
                    <button type="submit" class="form-content-submit-btn">Update</button>
                @endif
            </div><br/>
        </form>
    </div>
@endsection