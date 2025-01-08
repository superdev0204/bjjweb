@extends('layouts.app')

@section('content')
    <div>
        <a href="/admin">Admin Home</a> &gt;&gt; Reviews
        <h2>New Reviews</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>By</th>
                <th colspan="3">Action</th>
            </tr>
            <?php $i = 0;
            foreach ($comments as $comment): ?>
                <tr class="d<?php echo $i % 2; $i++; ?>">
                    <td>
                        <a target="_blank" href="/gym-detail/{{ $comment->gym_id }}">{{ $comment->name }}</a><br />
                        {{ $comment->email }} <br />
                        {{ $comment->created->format('Y-m-d H:i:s') }}<br />
                        {{ $comment->ip_address }}
                    </td>
                    <td width="500">
                        {{ $comment->comment }}
                    </td>
                    <td>

                        <form method="post" action="/admin/comment/approve">
                            @csrf
                            <input type="hidden" name="id" value="{{ $comment->id }}" />
                            <input type="submit" value="Approve" />
                        </form>
                    </td>
                    <td>
                        <form method="post" action="/admin/comment/disapprove">
                            @csrf
                            <input type="hidden" name="id" value="{{ $comment->id }}" />
                            <input type="submit" value="Not Approve" />
                        </form>
                    </td>
                    <td>
                        <form method="post" action="/admin/comment/delete">
                            @csrf
                            <input type="hidden" name="id" value="{{ $comment->id }}" />
                            <input type="submit" value="Delete" />
                        </form>
                    </td>

                </tr>
            <?php endforeach;?>
        </table>
    </div>
@endsection
