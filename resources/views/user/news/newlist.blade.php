@extends('user.layout.master')
@section('content')
    <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-07.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-innerbannercontent">
                        <h1>News &amp; Articles</h1>
                        <ol class="tg-breadcrumb">
                            <li><a href="javascript:void(0);">home</a></li>
                            <li class="tg-active">News</li>
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
                                <div class="tg-newsgrid">
                                    <div class="tg-sectionhead">
                                        <h2><span>Latest News &amp; Articles</span>What's Hot in The News</h2>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                            <article class="tg-post">
                                                <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-01.jpg')}}" alt="image description"></a></figure>
                                                <div class="tg-postcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Adventure</a></li>
                                                        <li><a href="javascript:void(0);">Fun</a></li>
                                                    </ul>
                                                    <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                                    <div class="tg-posttitle">
                                                        <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    <ul class="tg-postmetadata">
                                                        <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                                        <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                                    </ul>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                            <article class="tg-post">
                                                <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-02.jpg')}}" alt="image description"></a></figure>
                                                <div class="tg-postcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Adventure</a></li>
                                                        <li><a href="javascript:void(0);">Fun</a></li>
                                                    </ul>
                                                    <div class="tg-posttitle">
                                                        <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    <ul class="tg-postmetadata">
                                                        <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                                        <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                                    </ul>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                            <article class="tg-post">
                                                <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-03.jpg')}}"alt="image description"></a></figure>
                                                <div class="tg-postcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Adventure</a></li>
                                                        <li><a href="javascript:void(0);">Fun</a></li>
                                                    </ul>
                                                    <div class="tg-posttitle">
                                                        <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    <ul class="tg-postmetadata">
                                                        <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                                        <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                                    </ul>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                            <article class="tg-post">
                                                <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-04.jpg')}}" alt="image description"></a></figure>
                                                <div class="tg-postcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Adventure</a></li>
                                                        <li><a href="javascript:void(0);">Fun</a></li>
                                                    </ul>
                                                    <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                                    <div class="tg-posttitle">
                                                        <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    <ul class="tg-postmetadata">
                                                        <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                                        <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                                    </ul>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                            <article class="tg-post">
                                                <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-05.jpg')}}" alt="image description"></a></figure>
                                                <div class="tg-postcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Adventure</a></li>
                                                        <li><a href="javascript:void(0);">Fun</a></li>
                                                    </ul>
                                                    <div class="tg-posttitle">
                                                        <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    <ul class="tg-postmetadata">
                                                        <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                                        <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                                    </ul>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                            <article class="tg-post">
                                                <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-06.jpg')}}" alt="image description"></a></figure>
                                                <div class="tg-postcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Adventure</a></li>
                                                        <li><a href="javascript:void(0);">Fun</a></li>
                                                    </ul>
                                                    <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                                    <div class="tg-posttitle">
                                                        <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    <ul class="tg-postmetadata">
                                                        <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                                        <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                                    </ul>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                            <article class="tg-post">
                                                <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-07.jpg')}}" alt="image description"></a></figure>
                                                <div class="tg-postcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Adventure</a></li>
                                                        <li><a href="javascript:void(0);">Fun</a></li>
                                                    </ul>
                                                    <div class="tg-posttitle">
                                                        <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    <ul class="tg-postmetadata">
                                                        <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                                        <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                                    </ul>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                            <article class="tg-post">
                                                <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-08.jpg')}}" alt="image description"></a></figure>
                                                <div class="tg-postcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Adventure</a></li>
                                                        <li><a href="javascript:void(0);">Fun</a></li>
                                                    </ul>
                                                    <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                                    <div class="tg-posttitle">
                                                        <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    <ul class="tg-postmetadata">
                                                        <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                                        <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                                    </ul>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                            <article class="tg-post">
                                                <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-09.jpg')}}" alt="image description"></a></figure>
                                                <div class="tg-postcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Adventure</a></li>
                                                        <li><a href="javascript:void(0);">Fun</a></li>
                                                    </ul>
                                                    <div class="tg-posttitle">
                                                        <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    <ul class="tg-postmetadata">
                                                        <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                                        <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                                    </ul>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                            <article class="tg-post">
                                                <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-10.jpg')}}" alt="image description"></a></figure>
                                                <div class="tg-postcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Adventure</a></li>
                                                        <li><a href="javascript:void(0);">Fun</a></li>
                                                    </ul>
                                                    <div class="tg-posttitle">
                                                        <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    <ul class="tg-postmetadata">
                                                        <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                                        <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                                    </ul>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                            <article class="tg-post">
                                                <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-11.jpg')}}" alt="image description"></a></figure>
                                                <div class="tg-postcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Adventure</a></li>
                                                        <li><a href="javascript:void(0);">Fun</a></li>
                                                    </ul>
                                                    <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                                    <div class="tg-posttitle">
                                                        <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    <ul class="tg-postmetadata">
                                                        <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                                        <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                                    </ul>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                            <article class="tg-post">
                                                <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-12.jpg')}}" alt="image description"></a></figure>
                                                <div class="tg-postcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Adventure</a></li>
                                                        <li><a href="javascript:void(0);">Fun</a></li>
                                                    </ul>
                                                    <div class="tg-posttitle">
                                                        <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    <ul class="tg-postmetadata">
                                                        <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                                        <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                                    </ul>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                            <article class="tg-post">
                                                <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-13.jpg')}}" alt="image description"></a></figure>
                                                <div class="tg-postcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Adventure</a></li>
                                                        <li><a href="javascript:void(0);">Fun</a></li>
                                                    </ul>
                                                    <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                                    <div class="tg-posttitle">
                                                        <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    <ul class="tg-postmetadata">
                                                        <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                                        <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                                    </ul>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                            <article class="tg-post">
                                                <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-14.jpg')}}" alt="image description"></a></figure>
                                                <div class="tg-postcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Adventure</a></li>
                                                        <li><a href="javascript:void(0);">Fun</a></li>
                                                    </ul>
                                                    <div class="tg-posttitle">
                                                        <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    <ul class="tg-postmetadata">
                                                        <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                                        <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                                    </ul>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                            <article class="tg-post">
                                                <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-15.jpg')}}" alt="image description"></a></figure>
                                                <div class="tg-postcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Adventure</a></li>
                                                        <li><a href="javascript:void(0);">Fun</a></li>
                                                    </ul>
                                                    <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                                    <div class="tg-posttitle">
                                                        <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    <ul class="tg-postmetadata">
                                                        <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                                        <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                                    </ul>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
                            <aside id="tg-sidebar" class="tg-sidebar">

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
                                        <h3>Trending Posts</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <ul>
                                            <li>
                                                <article class="tg-post">
                                                    <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/products/img-04.jpg')}}" alt="image description"></a></figure>
                                                    <div class="tg-postcontent">
                                                        <div class="tg-posttitle">
                                                            <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                        </div>
                                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    </div>
                                                </article>
                                            </li>
                                            <li>
                                                <article class="tg-post">
                                                    <figure><a href="javascript:void(0);"><img src="{{asset('font_end/images/blog/img-01.jpg')}}" alt="image description"></a></figure>
                                                    <div class="tg-postcontent">
                                                        <div class="tg-posttitle">
                                                            <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                        </div>
                                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    </div>
                                                </article>
                                            </li>
                                            <li>
                                                <article class="tg-post">
                                                    <figure><a href="javascript:void(0);"> <img src="{{asset('font_end/images/products/img-06.jpg')}}"> alt="image description"></a></figure>
                                                    <div class="tg-postcontent">
                                                        <div class="tg-posttitle">
                                                            <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                        </div>
                                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    </div>
                                                </article>
                                            </li>
                                            <li>
                                                <article class="tg-post">
                                                    <figure><a href="javascript:void(0);">  <img src="{{asset('font_end/images/products/img-07.jpg')}}" alt="image description"></a></figure>
                                                    <div class="tg-postcontent">
                                                        <div class="tg-posttitle">
                                                            <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
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
        <!--************************************
                News Grid End
        *************************************-->
    </main>
@endsection
