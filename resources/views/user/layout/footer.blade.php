<footer id="tg-footer" class="tg-footer tg-haslayout">
    <div class="tg-footerarea">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="tg-clientservices">
                        <li class="tg-devlivery">
                            <span class="tg-clientserviceicon"><i class="icon-rocket"></i></span>
                            <div class="tg-titlesubtitle">
                                <h3>Chuyển phát nhanh</h3>
                                <p>Ship toàn quốc</p>
                            </div>
                        </li>
                        <li class="tg-discount">
                            <span class="tg-clientserviceicon"><i class="icon-tag"></i></span>
                            <div class="tg-titlesubtitle">
                                <h3>Mở giảm giá</h3>
                                <p>Cung cấp nhiều mã giảm giá</p>
                            </div>
                        </li>
                        <li class="tg-quality">
                            <span class="tg-clientserviceicon"><i class="icon-leaf"></i></span>
                            <div class="tg-titlesubtitle">
                                <h3>Để ý đến chất lượng</h3>
                                <p>Xuất bản tác phẩm chất lượng</p>
                            </div>
                        </li>
                        <li class="tg-support" style="margin-top: 20px">
                            <span class="tg-clientserviceicon"><i class="icon-heart"></i></span>
                            <div class="tg-titlesubtitle">
                                <h3>Hỗ trợ 24/7</h3>
                                <p>Phục vụ mọi lúc </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="tg-threecolumns">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="tg-footercol">
                            <strong class="tg-logo"><a href="javascript:void(0);"><img src="{{asset('font_end/images/flogo.png')}}" alt="image description"></a></strong>
                            <ul class="tg-contactinfo">
                                <li>
                                    <i class="icon-apartment"></i>
                                    <address>Xóm 2 , Triều Đông, Tân Minh, Thường Tín, Hà Nội</address>
                                </li>
                                <li>
                                    <i class="icon-phone-handset"></i>
                                    <span>
												<em>0967124921</em>
												<em>+84967124921</em>
											</span>
                                </li>
                                <li>
                                    <i class="icon-clock"></i>
                                    <span>Phục vụ mỗi ngày từ thứ 2 đến chủ nhật</span>
                                </li>
                                <li>
                                    <i class="icon-envelope"></i>
                                    <span>
												<em><a href="mailto:support@domain.com">book@domain.com</a></em>
												<em><a href="mailto:info@domain.com">info@domain.com</a></em>
											</span>
                                </li>
                            </ul>
                            <ul class="tg-socialicons">
                                <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                <li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
                                <li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="tg-footercol tg-widget tg-widgetnavigation">
                            <div class="tg-widgettitle">
                                <h3>Thông Tin Vận Chuyển Và Trợ Giúp</h3>
                            </div>
                            <div class="tg-widgetcontent">
                                <ul>
                                    <li><a href="javascript:void(0);">Điều khoản sử dụng</a></li>
                                    <li><a href="javascript:void(0);">Điều khoản bán hàng</a></li>
                                </ul>
                                <ul>
                                    <li><a href="javascript:void(0);">Câu hỏi thường gặp</a></li>
                                    <li><a href="javascript:void(0);">Gia nhập đội ngũ của chúng tôi</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="tg-footercol tg-widget tg-widgettopsellingauthors">
                            <div class="tg-widgettitle">
                                <h3>Tác giả bán chạy nhất</h3>
                            </div>
                            <div class="tg-widgetcontent">
                                <ul>
                                   @foreach($topauthor as $au)
                                        <li>
                                            <figure><a href="{{route('author_detail', $au->id)}}"><img style="width: 150px; height: 150px" src="{{asset($au->image)}}" alt="image description"></a></figure>
                                            <div class="tg-authornamebooks">
                                                <h4><a href="javascript:void(0);">{{$au->name}}</a></h4>
                                                <p>{{$au->book_count}} cuốn sách được xuất bản</p>
                                            </div>
                                        </li>
                                   @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-footerbar">
        <a id="tg-btnbacktotop" class="tg-btnbacktotop" href="javascript:void(0);"><i class="icon-chevron-up"></i></a>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="tg-paymenttype"><img src="{{asset('font_end/images/paymenticon.png')}}" alt="image description"></span>
                    <span class="tg-copyright">2017 All Rights Reserved By &copy; Book Library</span>
                </div>
            </div>
        </div>
    </div>
</footer>
