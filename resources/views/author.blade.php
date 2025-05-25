@extends('frontend_layout/master')
@section('page-title')
    Author
@endsection
@section('main-content')
<main class="main-content">

        <!-- Author Listing -->
        <div class="author-listing tc-padding">
            <div class="container">
                <div class="row">

                    <!-- Content -->
                    <div class="col-lg-9 col-md-8 col-xs-12">
                                                    
                        <!-- Author Filter -->
                        <div class="authors-filter">
                            <ul>
                                @foreach(range('A', 'Z') as $letter)
                                <li><a href="/author?letter={{ strtolower($letter)  }}">{{ $letter }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Author Filter -->

                        <!-- Author List -->
                        <ul class="author-list">
                            @forelse($authors as $author)
                            <li>
                                <div class="author-list-widget">
                                    <div class="arthor-list-img">
                                        @if($author->author_img == 'No image found')
                                            <img src="/uploads/no-img.png" width="178" height="178" alt="No image found">
                                        @else
                                            <img src="/uploads/{{ $author->author_img }}" width="178" height="178" alt="{{ $author->title }}">
                                        @endif
                                        <div class="overlay"></div>
                                    </div>
                                    <div class="author-list-detail">
                                        <h4>{{ $author->title }}</h4>
                                        <span>Born: {{ $author->dob }} {{ strtoupper($author->country)  }}</span>
                                        <p>{{ Str::limit($author->description, 120, '...') }}</p>
                                        <a href="#" class="btn-1 sm">Read more<i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </li>
                            @empty
                                <div class="alert alert-danger">No record found.</div>
                            @endforelse    
                        </ul>
                        <!-- Author List -->

                        <!-- Pagination -->
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
                        <!-- Pagination -->

                    </div>
                    <!-- Content -->

                    <!-- Aside -->
                    <aside class="col-lg-3 col-md-4 col-xs-12">
                        <!-- Aside Widget -->
                        <div class="aside-widget">
                            <h6>Feature Authors</h6>
                            <ul class="s-arthor-list">
                                @forelse($author_features as $author_feature)
                                <li>
                                    <div class="s-arthor-wighet">
                                        <div class="s-arthor-img">
                                            @if($author_feature->author_img == 'No image found')
                                                <img src="/uploads/no-img.png" width="45" height="45" alt="No image found">
                                            @else
                                                <img src="/uploads/{{ $author_feature->author_img }}" width="45" height="45" alt="{{ $author_feature->title }}">
                                            @endif
                                            <div class="overlay">
                                                <a class="position-center-center" href="#"></a>
                                            </div>
                                        </div>
                                        <div class="s-arthor-detail">
                                            <h6>{{ $author_feature->title }} <a href="#"></a></h6>
                                            <a href="#">&nbsp;</a>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                    <div class="alert alert-danger">No record found!</div>
                                @endforelse
                            </ul>
                        </div>
                        <!-- Aside Widget -->

                        <!-- Aside Widget -->
                        <div class="aside-widget">
                            <h6>Most Downloaded Books</h6>
                            <ul class="books-year-list">
                                @forelse($downloaded_books as $downloaded_book)
                                <li>
                                    <div class="books-post-widget">
                                        @if($downloaded_book->book_img == 'No image found')
                                            <img src="/uploads/no-img.png" width="54" height="73" alt="No image found">
                                        @else
                                            <img src="/uploads/{{ $downloaded_book->book_img }}" width="54" height="73" alt="{{ $downloaded_book->title }}">
                                        @endif
                                        <h6><a href="#">{{ $downloaded_book->title }}</a></h6>
                                        <span>By {{ $downloaded_book->author_id }}</span>
                                    </div>
                                </li>
                                @empty
                                    <div class="alert alert-danger">No record found!</div>
                                @endforelse
                            </ul>
                        </div>
                        <!-- Aside Widget -->

                    </aside>
                    <!-- Aside -->

                </div>
            </div>
        </div>
        <!-- Author Listing -->

    </main>
@endsection