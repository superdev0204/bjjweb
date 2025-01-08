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
                <li><span>Gym Update Compare</span></li>
            </ul>
        </div>
    </section>

    <div class="container" id="left-col">
        <h2><a target="_blank" href="/dojo-detail/{{ $gym->id }}">{{ $gym->name }}</a></h2>
        <table width="100%">
            <thead>
                <tr>
                    <th width="20%">Field Name</th>
                    <th width="40%">Old</th>
                    <th width="40%" style="width:40%!important">New</th>
                </tr>
            </thead>
            <tbody>
                @if ( $gym->name != $gymlog->name )
                    <tr>
                        <td>Name</td>
                        <td>{{ $gym->name }}</td>
                        <td>{{ $gymlog->name }}</td>
                    </tr>
                @endif
                @if ( $gym->website != $gymlog->website )
                    <tr>
                        <td>Website</td>
                        <td>{{ $gym->website }}</td>
                        <td>{{ $gymlog->website }}</td>
                    </tr>
                @endif
                @if ( $gym->phone != $gymlog->phone )
                    <tr>
                        <td>Phone</td>
                        <td>{{ $gym->phone }}</td>
                        <td>{{ $gymlog->phone }}</td>
                    </tr>
                @endif
                @if ( $gym->address != $gymlog->address )
                    <tr>
                        <td>Address</td>
                        <td>{{ $gym->address }}</td>
                        <td>{{ $gymlog->address }}</td>
                    </tr>
                @endif
                @if ( $gym->city != $gymlog->city )
                    <tr>
                        <td>City</td>
                        <td>{{ $gym->city }}</td>
                        <td>{{ $gymlog->city }}</td>
                    </tr>
                @endif
                @if ( $gym->state != $gymlog->state )
                    <tr>
                        <td>State</td>
                        <td>{{ $gym->state }}</td>
                        <td>{{ $gymlog->state }}</td>
                    </tr>
                @endif
                @if ( $gym->zip != $gymlog->zip )
                    <tr>
                        <td>Zip</td>
                        <td>{{ $gym->zip }}</td>
                        <td>{{ $gymlog->zip }}</td>
                    </tr>
                @endif
                @if ( $gym->stars != $gymlog->stars )
                    <tr>
                        <td>Stars</td>
                        <td>{{ $gym->stars }}</td>
                        <td>{{ $gymlog->stars }}</td>
                    </tr>
                @endif
                @if ( $gym->details != $gymlog->details )
                    <tr>
                        <td>Details</td>
                        <td>{{ $gym->details }}</td>
                        <td>{{ $gymlog->details }}</td>
                    </tr>
                @endif
                @if ( $gym->logo_url != $gymlog->logo_url )
                    <tr>
                        <td>Logo Url</td>
                        <td>{{ $gym->logo_url }}</td>
                        <td>{{ $gymlog->logo_url }}</td>
                    </tr>
                @endif
                @if ( $gym->kids_program_url != $gymlog->kids_program_url )
                    <tr>
                        <td>Kids Program Url</td>
                        <td>{{ $gym->kids_program_url }}</td>
                        <td>{{ $gymlog->kids_program_url }}</td>
                    </tr>
                @endif
                @if ( $gym->kids_program_detail != $gymlog->kids_program_detail )
                    <tr>
                        <td>Kids Program Detail</td>
                        <td>{{ $gym->kids_program_detail }}</td>
                        <td>{{ $gymlog->kids_program_detail }}</td>
                    </tr>
                @endif
                @if ( $gym->woman_only_program_url != $gymlog->woman_only_program_url )
                    <tr>
                        <td>Woman Only Program Url</td>
                        <td>{{ $gym->woman_only_program_url }}</td>
                        <td>{{ $gymlog->woman_only_program_url }}</td>
                    </tr>
                @endif
                @if ( $gym->woman_only_program_detail != $gymlog->woman_only_program_detail )
                    <tr>
                        <td>Woman Only Program Detail</td>
                        <td>{{ $gym->woman_only_program_detail }}</td>
                        <td>{{ $gymlog->woman_only_program_detail }}</td>
                    </tr>
                @endif
                @if ( $gym->pricing != $gymlog->pricing )
                    <tr>
                        <td>Pricing</td>
                        <td>{{ $gym->pricing }}</td>
                        <td>{{ $gymlog->pricing }}</td>
                    </tr>
                @endif
                @if ( $gym->schedule_url != $gymlog->schedule_url )
                    <tr>
                        <td>Schedule Url</td>
                        <td>{{ $gym->schedule_url }}</td>
                        <td>{{ $gymlog->schedule_url }}</td>
                    </tr>
                @endif
                @if ( $gym->business_hour != $gymlog->business_hour )
                    <tr>
                        <td>Business Hour</td>
                        <td>{{ $gym->business_hour }}</td>
                        <td>{{ $gymlog->business_hour }}</td>
                    </tr>
                @endif
                @if ( $gym->head_professor != $gymlog->head_professor )
                    <tr>
                        <td>Head Professor</td>
                        <td>{{ $gym->head_professor }}</td>
                        <td>{{ $gymlog->head_professor }}</td>
                    </tr>
                @endif
                @if ( $gym->special_offer != $gymlog->special_offer )
                    <tr>
                        <td>Special Offer</td>
                        <td>{{ $gym->special_offer }}</td>
                        <td>{{ $gymlog->special_offer }}</td>
                    </tr>
                @endif
                @if ( $gym->email != $gymlog->email )
                    <tr>
                        <td>Email</td>
                        <td>{{ $gym->email }}</td>
                        <td>{{ $gymlog->email }}</td>
                    </tr>
                @endif
                @if ( $gym->facebook_url != $gymlog->facebook_url )
                    <tr>
                        <td>Facebook Url</td>
                        <td>{{ $gym->facebook_url }}</td>
                        <td>{{ $gymlog->facebook_url }}</td>
                    </tr>
                @endif
                @if ( $gym->youtube_channel != $gymlog->youtube_channel )
                    <tr>
                        <td>Youtube Channel</td>
                        <td>{{ $gym->youtube_channel }}</td>
                        <td>{{ $gymlog->youtube_channel }}</td>
                    </tr>
                @endif
                @if ( $gym->video_url != $gymlog->video_url )
                    <tr>
                        <td>Video Url</td>
                        <td>{{ $gym->video_url }}</td>
                        <td>{{ $gymlog->video_url }}</td>
                    </tr>
                @endif
                @if ( $gym->awards != $gymlog->awards )
                    <tr>
                        <td>Awards</td>
                        <td>{{ $gym->awards }}</td>
                        <td>{{ $gymlog->awards }}</td>
                    </tr>
                @endif
                @if ( $gym->awards != $gymlog->awards )
                    <tr>
                        <td>Awards</td>
                        <td>{{ $gym->awards }}</td>
                        <td>{{ $gymlog->awards }}</td>
                    </tr>
                @endif
                @if ( $gym->multiple_locations != $gymlog->multiple_locations )
                    <tr>
                        <td>Multiple Locations</td>
                        <td>{{ $gym->multiple_locations }}</td>
                        <td>{{ $gymlog->multiple_locations }}</td>
                    </tr>
                @endif
                
                <tr>
                    <td colspan="3" style="text-align: right; padding:30px">
                        <form method="post" action="/admin/gym-log/delete" style="display: inline-block">
                            @csrf
                            <input type="hidden" name="id" value="<?php echo $gymlog->id; ?> " />
                            <button type="submit" class="form-content-submit-btn">Delete</button>
                        </form>
                        <form method="post" action="/admin/gym-log/disapprove" style="display: inline-block">
                            @csrf
                            <input type="hidden" name="id" value="<?php echo $gymlog->id; ?> " />
                            <button type="submit" class="form-content-submit-btn">Not Approve</button>
                        </form>
                        <form method="post" action="/admin/gym-log/approve" style="display: inline-block">
                            @csrf
                            <input type="hidden" name="id" value="<?php echo $gymlog->id; ?> " />
                            <button type="submit" class="form-content-submit-btn">Approve</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
