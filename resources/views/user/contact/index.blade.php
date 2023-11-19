@extends('user.layout.master')
@section('content')
    <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100"
         data-appear-top-offset="600" data-parallax="scroll"
         data-image-src="{{asset('font_end/images/parallax/bgparallax-07.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-innerbannercontent">
                        <h1>Liên hệ với chúng tôi</h1>
                        <ol class="tg-breadcrumb">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('contact')}}">Liên hệ</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-sectionspace tg-haslayout">
        <div class="container">
            <section class="row">
                <article class="col-7">
                    <form action="">
                        <div class="form">
                            <h1>Form Liên hệ</h1>
                            <div class="">
                                <label for="">Họ và tên</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="">
                                <label for="">Địa chỉ email</label>
                                <input type="text" class="form-control"><br>
                            </div>
                            <div class="">
                                <label for="">Nội dung</label>
                                <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="button" style="margin-top: 15px">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </article>
                <article class="col-5" id="con">
                    <div style="padding-top: 20px ">
                        <h4>Book Library- Best Online Store</h4>
                        <p>Xóm 2, Tân Minh, Thường Tín, Hà Nội</p>
                        <p>Phone:  <span>0123456789</span></p>
                        <p>Thời gian mở cửa  <span>7:00 AM to 7:00 PM</span></p>

                        <span>Book Library của chúng tôi luôn đặt cái tâm và sự uy tín lên hàng đầu. Đảm bảo không có sách giả hay sách lậu ở cửa hàng chúng tôi</span>
                    </div>
                </article>

            </section>
        </div>
    </div>
@endsection
