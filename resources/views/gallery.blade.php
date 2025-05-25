@extends('frontend_layout/master')
@section('page-title')
    Gallery
@endsection
@section('main-content')
<main class="main-content">

        <!-- Gallery -->
        <div class="gallery tc-padding">
            <div class="container">
                <div class="row no-gutters">
                    @forelse($galleries as $gallery)
                    <div class="col-lg-3 col-xs-6 r-full-width">
                        <div class="gallery-figure style-2"> 
                            @if($gallery->media_img == 'No image found')
                                <img src="/uploads/no-img.png" width="283" height="283" alt="No image found">
                            @else
                                <img src="/uploads/{{ $gallery->media_img }}" width="283" height="283" alt="{{ $gallery->fullname }}">
                            @endif
                            <div class="overlay">
                                <ul class="position-center-x"></ul>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="alert alert-danger">No record found.</div>
                    @endforelse
                    
                    <div class="col-xs-12">
                        <div class="pagination-holder">
                            <ul class="pagination">
                                <li><a href="#" aria-label="Previous">Prev</a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">6</a></li>
                                <li><a href="#">7</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">23</a></li>
                                <li><a href="#" aria-label="Next">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Gallery -->

    </main>
@endsection