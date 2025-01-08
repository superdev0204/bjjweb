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
                <li><a href="#">Admin</a></li>
            </ul>
            <a href="{{ url('/admin/gym/search') }}">Find BJJ GYMs</a> | 
            <a href="{{ url('/admin/manage_contact') }}">Manage Contact</a> | 
            <a href="{{ url('/admin/visitor_counts') }}">Visitor Counts</a>
        </div>
    </section>

    <div class="container">
        @if(isset($success))
            <div class="alert alert-success">
                {{ $success }}
            </div>
        @endif
        <h2>New Gym Listings</h2>
        <table width="100%">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th align="center" colspan="4">Action</th>
            </tr>
            <?php $i = 0;
            foreach ($gyms as $gym): ?>
                <tr class="d<?php echo $i % 2; $i++; ?>">
                    <td width="35%">
                        <a target="_blank" href="/dojo-detail/{{ $gym->id }}">{{ $gym->name }}</a><br />
                        {{ $gym->phone }}
                    </td>
                    <td width="30%">
                        {{ $gym->address }} <br />
                        {{ $gym->city }}, {{ $gym->state }} {{ $gym->zip }}
                    </td>
                    <td>
                        <form method="post" action="/admin/gym/approve" style="display: inline-block">
                            @csrf
                            <input type="hidden" name="id" value="{{ $gym->id }}" />
                            <button type="submit" class="form-content-submit-btn">Approve</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="/admin/gym/disapprove" style="display: inline-block">
                            @csrf
                            <input type="hidden" name="id" value="{{ $gym->id }}" />
                            <button type="submit" class="form-content-submit-btn">Not Approve</button>
                        </form>
                    </td>
                    <td>
                        <form method="get" action="/admin/gym/edit" style="display: inline-block">
                            <input type="hidden" name="id" value="{{ $gym->id }}" />
                            <button type="submit" class="form-content-submit-btn">Update</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="/admin/gym/delete" style="display: inline-block">
                            @csrf
                            <input type="hidden" name="id" value="{{ $gym->id }}" />
                            <button type="submit" class="form-content-submit-btn">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <br />

        <h2>New updates</h2>
        <table width="100%">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
            </tr>
            <?php $i = 0;
            foreach ($gymLogs as $gymLog): ?>
                <tr class="d<?php echo $i % 2; $i++; ?>">
                    <td width="40%">
                        <a href="/admin/gym-log/show/id/{{ $gymLog->id }}">{{ $gymLog->name }}</a>
                    </td>
                    <td>
                        {{ $gymLog->address }}
                    </td>
                    <td>
                        {{ $gymLog->phone }}
                    </td>
                </tr>
            @endforeach
        </table>
        <br />

        <h2>New Images</h2>
        <table width="100%">
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th align="center" colspan="3">Action</th>
            </tr>
            <?php $i = 0;
            foreach ($images as $image): ?>
                <tr class="d<?php echo $i % 2; $i++; ?>">
                    <td width="35%">
                        <a target="_blank" href="/gym-detail/{{ $image->gym_id }}">{{ $image->imagename }}</a><br />
                        {{ $image->altname }}<br />
                    </td>
                    <td>
                        <img src="{{ asset('images/gyms/'.substr($image->gym_id, -1).'/'.$image->gym_id.'/'.$image->imagename) }}" 
                        border="0" width="200" height="150" alt="{{ $image->altname }}" 
                        onClick="window.open('{{ asset('images/gyms/'.substr($image->gym_id, -1).'/'.$image->gym_id.'/'.$image->imagename) }}','mywindow','width=640,height=480,scrollbars=no,location=no')" style="cursor:pointer;" />
                    </td>
                    <td>
                        <form method="post" action="/admin/image/approve" style="display: inline-block">
                            @csrf
                            <input type="hidden" name="id" value="{{ $image->id }}" />
                            <button type="submit" class="form-content-submit-btn">Approve</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="/admin/image/disapprove" style="display: inline-block">
                            @csrf
                            <input type="hidden" name="id" value="{{ $image->id }}" />
                            <button type="submit" class="form-content-submit-btn">Not Approve</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="/admin/image/delete" style="display: inline-block">
                            @csrf
                            <input type="hidden" name="id" value="{{ $image->id }}" />
                            <button type="submit" class="form-content-submit-btn">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <h2>New Reviews</h2>
        <div class="form-wrapper">
            <form id="review_form" action="" method="POST">
                @csrf
                <table id="salonsuites-table" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Approve</th>
                            <th>Name</th>
                            <th>By</th>
                            <th>Rating</th>
                            <th>Comments</th>
                            <th>Update</th>
                            <th>Not Approve</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($new_reviews as $review)
                            <tr>
                                <td><button type="button" class="form-content-submit-btn" onclick="javascript:approve_review_ok({{$review->id}})">Approve</button></td>
                                <td><a href="{{ $review->provider_link }}">{{ $review->provider_name }}</a></td>
                                <td>{{ $review->review_by }}</td>
                                <td>{{ $review->rating }}</td>
                                <td>{{ $review->comment }}</td>
                                <td><button type="button" class="form-content-submit-btn" onclick="window.open('/admin/review_editor?id={{$review->id}}', '_self')">Update</button></td>
                                <td><button type="button" class="form-content-submit-btn" onclick="javascript:approve_review_no({{$review->id}})">Not Approve</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </form>
            </table>
        </div><br/>
        <h2>New Questions</h2>
        <a href='/admin/question_editor' style="float:right; margin-right:30px">New Question</a>
        <div class="form-wrapper">
            <form id="question_form" action="" method="POST">
                @csrf
                <table class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Approve</th>
                            <th>Name</th>
                            <th>By</th>
                            <th>Questions</th>
                            <th>Update</th>
                            <th>Not Approve</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($new_questions as $question)
                            <tr>
                                <td><button type="button" class="form-content-submit-btn" onclick="javascript:approve_question_ok({{$question->id}})">Approve</button></td>
                                <td><a href="{{ $question->link }}">{{ $question->name }}</a></td>
                                <td>{{ $question->question_by }}</td>
                                <td>{{ $question->question }}</td>
                                <td><button type="button" class="form-content-submit-btn" onclick="window.open('/admin/question_editor?id={{$question->id}}', '_self')">Update</button></td>
                                <td><button type="button" class="form-content-submit-btn" onclick="javascript:approve_question_no({{$question->id}})">Not Approve</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div><br/>
        <h2>New Answers</h2>
        <div class="form-wrapper">
            <form id="answer_form" action="" method="POST">
                @csrf
                <table class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Approve</th>
                            <th>Name</th>
                            <th>By</th>
                            <th>Answers</th>
                            <th>Update</th>
                            <th>Not Approve</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($new_answers as $answer)
                            <tr>
                                <td><button type="button" class="form-content-submit-btn" onclick="javascript:approve_answer_ok({{$answer->id}})">Approve</button></td>
                                <td><a href="{{ $answer->link }}">{{ $answer->name }}</a></td>
                                <td>{{ $answer->type }}</td>
                                <td>{{ $answer->answer_by }}</td>
                                <td>{{ $answer->answer }}</td>
                                <td><button type="button" class="form-content-submit-btn" onclick="window.open('/admin/answer_editor?id={{$answer->id}}', '_self')">Update</button></td>
                                <td><button type="button" class="form-content-submit-btn" onclick="javascript:approve_answer_no({{$answer->id}})">Not Approve</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div><br/>
    </div>

    <script>
        function approve_review_ok(id){
            var form = document.getElementById('review_form');
            form.action = '/admin/approve_review_ok?id='+id;
            form.submit();
        }

        function approve_review_no(id){
            var form = document.getElementById('review_form');
            form.action = '/admin/approve_review_no?id='+id;
            form.submit();
        }

        function approve_question_ok(id){
            var form = document.getElementById('question_form');
            form.action = '/admin/approve_question_ok?id='+id;
            form.submit();
        }

        function approve_question_no(id){
            var form = document.getElementById('question_form');
            form.action = '/admin/approve_question_no?id='+id;
            form.submit();
        }

        function approve_answer_ok(id){
            var form = document.getElementById('answer_form');
            form.action = '/admin/approve_answer_ok?id='+id;
            form.submit();
        }

        function approve_answer_no(id){
            var form = document.getElementById('answer_form');
            form.action = '/admin/approve_answer_no?id='+id;
            form.submit();
        }
    </script>
@endsection
