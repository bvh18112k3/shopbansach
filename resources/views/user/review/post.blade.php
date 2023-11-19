@extends('user.layout.master')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .rating {
            cursor: pointer;
            font-size: 30px;
        }

        .rating span {
            display: inline-block;
            transition: transform 0.2s;
        }

        .rating span:hover,
        .rating span:hover ~ span {
            transform: scale(1.2); /* Hiệu ứng khi di chuột qua */
        }
    </style>
    <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{asset('font_end/images/parallax/bgparallax-07.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-innerbannercontent">
                        <h1>All Products</h1>
                        <ol class="tg-breadcrumb">
                            <li><a href="{{route('home')}}">home</a></li>
                            <li class="tg-active"><a href="">Đánh giá</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tg-productdetail">
        @foreach($orderDetail as $oD)
            <div class="row">
                <div class="col-2"></div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="tg-productcontent">
                        <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                        <div class="row">
                            <div class="tg-booktitle">
                                <h3>{{$oD->Book->name}}</h3>
                            </div>

                        </div>
                        </span>
                        <div class="row">
                            <div class="col-4">
                                <img style="width:300px;" src="{{asset($oD->Book->image)}}" alt="image description">
                            </div>
                            <div class="col-8">
                                <ul class="tg-productinfo">
                                    <li><span>Số trang:</span><span>{{$oD->Book->pages}} trang </span></li>
                                    <li><span>Kích thước:</span><span>{{$oD->Book->size}}  </span></li>
                                    <li><span>Trọng lượng</span><span>{{$oD->Book->weight}}</span></li>
                                    <li><span>Ngày xuất bản:</span><span>{{date('d/m/Y', strtotime($oD->Book->publishing_year))}}</span></li>
                                    <li><span>Nhà xuất bản:</span><span>{{$oD->Book->publishing_company}}</span></li>
                                    <li><span>Tác giả</span><span><a href="{{route('author_detail', $oD->Book->author_id)}}">{{$oD->Book->Author->name}}</a></span></li>
                                    <li><span>Thể loại:</span>@foreach($book_detail as $bd)
                                            @foreach($bd as $b)
                                                @if($b->book_id == $oD->book_id)
                                                    <span><a href="javascript:void(0);">{{$b->BookType->name}}</a></span>
                                                @endif
                                            @endforeach
                                        @endforeach</li>
                                </ul>
                                <div class="tg-description">
                                    <form action="{{route('review.store')}}" method="post">
                                        @csrf
                                        <div>
                                            <label for="rating">Rating:</label>
                                            <div class="rating">
                                                    <?php for ($i = 1; $i <= 5; $i++) {
                                                    echo ' <span dat -rating = "{{ $i }}" ><i class="fa fa-star" ></i ></span >';
                                                } ?>
                                                <input type="hidden" name="star" id="selected-rating" value="0">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="">Nội dung đánh giá</label>
                                            <textarea class="form-control" name="content"></textarea>
                                        </div>
                                        <input type="hidden" value="{{$oD->book_id}}" name="book_id">
                                        <input type="hidden" value="{{Auth()->user()->id}}" name="user_id">
                                        <input type="hidden" value="{{$oD->order_id}}" name="order_id">
                                       <div>
                                           <button style="margin: 20px 0px" class="btn btn-success">Gửi đánh giá</button>
                                       </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <span>

                        </span>

                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        @endforeach
    </div>
    <script>
        // Sử dụng JavaScript để xử lý chọn sao
        document.addEventListener('DOMContentLoaded', function () {
            const stars = document.querySelectorAll('.rating span');
            const ratingInput = document.getElementById('selected-rating');
            stars.forEach((star, index) => {
                star.addEventListener('click', function () {
                    ratingInput.value = index + 1;

                    // Reset màu sao
                    stars.forEach((resetStar, resetIndex) => {
                        if (resetIndex <= index) {
                            resetStar.style.color = 'gold';
                        } else {
                            resetStar.style.color = 'black';
                        }
                    });
                });
            });
        });
    </script>
@endsection
