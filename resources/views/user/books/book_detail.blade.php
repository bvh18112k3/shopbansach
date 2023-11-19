@extends('user.layout.master')
@section('content')

    <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100"
         data-appear-top-offset="600" data-parallax="scroll"
         data-image-src="{{asset('font_end/images/parallax/bgparallax-07.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-innerbannercontent">
                        <h1>All Products</h1>
                        <ol class="tg-breadcrumb">
                            <li><a href="{{route('home')}}">home</a></li>
                            <li><a href="{{route('book')}}">Books</a></li>
                            <li class="tg-active"><a
                                    href="{{route('book-detail', ['id'=> $book->id, 'author_id'=> $book->author_id])}}">{{$book->name}}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--************************************
            Inner Banner End
    *************************************-->
    <!--************************************
            Main Start
    *************************************-->
    <main id="tg-main" class="tg-main tg-haslayout">
        <!--************************************
                News Grid Start
        *************************************-->
        <div class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div id="tg-twocolumns" class="tg-twocolumns">
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                            <div id="tg-content" class="tg-content">
                                <div class="tg-featurebook alert" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="tg-featureditm">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
                                                <figure><img style="width: 250px; height: 360px"
                                                             src="{{asset($book_hot->image)}}" alt="image description">
                                                </figure>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                <div class="tg-featureditmcontent">
                                                    <div class="tg-themetagbox"><span
                                                            class="tg-themetag">Đặc biệt</span></div>
                                                    <div class="tg-booktitle">
                                                        <h3><a href="javascript:void(0);">{{$book_hot->name}}</a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a
                                                            href="javascript:void(0);">{{$book_hot->Author->name}}</a></span>
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
																<span class="tg-bookprice">
																	<ins>{{price_format($book_hot->price)}}</ins>
																	<del>{{price_discount($book_hot->price, $book_hot->discount)}}</del>
																</span>
                                                        <a class="tg-btn tg-btnstyletwo tg-active"
                                                           href="javascript:void(0);">
                                                            <i class="fa fa-shopping-basket"></i>
                                                            <em>Add To Basket</em>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tg-productdetail">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                            <div class="tg-postbook">
                                                <figure class="tg-featureimg"><img src="{{asset($book->image)}}"
                                                                                   alt="image description"></figure>
                                                <div class="tg-postbookcontent">
														<span class="tg-bookprice">
															<ins>{{number_format($book->price - ($book->price*$book->discount)/100, 0, '', '.')}}đ</ins>
												            <del>{{number_format($book->price, 0, '', '.' )}}đ</del>
														</span>
                                                    <span class="tg-bookwriter">Bạn tiết kiệm được {{number_format(($book->price*$book->discount)/100, 0, '', '.')}}đ </span>
                                                    <ul class="tg-delevrystock">
                                                        <li>
                                                            <i class="icon-store"></i><span>Trạng thái: <em>{{$book->status}}</em></span>
                                                        </li>
                                                    </ul>
                                                    <div class="tg-quantityholder">
                                                        <form action="{{route('postCart')}}" method="post">
                                                            @csrf
                                                            @if(Auth::user())
                                                                <input type="hidden" name="user_id"
                                                                       value="{{Auth::user()->id}}">
                                                            @endif
                                                            <input type="hidden" name="book_id"
                                                                   value="{{$book->id}}">
                                                            <input type="hidden" name="sum_money"
                                                                   value="{{$book->price - ($book->price*$book->discount)/100}}">
                                                            <em class="minus">-</em>
                                                            <input type="text" class="result" value="1"
                                                                   id="quantity1" name="quantity">
                                                            <em class="plus">+</em>
                                                            <button class="tg-btn tg-active tg-btn-lg"
                                                                    type="submit"> Thêm vào giỏ hàng
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <form method="post" action="{{route('postCart')}}">
                                                        @csrf
                                                        <input type="hidden" name="book_id" value="{{$book->id}}">
                                                        @if(Auth::user())
                                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                        @endif
                                                        <input type="hidden" class="result" value="1" id="quantity2"
                                                               name="quantity">
                                                        <input type="hidden" name="sum_money"
                                                               value="{{$book->price - ($book->price*$book->discount)/100}}">
                                                        <input type="hidden" value="note" name="note">
                                                        <button class="tg-btnaddtowishlist" href="">
                                                            <i class="icon-heart"></i>
                                                            <span>Mua ngay</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                            <div class="tg-productcontent">
                                                <ul class="tg-bookscategories">
                                                </ul>
                                                <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                                                <div class="tg-booktitle">
                                                    <h3>{{$book->name}}</h3>
                                                </div>
                                                <span class="tg-bookwriter">By: <a
                                                        href="{{route('author_detail', $book->author_id)}}">{{$book->Author->name}}</a></span>

                                                <span>Thể loại:
                                                        @foreach($book_detail as $bd)
                                                        <span><a
                                                                href="{{route('book_type', $bd->BookType->id)}}">{{$bd->BookType->name}}</a></span>
                                                    @endforeach
                                                    </span>
                                                <div>
                                                    @if ($star == null)
                                                        <span>Chưa có đánh giá</span>
                                                    @else
                                                        <div class="rating @if($star == 1) stars1
                                                    @elseif($star == 2) stars2
                                                    @elseif($star == 3) stars3
                                                    @elseif($star == 4) stars4
                                                    @elseif($star == 5) stars5
                                                    @elseif($star == 0) stars0 @endif">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <span dat -rating="{{ $i }}"><i class="fa fa-star"
                                                                                                id="star{{$i}}"></i></span>
                                                            @endfor
                                                        </div>
                                                    @endif


                                                </div>
                                                <ul class="tg-productinfo">
                                                    <li><span>Số trang:</span><span>{{$book->pages}} trang </span></li>
                                                    <li><span>Kích thước:</span><span>{{$book->size}}  </span></li>
                                                    <li><span>Trọng lượng</span><span>{{$book->weight}}</span></li>
                                                    <li>
                                                        <span>Ngày xuất bản:</span><span>{{date('d/m/Y', strtotime($book->publishing_year))}}</span>
                                                    </li>
                                                    <li>
                                                        <span>Nhà xuất bản:</span><span>{{$book->publishing_company}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tg-productdescription">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="tg-sectionhead">
                                                    <h2>Mô tả sách</h2>
                                                </div>
                                                <ul class="tg-themetabs" role="tablist">
                                                    <li role="presentation" class="active"><a href="#description"
                                                                                              data-toggle="tab">Mô
                                                            tả</a></li>
                                                    <li role="presentation"><a href="#review" data-toggle="tab">Đánh
                                                            giá</a></li>
                                                </ul>
                                                <div class="tg-tab-content tab-content">
                                                    <div role="tabpanel" class="tg-tab-pane tab-pane active"
                                                         id="description">
                                                        <div class="tg-description">
                                                            {!! $book->description !!}
                                                        </div>
                                                    </div>
                                                    <div role="tabpanel" class="tg-tab-pane tab-pane" id="review">
                                                        <div class="tg-description">
                                                            @php
                                                                $reviewed = false;
                                                            @endphp
                                                            @foreach($reviews as $r)
                                                                @php
                                                                    $reviewed = true;
                                                                @endphp
                                                                <h6>{{$r->User->name}}</h6>
                                                                <div class="rating @if($r->star == 1) stars1
                                                    @elseif($r->star == 2) stars2
                                                    @elseif($r->star == 3) stars3
                                                    @elseif($r->star == 4) stars4
                                                    @elseif($r->star == 5) stars5
                                                    @else stars0 @endif">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        <span dat -rating="{{ $i }}"><i
                                                                                class="fa fa-star"
                                                                                id="star{{$i}}"></i></span>
                                                                    @endfor
                                                                </div>
                                                                <p>{{$r->content}}</p>
                                                            @endforeach
                                                            @if (!$reviewed)
                                                                <span>Chưa có đánh giá</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tg-aboutauthor">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="tg-sectionhead">
                                                    <h2>Thông tin về tác giả</h2>
                                                </div>
                                                <div class="tg-authorbox">
                                                    <figure class="tg-authorimg">
                                                        @if(!empty($book->Author->image))
                                                            <img style="width: 170px; height: 240px"
                                                                 src="{{asset($book->Author->image)}}">
                                                        @endif

                                                    </figure>
                                                    <div class="tg-authorinfo">
                                                        <div class="tg-authorhead">
                                                            <div class="tg-leftarea">
                                                                <div class="tg-authorname">
                                                                    <h3>{{$book->Author->name}}</h3>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="tg-description">
                                                            {!! $book->Author->description !!}

                                                            <a class="tg-btn tg-active"
                                                               href="{{route('author_detail', $book->Author->id)}}">View
                                                                All Books</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tg-relatedproducts">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="tg-sectionhead">
                                                        <h2><span>Sách cùng tác giả</span>Có thể bạn thích</h2>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div id="tg-relatedproductslider"
                                                         class="tg-relatedproductslider tg-relatedbooks owl-carousel">
                                                        @foreach($data as $bk)
                                                            <div class="item" style="height: 500px">
                                                                <div class="tg-postbook" id="title">
                                                                    <figure class="tg-featureimg">
                                                                        <div class="tg-bookimg">
                                                                            <div class="tg-frontcover"><img
                                                                                    style="height: 205px"
                                                                                    src="{{asset($bk->image)}}"
                                                                                    alt="image description"></div>
                                                                            <div class="tg-backcover"><img
                                                                                    style="height: 205px"
                                                                                    src="{{asset($bk->image)}}"
                                                                                    alt="image description"></div>
                                                                        </div>
                                                                        <form method="post"
                                                                              action="{{route('postCart')}}">
                                                                            @csrf
                                                                            <input type="hidden" name="book_id"
                                                                                   value="{{$bk->id}}">
                                                                            @if(Auth::user())
                                                                                <input type="hidden" name="user_id"
                                                                                       value="{{Auth::user()->id}}">
                                                                            @endif
                                                                            <input type="hidden" name="quantity"
                                                                                   value="1">
                                                                            <input type="hidden" name="sum_money"
                                                                                   value="{{$bk->price - ($bk->price*$bk->discount)/100}}">
                                                                            <input type="hidden" value="note"
                                                                                   name="note">
                                                                            <button class="tg-btnaddtowishlist" href="">
                                                                                <i class="icon-heart"></i>
                                                                                <span>Mua ngay</span>
                                                                            </button>
                                                                        </form>

                                                                    </figure>
                                                                    <div class="tg-postbookcontent">
                                                                        <div class="tg-themetagbox"><span
                                                                                class="tg-themetag">sale {{$bk->discount}}%</span>
                                                                        </div>
                                                                        <div class="tg-booktitle">
                                                                            <h3>
                                                                                <a href="{{route('book-detail', ['id'=> $bk->id, 'author_id'=> $bk->author_id])}}">{{$bk->name}}</a>
                                                                            </h3>
                                                                        </div>
                                                                        <span class="tg-bookwriter">Tác giả: <a
                                                                                href="{{route('author_detail', $bk->Author->id)}}">{{$bk->Author->name}}</a></span>
                                                                        @php
                                                                            $reviewed = false;
                                                                        @endphp
                                                                        @foreach($review as $r)
                                                                            @if($r->book_id == $bk->id)
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
                                                                                        <span dat-rating="{{ $i }}"><i
                                                                                                class="fa fa-star"
                                                                                                id="star{{$i}}"></i></span>
                                                                                    @endfor

                                                                                </div>

                                                                            @endif
                                                                        @endforeach
                                                                        @if (!$reviewed)
                                                                            <span>Chưa có đánh giá</span>
                                                                        @endif
                                                                        <span class="tg-bookprice">
												<ins>{{number_format($bk->price - ($bk->price*$bk->discount)/100, 0, '', '.')}}đ</ins>
												<del>{{number_format($bk->price, 0, '', '.' )}}đ</del>
											</span>
                                                                        <form method="post"
                                                                              action="{{route('postCart')}}">
                                                                            @csrf
                                                                            <input type="hidden" name="book_id"
                                                                                   value="{{$bk->id}}">
                                                                            @if(Auth::user())
                                                                                <input type="hidden" name="user_id"
                                                                                       value="{{Auth::user()->id}}">
                                                                            @endif
                                                                            <input type="hidden" name="quantity"
                                                                                   value="1">
                                                                            <input type="hidden" name="sum_money"
                                                                                   value="{{$bk->price - ($bk->price*$bk->discount)/100}}">
                                                                            <input type="hidden" value="" name="note">
                                                                            <button class="tg-btn tg-btnstyletwo"
                                                                                    type="submit">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
                            <aside id="tg-sidebar" class="tg-sidebar">
                                <div class="tg-widget tg-widgetsearch">
                                </div>
                                <div class="tg-widget tg-catagories">
                                    <div class="tg-widgettitle">
                                        <h3>Categories</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <ul>
                                            @foreach($book_type as $cate)
                                                <li><a href="{{route('book_type', $cate->id)}}">
                                                        <span>{{$cate->name}}</span>
                                                        <em>
                                                            @foreach($count as $ca)
                                                                @foreach($ca as $c)
                                                                    @if($c->book_type_id === $cate->id)
                                                                        {{$c->count}}
                                                                    @endif
                                                                @endforeach
                                                            @endforeach

                                                        </em>
                                                    </a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                                <div class="tg-widget tg-widgettrending">
                                    <div class="tg-widgettitle">
                                        <h3>Trending Products</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <ul>
                                            <li>
                                                <article class="tg-post">
                                                    <figure><a href="javascript:void(0);"><img
                                                                src="{{asset('font_end/images/products/img-04.jpg')}}"
                                                                alt="image description"></a></figure>
                                                    <div class="tg-postcontent">
                                                        <div class="tg-posttitle">
                                                            <h3><a href="javascript:void(0);">Where The Wild Things
                                                                    Are</a></h3>
                                                        </div>
                                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    </div>
                                                </article>
                                            </li>
                                            <li>
                                                <article class="tg-post">
                                                    <figure><a href="javascript:void(0);"><img
                                                                src="{{asset('font_end/images/products/img-05.jpg')}}"
                                                                alt="image description"></a></figure>
                                                    <div class="tg-postcontent">
                                                        <div class="tg-posttitle">
                                                            <h3><a href="javascript:void(0);">Where The Wild Things
                                                                    Are</a></h3>
                                                        </div>
                                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    </div>
                                                </article>
                                            </li>
                                            <li>
                                                <article class="tg-post">
                                                    <figure><a href="javascript:void(0);"><img
                                                                src="{{asset('font_end/images/products/img-06.jpg')}}"
                                                                alt="image description"></a></figure>
                                                    <div class="tg-postcontent">
                                                        <div class="tg-posttitle">
                                                            <h3><a href="javascript:void(0);">Where The Wild Things
                                                                    Are</a></h3>
                                                        </div>
                                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    </div>
                                                </article>
                                            </li>
                                            <li>
                                                <article class="tg-post">
                                                    <figure><a href="javascript:void(0);"><img
                                                                src="{{asset('font_end/images/products/img-07.jpg')}}"
                                                                alt="image description"></a></figure>
                                                    <div class="tg-postcontent">
                                                        <div class="tg-posttitle">
                                                            <h3><a href="javascript:void(0);">Where The Wild Things
                                                                    Are</a></h3>
                                                        </div>
                                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    </div>
                                                </article>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="tg-widget tg-widgetblogers">
                                    <div class="tg-widgettitle">
                                        <h3>Top Bloogers</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <ul>
                                            @foreach($topauthor as $au)
                                                <li>
                                                    <figure><a href="{{route('author_detail', $au->id)}}"><img style="width: 100px; height: 100px" src="{{asset($au->image)}}" alt="image description"></a></figure>
                                                    <div class="tg-authornamebooks">
                                                        <h4><a href="{{route('author_detail', $au->id)}}">{{$au->name}}</a></h4>
                                                        <p>{{$au->book_count}} cuốn sách được xuất bản</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!--************************************
                News Grid End
        *************************************-->
    </main>
@endsection
