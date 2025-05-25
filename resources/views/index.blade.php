@extends('frontend_layout/master')
@section('page-title')
    Home Page
@endsection
@section('main-content')
<main class="main-content">
        <div id="main-slider" class="main-slider">
        @forelse($sliders as $slider)
        <!-- Item -->
        <div class="item">
            @if($slider->media_img == 'No image found')
            <img src="uploads/no-img.png" width="1349" height="516" alt="No image found">
        @else
            <img src="/uploads/{{ $slider->media_img }}" width="1349" height="516" alt="{{ $slider->title }}">
        @endif
        </div>
        <!-- Item -->
        @empty
            <div class="alert alert-danger">No record found!</div>
        @endforelse
    </div>
    
        <section class="upcoming-release">
        <!-- Heading -->
        <div class="container-fluid p-0">
            <div class="release-heading pull-right h-white">
                <h5>New and Upcoming Release</h5>
            </div>
        </div>
        <!-- Heading -->

        <!-- Upcoming Release Slider -->
        <div class="upcoming-slider">
            <div class="container">
                <!-- Release Book Detail -->
                <div class="release-book-detail h-white p-white">
                        <div class="release-book-slider">
                          @forelse($upcoming_books as $upcoming_book)  
                            <div class="item">
                                <div class="detail">
                                    <h5><a href="{{ Route('book.detail', $upcoming_book->slug) }}">{{ Str::limit($upcoming_book->title, 50, '...') }}</a></h5>
                                    <p>{{ Str::limit($upcoming_book->description, 120, '...') }}</p>
                                    <span>Rs/ {{ number_format($upcoming_book->price) }}</span>
                                    <i class="fa fa-angle-double-right"></i>
                                </div>
                                <div class="detail-img">
                                    @if($upcoming_book->book_img == 'No image found')
                                        <img src="/uploads/no-img.png" width="112" height="156" alt="No image found">
                                    @else
                                        <img src="/uploads/{{ $upcoming_book->book_img }}" width="112" height="156" alt="{{ $upcoming_book->title }}">
                                    @endif
                                </div>
                            </div>
                            @empty
                                <div class="alert alert-danger">No record found!</div>
                            @endforelse
                        </div>
                    </div>
                <!-- Release Book Detail -->

                <!-- Thumbs -->
                <div class="release-thumb-holder">
                    <ul id="release-thumb" class="release-thumb">
                    @foreach($upcoming_books as $key => $upcoming_book)
                      <li>
                          <a data-slide-index="{{ $key }}" href="#">
                              <span>{{ Str::limit($upcoming_book->title, 8, '...') }}</span>
                              @if($upcoming_book->book_img == 'No image found')
                                    <img src="/uploads/no-img.png" width="94" height="122" alt="No image found">
                                @else
                                    <img src="/uploads/{{ $upcoming_book->book_img }}" width="94" height="122" alt="{{ $upcoming_book->title }}">
                                @endif
                              <img class="b-shadow" src="/assets/images/upcoming-release/b-shadow.png" alt="">
                              <span data-toggle="modal" data-target="#quick-view" class="plus-icon">+</span>
                          </a>
                      </li>
                                        @endforeach

                            
                            
                        </ul>
                    </div>
                <!-- Thumbs -->

            </div>
        </div>
        <!-- Upcoming Release Slider -->

        </section>
    
        <!-- Best Seller Products -->
        <section class="best-seller tc-padding">
        <div class="container">
            
            <!-- Main Heading -->
            <div class="main-heading-holder">
                <div class="main-heading style-1">
                    <h2>Best <span class="theme-color">Downloaded</span> Books</h2>
                </div>
            </div>
            <!-- Main Heading -->

            <!-- Best sellers Tabs -->
            <div id="best-sellers-tabs" class="best-sellers-tabs">
                <!-- Tab panes -->
                <div class="tab-content">

                    <!-- Best Seller Slider -->
                    <div id="tab-1">
                        <div class="best-seller-slider">
                            @forelse($downloaded_books as $downloaded_book)
                            <!-- Product Box -->
                            <div class="item">
                                <div class="product-box">
                                    <div class="product-img">
                                        @if($downloaded_book->book_img == 'No image found')
                                            <img src="/uploads/no-img.png" width="132" height="197" alt="No image found">
                                        @else
                                            <img src="/uploads/{{ $downloaded_book->book_img }}" width="132" height="197" alt="{{ $downloaded_book->title }}">
                                        @endif
                                        <ul class="product-cart-option position-center-x">
                                            <li><a href="{{ $downloaded_book->facebook_id }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="{{ $downloaded_book->twitter_id }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="{{ $downloaded_book->linkedin_id }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <span>{{ $downloaded_book->category->title }}</span>
                                        <h5><a href="{{ Route('book.detail', $downloaded_book->slug) }}">{{ $downloaded_book->title }}</a></h5>
                                        <p>{{ Str::limit($downloaded_book->description, 20, '...') }}</p>
                                        <div class="rating-nd-price">
                                            <strong>Rs/ {{ number_format($downloaded_book->price) }}</strong>
                                        </div>
                                        <div class="aurthor-detail">
                                            <span><img src="/assets/images/book-aurthor/img-01.jpg" alt="">{{ $downloaded_book->author->title }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div class="alert alert-danger">No record found!</div>
                            @endforelse
                            <!-- Product Box -->
                        </div>
                    </div>
                    <!-- Best Seller Slider -->
                </div>
                <!-- Tab panes -->

                </div>
            <!-- Best sellers Tabs -->
        </div>
    </section>
        <!-- Best Seller Products -->

        <!-- Recomend products -->
        <div class="recomended-products tc-padding">
            <div class="container">
                <!-- Main Heading -->
                <div class="main-heading-holder">
                    <div class="main-heading">
                        <h2>Staff <span class="theme-color">Recomended </span> Books</h2>
                        <p>Whether you’re a large or small employer, enterpreneur, educational institution, professional</p>
                    </div>
                </div>
                <!-- Main Heading -->

                <!-- Recomend products Slider -->
                <div class="recomend-slider">
                    @forelse($recommended_books as $recommended_book)
                    <!-- Item -->
                    <div class="item">
                        @if($recommended_book->book_img == 'No image found')
                            <img src="/uploads/no-img.png" width="109" height="150" alt="No image found">
                        @else
                            <img src="/uploads/{{ $recommended_book->book_img }}" width="109" height="150"  alt="{{ $recommended_book->title }}">
                        @endif
                    </div>
                    <!-- Item -->
                    @empty
                        <div class="alert alert-danger">No record found!</div>
                    @endforelse

                </div>
                <!-- Recomend products Slider -->
            </div>
        </div>
        <!-- Recomend products -->

        <!-- Book Collections -->
        <section class="book-collection">
            <div class="container">
                <div class="row">

                    <!-- Book Collections Tabs -->
                    <div>
                        <!-- collection Name -->
                        <div class="col-lg-3 col-sm-12">
                            <div class="sidebar">
                                <h4>Top Books Catagories</h4>
                                <ul>
                                    @forelse($categories as $category)
                                        <li><a href="{{ Route('category.detail', $category->slug) }}">{{ $category->title }}</a></li>
                                    @empty
                                        <div class="alert alert-danger">No record found!</div>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <!-- collection Name -->

                        <!-- Collection Content -->
                        <div class="col-lg-9 col-sm-12">
                            <div class="collection">

                                <!-- Secondary heading -->
                                <div class="sec-heading">
                                    <h3>Shop <span class="theme-color">Books</span> Collection</h3>
                                    <a class="view-all" href="#">View All<i class="fa fa-angle-double-right"></i></a>
                                </div>
                                <!-- Secondary heading -->

                                <!-- Collection Content -->
                                <div class="collection-content">
                                    <ul>
                                        @forelse($books as $book)
                                        <li>
                                            <div class="s-product">
                                                <div class="s-product-img">
                                                    @if($book->book_img == 'No image found')
                                                        <img src="/uploads/no-img.png" width="145" height="209" alt="No image found">
                                                    @else
                                                        <img src="/uploads/{{ $book->book_img }}" width="145" height="209" alt="{{ $book->title }}">
                                                    @endif                                  
                                                    <div class="s-product-hover"></div>
                                                </div>
                                                <h6><a href="{{ Route('book.detail', $book->slug) }}">{{ Str::limit($book->title, 15, '...') }}</a></h6>
                                                <span>{{ Str::limit($book->author->title, 15, '...') }}</span>
                                            </div>
                                        </li>
                                        @empty
                                            <div class="alert alert-danger">No record found!</div>
                                        @endforelse
                                    </ul>
                                </div>
                                <!-- Collection Content -->

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
                        </div>
                        <!-- Collection Content -->
                    </div>
                    <!-- Book Collections Tabs -->
                </div>
            </div>
        </section>
        <!-- Book Collections Tabs -->

                </div>
            </div>
        </section>
        <!-- Book Collections --> 

        <!-- Services -->
        <section>&nbsp;</section>
        <!-- Services --> 

        <section class="timeline-area tc-padding">
            <div class="container">
                <div class="row">
                    <!-- Aurthor -->
                    <div class="col-lg-3 col-sm-12">
                        <div class="aurthor-img">
                            @if($author_feature->author_img == 'No image found')
                                <img src="/uploads/no-img.png" width="243" height="344" alt="No image found">
                            @else
                                <img src="/uploads/{{ $author_feature->author_img }}" width="243" height="344" alt="{{ $author_feature->title }}">
                            @endif
                        </div>
                    </div>
                    <!-- Aurthor -->

                    <!-- Aurthor History -->
                    <div class="col-lg-9 col-sm-12 h-white">
                        <h2>Author <span class="theme-color">History</span> of Inovation</h2>
                        <div id="timeline">
                            <ul id="issues">
                                <li id="1985">
                                    <div class="text-box">
                                        <div class="left-box">
                                            <h5><span class="theme-color">{{ $author_feature->title }}</span> {{ $author_feature->designation }}</h5>
                                            <p>{{ $author_feature->description }}</p>
                                            <div class="follow">
                                                <ul class="social-icons">
                                                    <li>Follow us</li>
                                                    <li><a class="facebook" href="{{ $author_feature->facebook_id }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a class="twitter" href="{{ $author_feature->twitter_id }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a class="youtube" href="{{ $author_feature->youtube_id }}" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                                                    <li><a class="pinterest" href="{{ $author_feature->pinterest_id }}" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <ul class="s-related-products">
                                            @foreach($author_feature->author_books as $key => $author_book)
                                            @if($key < 3)
                                            <li>
                                                @if($author_book->book_img == 'No image found')
                                                    <img src="/uploads/no-img.png" width="89" height="119" alt="No image found">
                                                @else
                                                    <img src="/uploads/{{ $author_book->book_img }}" width="89" height="119" alt="{{ $author_book->title }}">
                                                @endif
                                                <h6 class="name">{{ Str::limit($author_book->title, 8, '...') }}</h6>  
                                            </li>
                                            @endif
                                           @endforeach
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Aurthor History -->

                </div>
            </div>
        </section>

        <!-- Timeline -->
        <section class="tc-padding">
            <div class="container">
              <div class="row">
                    <!-- Gallery -->
                    <div class="col-lg-12 col-xs-12">
                    <div class="gallery">

                        <!-- Secondary heading -->
                        <div class="sec-heading">
                            <h3>Gallery <span class="theme-color">Bookshop</span></h3>
                            <a class="view-all" href="#">View All<i class="fa fa-angle-double-right"></i></a>
                        </div>
                        <!-- Secondary heading -->

                        <!-- Gallery List -->
                        <ul>
                          @forelse($galleries as $gallery)
                            <li>
                                <div class="gallery-figure">
                                    @if($gallery->media_img == 'No image found')
                                        <img src="/uploads/no-img.png" width="242" height="187" alt="No image found">
                                    @else
                                        <img src="/uploads/{{ $gallery->media_img }}" width="242" height="187" alt="{{ $gallery->title }}">
                                    @endif
                                    <div class="overlay"></div> 
                                </div>
                            </li>
                            @empty
                                <div class="alert alert-danger">No record found!</div>
                            @endforelse
                            
                        </ul>
                        <!-- Gallery List -->

                    </div>
                    </div>
                    <!-- Gallery -->

              </div>
            </div>
        </section>
        <!-- Timeline --> 

        <!-- Blog Nd Gallery--> 
    </main>
@endsection