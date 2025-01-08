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
                <li><span>Manage Contacts</a></span>
            </ul>
        </div>
    </section>

    @if(isset($success))
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif

    <div class="container">
        <div>
            <table class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>From Name</th>
                        <th>From Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->from_name }}</td>
                            <td>{{ $contact->from_email }}</td>
                            <td>{{ $contact->subject }}</td>
                            <td>{!!html_entity_decode($contact->message)!!}</td>
                            <td>
                                <a href="/admin/contact_delete?contactID={{$contact->id}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div><br/>
    </div>
@endsection