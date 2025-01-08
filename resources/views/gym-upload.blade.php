@push('meta')
    <meta name="robots" content="noindex,follow">
@endpush

@push('title')
    <title>Upload Images - {{ $gym->name }}</title>
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
                <li><a href="{{ url('/dojo-detail/' . $gym->id) }}">Dojo Detail</a></li>
                <span class="breadcrumb-divide">
                    <p>>></p>
                </span>
                <li><span>Upload Gym Photos</span></li>
            </ul>
        </div>
    </section>

    <div id="content" class="container">
        <div id="primary" class="form-content" style="width:50%">
            <h1>Please use the tool below to upload pictures.</h1>
            <strong>Name:</strong> <?php echo $gym->name; ?> <br />
            <strong>Address:</strong> <?php echo $gym->address . ', ' . $gym->city . ' ' . $gym->state; ?>
            <?php if (isset($message)) :?>
            <p><?php echo $message; ?></p>
            <?php endif;?>

            <form method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="credentials-label" for="image1" style="margin-bottom:10px">Upload Image #1:</label>
                    <input type="file" id="image1" name="image1" style="height:34px">
                </div>
                <div class="form-group">
                    <label class="credentials-label" for="image1Alt">Image #1 Alternate Name:</label>
                    @if (isset($request->image1Alt))
                        <input class="credentials-input" type="text" id="image1Alt" name="image1Alt" value="{{$request->image1Alt}}">
                    @else
                        <input class="credentials-input" id="image1Alt" name="image1Alt" type="text" value="{{old('image1Alt')}}">
                    @endif
                    @error('image1Alt')
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    @enderror
                </div>
                <div>
                    <label class="credentials-label" for="image2" style="margin-bottom:10px">Upload Image #2:</label>
                    <input type="file" id="image2" name="image2" style="height:34px">
                </div>
                <div class="form-group">
                    <label class="credentials-label" for="image2Alt">Image #2 Alternate Name:</label>
                    @if (isset($request->image2Alt))
                        <input class="credentials-input" type="text" id="image2Alt" name="image2Alt" value="{{$request->image2Alt}}">
                    @else
                        <input class="credentials-input" id="image2Alt" name="image2Alt" type="text" value="{{old('image2Alt')}}">
                    @endif
                    @error('image2Alt')
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    @enderror
                </div>
                <div>
                    <label class="credentials-label" for="image3" style="margin-bottom:10px">Upload Image #3:</label>
                    <input type="file" id="image3" name="image3" style="height:34px">
                </div>
                <div class="form-group">
                    <label class="credentials-label" for="image3Alt">Image #3 Alternate Name:</label>
                    @if (isset($request->image3Alt))
                        <input class="credentials-input" type="text" id="image3Alt" name="image3Alt" value="{{$request->image3Alt}}">
                    @else
                        <input class="credentials-input" id="image3Alt" name="image3Alt" type="text" value="{{old('image3Alt')}}">
                    @endif
                    @error('image3Alt')
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    @enderror
                </div>
                <div>
                    <label class="credentials-label" for="image4" style="margin-bottom:10px">Upload Image #4:</label>
                    <input type="file" id="image4" name="image4" style="height:34px">
                </div>
                <div class="form-group">
                    <label class="credentials-label" for="image4Alt">Image #4 Alternate Name:</label>
                    @if (isset($request->image4Alt))
                        <input class="credentials-input" type="text" id="image4Alt" name="image4Alt" value="{{$request->image4Alt}}">
                    @else
                        <input class="credentials-input" id="image4Alt" name="image4Alt" type="text" value="{{old('image4Alt')}}">
                    @endif
                    @error('image4Alt')
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    @enderror
                </div><br/>
                <button type="submit" class="form-content-submit-btn">Upload Images</button>
            </form>

            {{-- <?php if (isset($images) && count($images)) : ?>
                <h2>Below are the images you have uploaded:</h2>
                <?php
                /** @var \Application\Domain\Entity\Image $image */
                foreach ($images as $image): ?>
                    <img src="/static/images/gym/<?php echo substr($gym->getId(), -1) . '/';
                    echo $gym->getId(); ?>/<?php echo $image->getImagename(); ?>" border="0" width="200" height="150" alt="<?php echo $image->getAltname(); ?>"
                        onClick="window.open('/static/images/gym/<?php echo substr($gym->getId(), -1) . '/';
                        echo $gym->getId(); ?>/<?php echo $image->getImagename(); ?>','mywindow','width=640,height=480,scrollbars=no,location=no')" style="cursor:pointer;"/>
                    <a href="/gym/imagedelete?id=<?php echo $image->getId(); ?>">Remove this Image</a><br/>
                <?php endforeach; ?>
            <?php endif;?> --}}
        </div><br />
    </div>
@endsection
