@extends('user.layout.master')
@section('content')
    <section class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-sectionhead">
                        <h2><span>Sự lựa chọn của mọi người</span>Những cuốn sách </h2>
                        <a class="tg-btn" href="{{route('book')}}">View All</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="tg-bestsellingbooksslider"
                         class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
                        @foreach($data as $book)
                            <div class="item" style="height: 500px">
                                <div class="tg-postbook" id="title">
                                    <figure class="tg-featureimg">
                                        <div class="tg-bookimg">
                                            <div class="tg-frontcover"><img style="height: 205px"
                                                                            src="{{asset($book->image)}}"
                                                                            alt="image description"></div>
                                            <div class="tg-backcover"><img style="height: 205px"
                                                                           src="{{asset($book->image)}}"
                                                                           alt="image description"></div>
                                        </div>
                                        <form method="post" action="{{route('postCart')}}">
                                            @csrf
                                            <input type="hidden" name="book_id" value="{{$book->id}}">
                                            @if(Auth::user())
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            @endif
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="sum_money"
                                                   value="{{$book->price - ($book->price*$book->discount)/100}}">
                                            <input type="hidden" value="note" name="note">
                                            <button class="tg-btnaddtowishlist" href="">
                                                <i class="icon-heart"></i>
                                                <span>Mua ngay</span>
                                            </button>
                                        </form>

                                    </figure>
                                    <div class="tg-postbookcontent">
                                        <div class="tg-themetagbox"><span
                                                class="tg-themetag">sale {{$book->discount}}%</span></div>
                                        <div class="tg-booktitle">
                                            <h3>
                                                <a href="{{route('book-detail', ['id'=> $book->id, 'author_id'=> $book->author_id])}}">{{$book->name}}</a>
                                            </h3>
                                        </div>
                                        <span class="tg-bookwriter">Tác giả: <a
                                                href="{{route('author_detail', $book->Author->id)}}">{{$book->Author->name}}</a></span>
                                        @php
                                            $reviewed = false;
                                        @endphp
                                        @foreach($review as $r)
                                            @if($r->book_id == $book->id)
                                                @php
                                                    $reviewed = true;
                                                @endphp
                                                <div class="rating @if($r->star == 1) stars1
                                                    @elseif($r->star == 2) stars2
                                                    @elseif($r->star == 3) stars3
                                                    @elseif($r->star == 4) stars4
                                                    @elseif($r->star == 5) stars5
                                                    @else stars0 @endif">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <span dat-rating="{{ $i }}"><i class="fa fa-star"
                                                                                       id="star{{$i}}"></i></span>
                                                    @endfor

                                                </div>

                                            @endif
                                        @endforeach
                                        @if (!$reviewed)
                                            <span>Chưa có đánh giá</span>
                                        @endif
                                        <span class="tg-bookprice">
												<ins>{{number_format($book->price - ($book->price*$book->discount)/100, 0, '', '.')}}đ</ins>
												<del>{{number_format($book->price, 0, '', '.' )}}đ</del>
											</span>
                                        <form method="post" action="{{route('postCart')}}">
                                            @csrf
                                            <input type="hidden" name="book_id" value="{{$book->id}}">
                                            @if(Auth::user())
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            @endif
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="sum_money"
                                                   value="{{$book->price - ($book->price*$book->discount)/100}}">
                                            <input type="hidden" value="" name="note">
                                            <button class="tg-btn tg-btnstyletwo" type="submit">
                                                <i class="fa fa-shopping-basket"></i>
                                                <em>Add To Basket</em>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--************************************
            Best Selling End
    *************************************-->
    <!--************************************
            Featured Item Start
    *************************************-->
    <section class="tg-bglight tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="tg-featureditm">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
                        <figure><img style="width: 320px; height: 360px" src="{{asset($book_hot->image)}}"
                                     alt="image description"></figure>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <div class="tg-featureditmcontent">
                            <div class="tg-themetagbox"><span class="tg-themetag">Đặc sắc</span></div>
                            <div class="tg-booktitle">
                                <h3>
                                    <a href="{{route('book-detail', ['id'=> $book_hot->id, 'author_id'=> $book_hot->author_id])}}">{{$book_hot->name}}</a>
                                </h3>
                            </div>
                            <span class="tg-bookwriter">Tác giả: <a
                                    href="{{route('author_detail', $book_hot->Author->id)}}">{{$book_hot->Author->name}}</a></span>
                            @php
                                $reviewed = false;
                            @endphp
                            @foreach($review as $r)
                                @if($r->book_id == $book_hot->id)
                                    @php
                                        $reviewed = true;
                                    @endphp
                                    <div class="rating @if($r->star == 1) stars1
                                                    @elseif($r->star == 2) stars2
                                                    @elseif($r->star == 3) stars3
                                                    @elseif($r->star == 4) stars4
                                                    @elseif($r->star == 5) stars5
                                                    @else stars0 @endif">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span dat-rating="{{ $i }}"><i class="fa fa-star"
                                                                           id="star{{$i}}"></i></span>
                                        @endfor

                                    </div>

                                @endif
                            @endforeach
                            @if (!$reviewed)
                                <span>Chưa có đánh giá</span>
                            @endif
                            <div class="tg-priceandbtn">

                                <form method="post" action="{{route('postCart')}}">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{$book_hot->id}}">
                                    @if(Auth::user())
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    @endif
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="sum_money"
                                           value="{{$book_hot->price - ($book_hot->price*$book_hot->discount)/100}}">
                                    <input type="hidden" value="" name="note">
                                    <button class="tg-btn tg-btnstyletwo tg-active" type="submit">
                                        <i class="fa fa-shopping-basket"></i>
                                        <em>Add To Basket</em>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--************************************
            Featured Item End
    *************************************-->
    <!--************************************
            New Release Start
    *************************************-->
    <section class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="tg-newrelease">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="tg-sectionhead">
                            <h2><span>Neesm thử gia cị mới</span>Những cuốn sách mới</h2>
                        </div>
                        <div class="tg-description">
                            <p>Bạn có thể xem thêm những cuốn sách mới của chúng tôi</p>
                        </div>
                        <div class="tg-btns">
                            <a class="tg-btn tg-active" href="{{route('book')}}">View All</a>
                            <a class="tg-btn" href="javascript:void(0);">Read More</a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="row">
                            <div class="tg-newreleasebooks">
                                @foreach($book_new as $bn)
                                    <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                                        <div class="tg-postbook">
                                            <figure class="tg-featureimg">
                                                <div class="tg-bookimg">
                                                    <div class="tg-frontcover"><img style="height: 248px"
                                                                                    src="{{asset($bn->image)}}"
                                                                                    alt="image description"></div>
                                                    <div class="tg-backcover"><img style="height: 248px"
                                                                                   src="{{asset($bn->image)}}"
                                                                                   alt="image description"></div>
                                                </div>
                                                <form method="post" action="{{route('postCart')}}">
                                                    @csrf
                                                    <input type="hidden" name="book_id" value="{{$bn->id}}">
                                                    @if(Auth::user())
                                                        <input type="hidden" name="user_id"
                                                               value="{{Auth::user()->id}}">
                                                    @endif
                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="sum_money"
                                                           value="{{$bn->price - ($bn->price*$bn->discount)/100}}">
                                                    <input type="hidden" value="" name="note">
                                                    <button class="tg-btn tg-btnstyletwo tg-active" type="submit">

                                                        <em>Add To Basket</em>
                                                    </button>
                                                </form>

                                            </figure>
                                            <div class="tg-postbookcontent">
                                                <div class="tg-booktitle">
                                                    <h3>
                                                        <a href="{{route('book-detail', ['id'=> $bn->id, 'author_id'=> $bn->author_id])}}">{{$bn->name}}</a>
                                                    </h3>
                                                </div>
                                                <span class="tg-bookwriter">Tác giả: <a
                                                        href="{{route('author_detail', $bn->Author->id)}}">{{$bn->Author->name}}</a></span>
                                                @php
                                                    $reviewed = false;
                                                @endphp
                                                @foreach($review as $r)
                                                    @if($r->book_id == $book->id)
                                                        @php
                                                            $reviewed = true;
                                                        @endphp
                                                        <div class="rating @if($r->star == 1) stars1
                                                    @elseif($r->star == 2) stars2
                                                    @elseif($r->star == 3) stars3
                                                    @elseif($r->star == 4) stars4
                                                    @elseif($r->star == 5) stars5
                                                    @else stars0 @endif">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <span dat-rating="{{ $i }}"><i class="fa fa-star"
                                                                                               id="star{{$i}}"></i></span>
                                                            @endfor

                                                        </div>

                                                    @endif
                                                @endforeach
                                                @if (!$reviewed)
                                                    <span>Chưa có đánh giá</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--************************************
            New Release End
    *************************************-->
    <!--************************************
            Collection Count Start
    *************************************-->
    <section class="tg-parallax tg-bgcollectioncount tg-haslayout" data-z-index="-100" data-appear-top-offset="600"
             data-parallax="scroll" data-image-src="{{asset('font_end/images/parallax/bgparallax-04.jpg')}}">
        <div class="tg-sectionspace tg-collectioncount tg-haslayout">
            <div class="container">
                <div class="row">
                    <div id="tg-collectioncounters" class="tg-collectioncounters">
                        @php
                            $a = 0;
                        @endphp
                        @foreach($type as $t)
                            <div
                                class="tg-collectioncounter @if($a==0)tg-drama @elseif($a == 1)tg-horror @elseif($a == 2)tg-romance @else tg-fashion @endif">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-bubble"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>{{$t->name}}</h2>
                                    @foreach($bookd as $bd)
                                        @if($t->id == $bd->book_type_id)
                                            <h3 data-from="0" data-to="{{$bd->total_count_book_type}}" data-speed="8000"
                                                data-refresh-interval="50">
                                                {{number_format($bd->total_count_book_type)}}</h3>
                                        @endif

                                    @endforeach
                                </div>
                            </div>
                            @php
                                $a++;
                            @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--************************************
            Collection Count End
    *************************************-->
    <!--************************************
            Picked By Author Start
    *************************************-->
    <section class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-sectionhead">
                        <h2><span>Một vài cuốn sách hay</span>Được Lựa Chọn Bởi Tác Giả</h2>
                        <a class="tg-btn" href="{{route('book')}}">View All</a>
                    </div>
                </div>
                <div id="tg-pickedbyauthorslider" class="tg-pickedbyauthor tg-pickedbyauthorslider owl-carousel">
                    @foreach($b5 as $b)
                        <div class="item">
                            <div class="tg-postbook" style="height: 600px">
                                <figure class="tg-featureimg">
                                    <div class="tg-bookimg">
                                        <div class="tg-frontcover"><img style="height: 302px" src="{{asset($b->image)}}"
                                                                        alt="image description"></div>
                                    </div>
                                    <div class="tg-hovercontent">
                                        {{--                                        <div class="tg-description">--}}
                                        {{--                                            <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore--}}
                                        {{--                                                toloregna aliqua enim adia minim veniam, quis nostrud.</p>--}}
                                        {{--                                        </div>--}}
                                        <strong class="tg-bookpage">Book Pages: {{$b->pages}}</strong>
                                        {{--                                        <strong class="tg-bookcategory">Category: Adventure, Fun</strong>--}}
                                        <strong class="tg-bookprice">Price: {{price_discount($b->price, $b->discount)}}
                                            VND</strong>
                                        <div class="tg-ratingbox">
                                            @php
                                                $reviewed = false;
                                            @endphp
                                            @foreach($review as $r)
                                                @if($r->book_id == $b->id)
                                                    @php
                                                        $reviewed = true;
                                                    @endphp
                                                    <div class="rating @if($r->star == 1) stars1
                                                    @elseif($r->star == 2) stars2
                                                    @elseif($r->star == 3) stars3
                                                    @elseif($r->star == 4) stars4
                                                    @elseif($r->star == 5) stars5
                                                    @else stars0 @endif">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <span dat-rating="{{ $i }}"><i class="fa fa-star"
                                                                                           id="star{{$i}}"></i></span>
                                                        @endfor

                                                    </div>

                                                @endif
                                            @endforeach
                                            @if (!$reviewed)
                                                <span>Chưa có đánh giá</span>
                                            @endif</div>
                                    </div>
                                </figure>
                                <div class="tg-postbookcontent">
                                    <div class="tg-booktitle">
                                        <h3>
                                            <a href="{{route('book-detail', ['id'=> $b->id, 'author_id'=> $b->author_id])}}">{{$b->name}}</a>
                                        </h3>
                                    </div>
                                    <span class="tg-bookwriter">Tác giả: <a
                                            href="{{route('author_detail', $b->Author->id)}}">{{$b->Author->name}}</a></span>
                                    <form method="post" action="{{route('postCart')}}">
                                        @csrf
                                        <input type="hidden" name="book_id" value="{{$b->id}}">
                                        @if(Auth::user())
                                            <input type="hidden" name="user_id"
                                                   value="{{Auth::user()->id}}">
                                        @endif
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="sum_money"
                                               value="{{$b->price - ($b->price*$b->discount)/100}}">
                                        <input type="hidden" value="" name="note">
                                        <button class="tg-btn tg-btnstyletwo tg-active" type="submit">

                                            <em>Add To Basket</em>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--************************************
            Picked By Author End
    *************************************-->
    <!--************************************
            Testimonials Start
    *************************************-->
    <section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600"
             data-parallax="scroll" data-image-src="{{asset('font_end/images/parallax/bgparallax-05.jpg')}}">
        <div class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
                        <div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel">
                            <div class="item tg-testimonial">
                                <figure><img src="{{asset('font_end/images/author/buivanhuy.jpg')}}"
                                             alt="image description"></figure>
                                <blockquote><q>Nhằm cung cấp cho mọi người những kiến thức vô cùng ý nghĩa và giá trị
                                        chúng tôi luôn đem lại những cuốn sách tuyệt vời mong mọi người ủng hộ chúng
                                        tôi</q></blockquote>
                                <div class="tg-testimonialauthor">
                                    <h3>Bùi Văn Huy</h3>
                                    <span>Chủ sở hữu</span>
                                </div>
                            </div>
                            <div class="item tg-testimonial">
                                <figure><img style="height: 138.44px;"
                                             src="{{asset('font_end/images/author/ngocai.jpeg')}}"
                                             alt="image description"></figure>
                                <blockquote><q>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore
                                        tolore magna aliqua enim ad minim veniam, quis nostrud exercitation ullamcoiars
                                        nisi ut aliquip commodo.</q></blockquote>
                                <div class="tg-testimonialauthor">
                                    <h3>Ngọc Nguyễn</h3>
                                    <span>Đồng sở hữu </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--************************************
            Testimonials End
    *************************************-->
    <!--************************************
            Call to Action Start
    *************************************-->
    <section class="tg-parallax tg-bgcalltoaction tg-haslayout" data-z-index="-100" data-appear-top-offset="600"
             data-parallax="scroll" data-image-src="{{asset('font_end/images/parallax/bgparallax-06.jpg')}}">
        <div class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-calltoaction">
                            <h2>Mở giảm giá cho tất cả</h2>
                            <h3>Các bạn có thể thoải mái lựa chọn sách mà các bạn mong muốn</h3>
                            <a class="tg-btn tg-active" href="javascript:void(0);">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--************************************
            Call to Action End
    *************************************-->
    <!--************************************
            Latest News Start
    *************************************-->
    <section class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-sectionhead">
                        <h2><span>Latest News &amp; Articles</span>What's Hot in The News</h2>
                        <a class="tg-btn" href="javascript:void(0);">View All</a>
                    </div>
                </div>
                <div id="tg-postslider" class="tg-postslider tg-blogpost owl-carousel">
                    <article class="item tg-post">
                        <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-01.jpg')}}"
                                                                   alt="image description"></a></figure>
                        <div class="tg-postcontent">
                            <ul class="tg-bookscategories">
                                <li><a href="javascript:void(0);">Adventure</a></li>
                                <li><a href="javascript:void(0);">Fun</a></li>
                            </ul>
                            <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                            <div class="tg-posttitle">
                                <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                            </div>
                            <span class="tg-bookwriter">Tác giả: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                            <ul class="tg-postmetadata">
                                <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a>
                                </li>
                                <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                            </ul>
                        </div>
                    </article>
                    <article class="item tg-post">
                        <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-02.jpg')}}"
                                                                   alt="image description"></a></figure>
                        <div class="tg-postcontent">
                            <ul class="tg-bookscategories">
                                <li><a href="javascript:void(0);">Adventure</a></li>
                                <li><a href="javascript:void(0);">Fun</a></li>
                            </ul>
                            <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                            <div class="tg-posttitle">
                                <h3><a href="javascript:void(0);">All She Wants To Do Is Dance</a></h3>
                            </div>
                            <span class="tg-bookwriter">Tác giả: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                            <ul class="tg-postmetadata">
                                <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a>
                                </li>
                                <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                            </ul>
                        </div>
                    </article>
                    <article class="item tg-post">
                        <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-03.jpg')}}"
                                                                   alt="image description"></a></figure>
                        <div class="tg-postcontent">
                            <ul class="tg-bookscategories">
                                <li><a href="javascript:void(0);">Adventure</a></li>
                                <li><a href="javascript:void(0);">Fun</a></li>
                            </ul>
                            <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                            <div class="tg-posttitle">
                                <h3><a href="javascript:void(0);">Why Walk When You Can Climb?</a></h3>
                            </div>
                            <span class="tg-bookwriter">Tác giả: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                            <ul class="tg-postmetadata">
                                <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a>
                                </li>
                                <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                            </ul>
                        </div>
                    </article>
                    <article class="item tg-post">
                        <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-04.jpg')}}"
                                                                   alt="image description"></a></figure>
                        <div class="tg-postcontent">
                            <ul class="tg-bookscategories">
                                <li><a href="javascript:void(0);">Adventure</a></li>
                                <li><a href="javascript:void(0);">Fun</a></li>
                            </ul>
                            <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                            <div class="tg-posttitle">
                                <h3><a href="javascript:void(0);">Dance Like Nobody’s Watching</a></h3>
                            </div>
                            <span class="tg-bookwriter">Tác giả: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                            <ul class="tg-postmetadata">
                                <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a>
                                </li>
                                <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                            </ul>
                        </div>
                    </article>
                    <article class="item tg-post">
                        <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-02.jpg')}}"
                                                                   alt="image description"></a></figure>
                        <div class="tg-postcontent">
                            <ul class="tg-bookscategories">
                                <li><a href="javascript:void(0);">Adventure</a></li>
                                <li><a href="javascript:void(0);">Fun</a></li>
                            </ul>
                            <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                            <div class="tg-posttitle">
                                <h3><a href="javascript:void(0);">All She Wants To Do Is Dance</a></h3>
                            </div>
                            <span class="tg-bookwriter">Tác giả: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                            <ul class="tg-postmetadata">
                                <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a>
                                </li>
                                <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                            </ul>
                        </div>
                    </article>
                    <article class="item tg-post">
                        <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-03.jpg')}}"
                                                                   alt="image description"></a></figure>
                        <div class="tg-postcontent">
                            <ul class="tg-bookscategories">
                                <li><a href="javascript:void(0);">Adventure</a></li>
                                <li><a href="javascript:void(0);">Fun</a></li>
                            </ul>
                            <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                            <div class="tg-posttitle">
                                <h3><a href="javascript:void(0);">Why Walk When You Can Climb?</a></h3>
                            </div>
                            <span class="tg-bookwriter">Tác giả: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                            <ul class="tg-postmetadata">
                                <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a>
                                </li>
                                <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                            </ul>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
