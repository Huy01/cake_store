@extends('master')
@section('content')
        <div class="inner-header">
            <div class="container">
                <div class="pull-left">
                    <h6 class="inner-title">Đặt hàng</h6>
                </div>
                <div class="pull-right">
                    <div class="beta-breadcrumb">
                        <a href="index.html">Trang chủ</a> /
                        <span>Đặt hàng</span>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="container">
            <div id="content">
                @if(Session::has('thongbao'))
                    <div class="alert alert-success" x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show">{{Session::get('thongbao')}}</div>
                @endif
                <form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                       
                        <div class="col-sm-6">
                            <h4>Đặt hàng</h4>
                            <div class="space20">&nbsp;</div>

                            <div class="form-block">
                                <label for="name">Họ tên*</label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    placeholder="Họ tên"
                                    required
                                />
                            </div>
                            <div class="form-block">
                                <label>Giới tính </label>
                                <input
                                    id="gender"
                                    type="radio"
                                    class="input-radio"
                                    name="gender"
                                    value="nam"
                                    checked="checked"
                                    style="width: 10%"
                                /><span style="margin-right: 10%">Nam</span>
                                <input
                                    id="gender"
                                    type="radio"
                                    class="input-radio"
                                    name="gender"
                                    value="nữ"
                                    style="width: 10%"
                                /><span>Nữ</span>
                            </div>

                            <div class="form-block">
                                <label for="email">Email*</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    required
                                    placeholder="expample@gmail.com"
                                />
                            </div>

                            <div class="form-block">
                                <label for="adress">Địa chỉ*</label>
                                <input
                                    type="text"
                                    id="adress"
                                    name="adress"
                                    placeholder="Street Address"
                                    required
                                />
                            </div>

                            <div class="form-block">
                                <label for="phone">Điện thoại*</label>
                                <input type="text" id="phone" name="phone" required />
                            </div>

                            <div class="form-block">
                                <label for="notes">Ghi chú</label>
                                <textarea id="notes" name="note"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="your-order">
                                <div class="your-order-head">
                                    <h5>Đơn hàng của bạn</h5>
                                </div>
                                <div
                                    class="your-order-body"
                                    style="padding: 0px 10px"
                                >
                                    <div class="your-order-item">
                                        <div>
                                        @if(Session::has('cart'))
                                        @foreach($product_cart as $cart)
                                            <!--  one item	 -->
                                            <div class="media">
                                                <img width="25%" src="source/image/product/{{$cart['item']['image']}}" alt="" class="pull-left"/>
                                                <div class="media-body">
                                                    <p class="font-large">
                                                        {{$cart['item']['name']}}
                                                    </p>
                                                    <span class="color-gray your-order-info">Đơn giá: {{number_format($cart['price'])}} đ</span>
                                                    <span class="color-gray your-order-info">Số lượng: {{$cart['qty']}}</span>
                                                    {{-- <span class="color-gray your-order-info">Qty: 1</span> --}}
                                                </div>
                                            </div>
                                            <!-- end one item -->
                                        @endforeach
                                        @endif
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="your-order-item">
                                        <div class="pull-left">
                                            <p class="your-order-f18">
                                                Tổng tiền:
                                            </p>
                                        </div>
                                        <div class="pull-right">
                                            <h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}}@else 0 @endif đồng</h5>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="your-order-head">
                                    <h5>Hình thức thanh toán</h5>
                                </div>

                                <div class="your-order-body">
                                    <ul class="payment_methods methods">
                                        <li class="payment_method_bacs">
                                            <input
                                                id="payment_method_bacs"
                                                type="radio"
                                                class="input-radio"
                                                name="payment_method"
                                                value="COD"
                                                checked="checked"
                                                data-order_button_text=""
                                                name="payment"
                                            />
                                            <label for="payment_method_bacs"
                                                >Thanh toán khi nhận hàng
                                            </label>
                                            <div
                                                class="payment_box payment_method_bacs"
                                                style="display: block"
                                            >
                                                Cửa hàng sẽ gửi hàng đến địa chỉ
                                                của bạn, bạn xem hàng rồi thanh
                                                toán tiền cho nhân viên giao
                                                hàng
                                            </div>
                                        </li>

                                        <li class="payment_method_cheque">
                                            <input
                                                id="payment_method_cheque"
                                                type="radio"
                                                class="input-radio"
                                                name="payment_method"
                                                value="ATM"
                                                data-order_button_text=""
                                                name="payment"
                                            />
                                            <label for="payment_method_cheque"
                                                >Chuyển khoản
                                            </label>
                                            <div
                                                class="payment_box payment_method_cheque"
                                                style="display: none"
                                            >
                                                Chuyển tiền đến tài khoản sau:
                                                <br />- Số tài khoản: 0231000684903
                                                <br />- Chủ TK: Phạm Quang Huy
                                                <br />- Ngân hàng Vietcombank
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="beta-btn primary" href="#"
                                        >Đặt hàng
                                        <i class="fa fa-chevron-right"></i
                                    ></button>
                                </div>
                            </div>
                            <!-- .your-order -->
                        </div>
                    </div>
                </form>
            </div>
            <!-- #content -->
        </div>
        <!-- .container -->

        <!-- .copyright -->

        <!-- include js files -->
        <script src="assets/dest/js/jquery.js"></script>
        <script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
        <script src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
        <script src="assets/dest/vendors/animo/Animo.js"></script>
        <script src="assets/dest/vendors/dug/dug.js"></script>
        <script src="assets/dest/js/scripts.min.js"></script>
        <!--customjs-->
        <script type="text/javascript">
            $(function () {
                // this will get the full URL at the address bar
                var url = window.location.href;

                // passes on every "a" tag
                $(".main-menu a").each(function () {
                    // checks if its the same on the address bar
                    if (url == this.href) {
                        $(this).closest("li").addClass("active");
                        $(this).parents("li").addClass("parent-active");
                    }
                });
            });
        </script>
        <script>
            jQuery(document).ready(function ($) {
                "use strict";

                // color box

                //color
                jQuery("#style-selector").animate({
                    left: "-213px",
                });

                jQuery("#style-selector a.close").click(function (e) {
                    e.preventDefault();
                    var div = jQuery("#style-selector");
                    if (div.css("left") === "-213px") {
                        jQuery("#style-selector").animate({
                            left: "0",
                        });
                        jQuery(this).removeClass("icon-angle-left");
                        jQuery(this).addClass("icon-angle-right");
                    } else {
                        jQuery("#style-selector").animate({
                            left: "-213px",
                        });
                        jQuery(this).removeClass("icon-angle-right");
                        jQuery(this).addClass("icon-angle-left");
                    }
                });
            });
        </script>
@endsection
