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
                <li><span>Question Editor</span></li>
            </ul>
        </div>
    </section>
    <div class="container">
        <form method="POST" action="/admin/question_update">
            @csrf
            {{-- @method('PUT') --}}
            <div class="form-content" style="width:50%">
                @if(isset($question))
                    <div class="form-group">
                        <label class="credentials-label" for="userName">Name:</label>
                        <input class="credentials-input" type="text" id="userName" name="userName" value="{{ $question->question_by }}" required>
                    </div>
                    <div class="form-group">
                        <label class="credentials-label" for="userEmail">Email:</label>
                        <input class="credentials-input" type="email" id="userEmail" name="userEmail" value="{{ $question->question_email }}" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="question_id" id="question_id" value="{{ $question->id }}" required>
                        <label class="credentials-label" for="question">Question:</label>
                        <textarea class="credentials-input" name="question" id="question" cols="15" rows="5">{{ $question->question }}</textarea>
                    </div>
                    <button type="submit" class="form-content-submit-btn">Update</button>
                @else
                    <div class="form-group">
                        <label class="credentials-label" for="question">Question:</label>
                        <textarea class="credentials-input" name="question" id="question" cols="15" rows="5"></textarea>
                    </div>
                    <button type="submit" class="form-content-submit-btn">Submit Question</button>
                @endif
            </div><br/>
        </form>
    </div>
@endsection