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
                <li><span>Search For Brazillian Jiu Jitsu School</span></li>
            </ul>
        </div>
    </section>

    <div id="content" class="container">
        <div id="primary" class="form-content" style="width:100%">
            <h1>Search For Brazillian Jiu Jitsu School</h1>
            <?php if (isset($message)) :?>
            <p><?php echo $message; ?></p>
            <?php endif;?>

            <form method="post">
                @csrf
                <div class="form-group">
                    <label class="credentials-label" for="name">Name:</label>
                    @if( isset($request->name) )
                        <input class="credentials-input" type="text" id="name" name="name" value="{{$request->name}}">
                    @else
                        <input class="credentials-input" id="name" name="name" type="text" value="{{old('name')}}">
                    @endif
                </div>
                <div class="form-group">
                    <label class="credentials-label" for="phone">Phone:</label>
                    @if( isset($request->phone) )
                        <input class="credentials-input" type="text" id="phone" name="phone" value="{{$request->phone}}">
                    @else
                        <input class="credentials-input" id="phone" name="phone" type="text" value="{{old('phone')}}">
                    @endif
                </div>
                <div class="form-group">
                    <label class="credentials-label" for="address">Address:</label>
                    @if( isset($request->name) )
                        <input class="credentials-input" type="text" id="address" name="address" value="{{$request->address}}">
                    @else
                        <input class="credentials-input" id="address" name="address" type="text" value="{{old('address')}}">
                    @endif
                </div>
                <div class="form-group">
                    <label class="credentials-label" for="zip">Zip Code:</label>
                    @if( isset($request->zip) )
                        <input class="credentials-input" type="text" id="zip" name="zip" value="{{$request->zip}}">
                    @else
                        <input class="credentials-input" id="zip" name="zip" type="text" value="{{old('zip')}}">
                    @endif
                </div>
                <div class="form-group">
                    <label class="credentials-label" for="city">City:</label>
                    @if( isset($request->city) )
                        <input class="credentials-input" type="text" id="city" name="city" value="{{$request->city}}">
                    @else
                        <input class="credentials-input" id="city" name="city" type="text" value="{{old('city')}}">
                    @endif
                </div>
                
                <div class="form-group">
                    <label class="credentials-label" for="state">State:</label>
                    <select class="credentials-input" name="state" id="state">
                        <option value="">-Select-</option>
                        @foreach ($states as $state)
                            @if( isset($request->state) )
                                @if($state->state_code == $request->state)
                                    <option value='{{ $state->state_code }}' selected>{{ $state->state_name }}</option>
                                @else
                                    <option value='{{ $state->state_code }}'>{{ $state->state_name }}</option>
                                @endif
                            @else
                                @if($state->state_code == old('state'))
                                    <option value='{{ $state->state_code }}' selected>{{ $state->state_name }}</option>
                                @else
                                    <option value='{{ $state->state_code }}'>{{ $state->state_name }}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="credentials-label" for="email">Email:</label>
                    @if( isset($request->email) )
                        <input class="credentials-input" type="email" id="email" name="email" value="{{$request->email}}">
                    @else
                        <input class="credentials-input" id="email" name="email" type="email" value="{{old('email')}}">
                    @endif
                </div>
                <div class="form-group">
                    <label class="credentials-label" for="id">BJJ GTM ID:</label>
                    @if( isset($request->zip) )
                        <input class="credentials-input" type="text" id="id" name="id" value="{{$request->id}}">
                    @else
                        <input class="credentials-input" id="id" name="id" type="text" value="{{old('id')}}">
                    @endif
                </div>
                <button type="submit" class="form-content-submit-btn">Search</button>
            </form><br/>
            <?php if (isset($gyms)):?>
            <table width="100%">
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php $i = 0; 
                /** @var \Application\Domain\Entity\Facility $gym */
                foreach ($gyms as $gym): ?>
                <tr class="d<?php echo $i % 2;
                $i++; ?>">
                    <td width="40%">
                        <a target="_blank" href="/detail/<?php echo $gym->filename; ?>.html"><?php echo $gym->name; ?></a><br />
                        <?php echo $gym->phone; ?>
                    </td>
                    <td width="35%">
                        <?php echo $gym->address; ?> <br />
                        <?php echo $gym->city . ', ' . $gym->state . ' ' . $gym->zip; ?>
                    </td>
                    <td>
                        <form method="get" action="/admin/gym/edit">
                            <input type="hidden" name="id" value="<?php echo $gym->id; ?>" />
                            <button type="submit" name="update" class="form-content-submit-btn">Update</button>
                        </form>
                    </td>
                    <td>
                        <?php if ($gym->approved >= 0) : ?>
                        <form method="post" action="/admin/gym/delete">
                            @csrf
                            <input type="hidden" name="id" value="<?php echo $gym->id; ?>" />
                            <button type="submit" name="delete" class="form-content-submit-btn">Delete</button>
                        </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach;?>
            </table><br />
            <?php endif; ?>
        </div><br/>
    </div>
@endsection
