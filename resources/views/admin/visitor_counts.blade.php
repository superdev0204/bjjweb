@push('link')
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
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
                <li><span>Visitor Counts</a></span>
            </ul>
        </div>
    </section>

    @if(isset($success))
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif

    @auth
        <div class="container">
            @if(isset($user->type) && $user->type == 'ADMIN')
                <table id="salonsuites-table" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Page Url</th>
                            <th>Date</th>
                            <th>Visitor Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($visitor_counts as $visitor_count): ?>
                            <tr class="d<?php echo $i % 2;
                            $i++; ?>">
                                <td>{{ $visitor_count->id }}</td>
                                <td>{{ $visitor_count->page_url }}</td>
                                <td>{{ $visitor_count->date }}</td>
                                <td>{{ $visitor_count->visitor_count }}</td>
                                <td>
                                    <a href="/admin/visitor_delete?vID={{$visitor_count->id}}">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table><br/>
                @if ($visitor_counts instanceof Illuminate\Pagination\LengthAwarePaginator)
                    <div class="pagination">
                        {{ $visitor_counts->links("pagination::bootstrap-4") }}
                    </div>
                @endif
            @endif
        </div><br/>        
    @endauth
@endsection