@extends('admin_master')
@section('head')
    Đăng nhập quản trị
@endsection
@section('content')
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ url('/images/login_interface.png') }}" alt="IMG">
                </div>
                <!--=====TIÊU ĐỀ======-->
                <form class="login100-form validate-form">
                    <span class="login100-form-title">
                        <b>ĐĂNG NHẬP HỆ THỐNG</b>
                    </span>
                    <!--=====FORM INPUT TÀI KHOẢN VÀ PASSWORD======-->
                    <form action="">
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" placeholder="Tài khoản quản trị" name="username"
                                id="username">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class='bx bx-user'></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input">
                            <input autocomplete="off" class="input100" type="password" placeholder="Mật khẩu"
                                name="current-password" id="password-field">
                            <span toggle="#password-field" class="bx fa-fw bx-hide field-icon click-eye"></span>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class='bx bx-key'></i>
                            </span>
                        </div>

                        <!--=====ĐĂNG NHẬP======-->
                        <div class="container-login100-form-btn">
                            <input type="button" value="Đăng nhập" id="submit" onclick="validate()" />
                        </div>
                        <!--=====LINK TÌM MẬT KHẨU======-->
                        <div class="text-right p-t-12">
                            <a class="txt2" href="{{route('quenmk')}}">
                                Bạn quên mật khẩu?
                            </a>
                        </div>
                    </form>
                    <!--=====FOOTER======-->
                    <div class="text-center p-t-70 txt2">
                        Phần mềm quản lý bán hàng <i class="far fa-copyright" aria-hidden="true"></i>
                        <script type="text/javascript">document.write(new Date().getFullYear());</script> <a
                            class="txt2" href="https://www.facebook.com/huy.huy01"> Code bởi Huy </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection