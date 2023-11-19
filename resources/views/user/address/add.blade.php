<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background: #efefef;
        }

        .container {
            margin-top: 20px;
        }

        .title h1 {
            color: #5cb85c;
        }

        .header img {
            width: 250px;
        }

        .hotline {
            color: #1cc88a;
        }

        .box-content {
            margin-top: 25px;
            padding: 10px;
            background-color: white;
        }

        .box-content .title {
            text-align: center;

            padding: 5px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.25);
        }

        .title h2 {
            font-size: 20px;
            text-transform: uppercase;
        }

        .item {
            margin-bottom: 15px;
            margin-top: 15px;
        }

        .submit {
            text-align: center;

            margin-top: 15px;
        }

        .form {
            margin: 20px 0;
        }

        span {
            color: red;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="header row">
        <div class="col-4">
            <img src="{{asset('font_end/images/logo.png')}}" alt="">
        </div>
        <div class="col-6 title">
            <h1>Điền Thông Tin</h1>
        </div>
        <div class="col-2">
            <span class="hotline">0967124921</span><br>
            <span>Hotline</span>
        </div>
    </div>
    <div class="content ">
        <form class="row" action="{{route('addAddress')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-3"></div>
            <div class="box-content col-6">
                <div class="title">
                    <h2>Địa Chỉ Giao Hàng</h2>
                </div>


                <div class="box-content row">
                    <div>
                        <div class="row form">
                            <div class="col-4">
                                <label for="">Họ và tên <span>*</span></label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="order_name" value="{{old('order_name')}}">
                                @error('order_name')
                                <p style="color: red">{{$message}}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="row form">
                            <div class="col-4">
                                <label for="">Email nhận đơn hàng <span>*</span></label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="order_email" value="{{old('order_email')}}">
                                @error('order_email')
                                <p style="color: red">{{$message}}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="row form">
                            <div class="col-4">
                                <label for="">Tỉnh/Thành phố<span>*</span></label>
                            </div>
                            <div class="col-8">
                                <select class="form-control" id="city" name="city">
                                    <option value="" selected> Chọn tỉnh thành</option>
                                </select>
                                @error('city')
                                <p style="color: red">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row form">
                            <div class="col-4">
                                <label for="">Quận/Huyện <span>*</span></label>
                            </div>
                            <div class="col-8">
                                <select class="form-control" id="district" name="district">
                                    <option value="" selected> Chọn quận huyện</option>
                                </select>
                                @error('district')
                                <p style="color: red">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row form">
                            <div class="col-4">
                                <label for="">Xã/Phường<span>*</span></label>
                            </div>
                            <div class="col-8">
                                <select id="ward" class="form-control" name="ward">
                                    <option value="" selected>Chọn phường xã</option>
                                </select>
                                @error('ward')
                                <p style="color: red">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row form">
                            <div class="col-4">
                                <label for="">Số nhà & tên đường<span>*</span></label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="sonha" value="{{old('sonha')}}" >
                            </div>
                        </div>
                        <div class="row form">
                            <div class="col-4">
                                <label for="">Số điện thoại nhận hàng<span>*</span></label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="order_phone" value="{{old('order_phone')}}">
                                @error('order_phone')
                                <p style="color: red">{{$message}}</p>
                                @enderror
                            </div>

                        </div>
                        <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
                    </div>
                </div>


            </div>
            <div class="col-3"></div>
            <div class="submit">
                <button class="btn btn-success" type="submit">Xác nhân</button>
            </div>
        </form>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>

    const host = "https://provinces.open-api.vn/api/";
    var callAPI = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data, "city");
            });
    }
    callAPI('https://provinces.open-api.vn/api/?depth=1');
    var callApiDistrict = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.districts, "district");
            });
    }
    var callApiWard = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.wards, "ward");
            });
    }

    var renderData = (array, select) => {
        let row = ' <option disable value="">Chọn</option>';
        array.forEach(element => {
            row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
        });
        document.querySelector("#" + select).innerHTML = row
    }

    $("#city").change(() => {
        callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
        printResult();
    });
    $("#district").change(() => {
        callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
        printResult();
    });
    $("#ward").change(() => {
        printResult();
    })

    var printResult = () => {
        if ($("#district").find(':selected').data('id') != "" && $("#city").find(':selected').data('id') != "" &&
            $("#ward").find(':selected').data('id') != "") {
            let result = $("#city option:selected").text() +
                " | " + $("#district option:selected").text() + " | " +
                $("#ward option:selected").text();
            $("#result").text(result)
        }
    };




</script>

</body>
</html>

