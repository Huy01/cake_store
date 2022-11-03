@extends('admin_master') 
@section('title') 
    Add Product
@endsection 

@section('add_product')
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i
                class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true"
                id="iconSidenav"
            ></i>
            <a
                class="navbar-brand m-0"
                href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
                target="_blank"
            >
                <img
                    src="/images/pngegg.png"
                    class="navbar-brand-img h-100"
                    alt="main_logo"
                />
                <span class="ms-1 font-weight-bold text-white"
                    >Doggie Bakery</span
                >
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2" />
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('quantri')}}">
                        <div
                            class="text-white text-center me-2 d-flex align-items-center justify-content-center"
                        >
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link text-white "
                        href="{{route('users')}}"
                    >
                        <div
                            class="text-white text-center me-2 d-flex align-items-center justify-content-center"
                        >
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="{{'products'}}">
                        <div
                            class="text-white text-center me-2 d-flex align-items-center justify-content-center"
                        >
                            <i class="material-icons opacity-10"
                                >receipt_long</i
                            >
                        </div>
                        <span class="nav-link-text ms-1">Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link text-white"
                        href="../pages/virtual-reality.html"
                    >
                        <div
                            class="text-white text-center me-2 d-flex align-items-center justify-content-center"
                        >
                            <i class="material-icons opacity-10">view_in_ar</i>
                        </div>
                        <span class="nav-link-text ms-1">Virtual Reality</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('productsType')}}">
                        <div
                            class="text-white text-center me-2 d-flex align-items-center justify-content-center"
                        >
                            <i class="material-icons opacity-10"
                                >format_textdirection_r_to_l</i
                            >
                        </div>
                        <span class="nav-link-text ms-1">Type Product</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link text-white"
                        href="../pages/notifications.html"
                    >
                        <div
                            class="text-white text-center me-2 d-flex align-items-center justify-content-center"
                        >
                            <i class="material-icons opacity-10"
                                >notifications</i
                            >
                        </div>
                        <span class="nav-link-text ms-1">Notifications</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6
                        class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8"
                    >
                        Account pages
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../pages/profile.html">
                        <div
                            class="text-white text-center me-2 d-flex align-items-center justify-content-center"
                        >
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../pages/sign-in.html">
                        <div
                            class="text-white text-center me-2 d-flex align-items-center justify-content-center"
                        >
                            <i class="material-icons opacity-10">login</i>
                        </div>
                        <span class="nav-link-text ms-1">Sign In</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../pages/sign-up.html">
                        <div
                            class="text-white text-center me-2 d-flex align-items-center justify-content-center"
                        >
                            <i class="material-icons opacity-10">assignment</i>
                        </div>
                        <span class="nav-link-text ms-1">Sign Up</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0">
            <div class="mx-3">
                <a
                    class="btn bg-gradient-primary mt-4 w-100"
                    href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree"
                    type="button"
                    >Upgrade to pro</a
                >
            </div>
        </div>
    </aside>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav
            class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl"
            id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol
                        class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5"
                    >
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-5 text-dark" href="javascript:;"
                                >Pages</a
                            >
                        </li>
                        <li
                            class="breadcrumb-item text-sm text-dark active"
                            aria-current="page"
                        >
                            Products
                        </li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Add Product</h6>
                </nav>
                <div
                    class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4"
                    id="navbar"
                >
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a
                                href="../pages/sign-in.html"
                                class="nav-link text-body font-weight-bold px-0"
                            >
                                <i class="fa fa-user me-sm-1"></i>
                                @if(Auth::check())
                                <span class="d-sm-inline d-none"
                                    >Chào bạn {{Auth::user()->full_name}}</span
                                >
                                @endif
                            </a>
                        </li>
                        <li
                            class="nav-item d-xl-none ps-3 d-flex align-items-center"
                        >
                            <a
                                href="javascript:;"
                                class="nav-link text-body p-0"
                                id="iconNavbarSidenav"
                            >
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a
                                href="javascript:;"
                                class="nav-link text-body p-0"
                            >
                                <i
                                    class="fa fa-cog fixed-plugin-button-nav cursor-pointer"
                                ></i>
                            </a>
                        </li>
                        <li
                            class="nav-item dropdown pe-2 d-flex align-items-center"
                        >
                            <a
                                href="javascript:;"
                                class="nav-link text-body p-0"
                                id="dropdownMenuButton"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                            <ul
                                class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton"
                            >
                                <li class="mb-2">
                                    <a
                                        class="dropdown-item border-radius-md"
                                        href="javascript:;"
                                    >
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img
                                                    src="../assets/img/team-2.jpg"
                                                    class="avatar avatar-sm me-3"
                                                />
                                            </div>
                                            <div
                                                class="d-flex flex-column justify-content-center"
                                            >
                                                <h6
                                                    class="text-sm font-weight-normal mb-1"
                                                >
                                                    <span
                                                        class="font-weight-bold"
                                                        >New message</span
                                                    >
                                                    from Laur
                                                </h6>
                                                <p
                                                    class="text-xs text-secondary mb-0"
                                                >
                                                    <i
                                                        class="fa fa-clock me-1"
                                                    ></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a
                                        class="dropdown-item border-radius-md"
                                        href="javascript:;"
                                    >
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img
                                                    src="../assets/img/small-logos/logo-spotify.svg"
                                                    class="avatar avatar-sm bg-gradient-dark me-3"
                                                />
                                            </div>
                                            <div
                                                class="d-flex flex-column justify-content-center"
                                            >
                                                <h6
                                                    class="text-sm font-weight-normal mb-1"
                                                >
                                                    <span
                                                        class="font-weight-bold"
                                                        >New album</span
                                                    >
                                                    by Travis Scott
                                                </h6>
                                                <p
                                                    class="text-xs text-secondary mb-0"
                                                >
                                                    <i
                                                        class="fa fa-clock me-1"
                                                    ></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item border-radius-md"
                                        href="javascript:;"
                                    >
                                        <div class="d-flex py-1">
                                            <div
                                                class="avatar avatar-sm bg-gradient-secondary me-3 my-auto"
                                            >
                                                <svg
                                                    width="12px"
                                                    height="12px"
                                                    viewBox="0 0 43 36"
                                                    version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                >
                                                    <title>credit-card</title>
                                                    <g
                                                        stroke="none"
                                                        stroke-width="1"
                                                        fill="none"
                                                        fill-rule="evenodd"
                                                    >
                                                        <g
                                                            transform="translate(-2169.000000, -745.000000)"
                                                            fill="#FFFFFF"
                                                            fill-rule="nonzero"
                                                        >
                                                            <g
                                                                transform="translate(1716.000000, 291.000000)"
                                                            >
                                                                <g
                                                                    transform="translate(453.000000, 454.000000)"
                                                                >
                                                                    <path
                                                                        class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"
                                                                    ></path>
                                                                    <path
                                                                        class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"
                                                                    ></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div
                                                class="d-flex flex-column justify-content-center"
                                            >
                                                <h6
                                                    class="text-sm font-weight-normal mb-1"
                                                >
                                                    Payment successfully
                                                    completed
                                                </h6>
                                                <p
                                                    class="text-xs text-secondary mb-0"
                                                >
                                                    <i
                                                        class="fa fa-clock me-1"
                                                    ></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">
                                    Add Product
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="card my-4 col-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach 
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('add_product')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                @foreach($type_pr as $type)
                                    <input type="hidden" name="id_type" id="" class="form-control" value="{{$type->id_type}}">
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="" style="margin-left: 10px">Name*</label>
                                <input type="text" name="name" id="" class="form-control" placeholder="Product Name" style="margin-left: 10px">
                            </div>
                            <div class="form_control">
                                <label for="" style="margin-left: 10px">Product Type</label>
                                @if(isset($type_pr))
                                    <select class="form-control" name="id_type" id="" style="margin-left: 10px">
                                        @foreach($type_pr as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="" style="margin-left: 10px">Description*</label>
                                <input type="text" name="description" id="" class="form-control" placeholder="Description" style="margin-left: 10px">
                            </div>
                            <div class="form-group">
                                <label for="" style="margin-left: 10px">Unit Price*</label>
                                <input type="text" name="unit_price" id="" class="form-control" placeholder="Unit Price" style="margin-left: 10px">
                            </div>
                            <div class="form-group">
                                <label for="" style="margin-left: 10px">Promotion Price*</label>
                                <input type="text" name="promotion_price" id="" class="form-control" placeholder="Promotion Price" style="margin-left: 10px">
                            </div>
                            <div class="form-group">
                                <label for="" style="margin-left: 10px">Unit*</label>
                                <input type="text" name="unit" id="" class="form-control" placeholder="Unit" style="margin-left: 10px">
                            </div>
                            <div class="form-group" >
                                <label for="" style="margin-left: 10px">New*</label>
                                {{-- <input type="text" name="new" id="" class="form-control" placeholder="New" style="margin-left: 10px"> --}}
                                <select class="form-control" name="new" id="" style="margin-left: 10px">
                                        <option selected>Pick New</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="" style="margin-left: 10px">Image</label>
                                <input type="file" name="img" id="" class="form-control" placeholder="Image" onchange="changeImage(event)" style="margin-left: 10px">
                            </div>
                            <img id="img" src="" alt="" srcset="" style="width:10rem; margin-left: 10px">
                            <script type="text/javascript">
                                const changeImage=(e)=>{
                                    const img=document.getElementById("img");
                                    const file=e.target.files[0]
                                    img.src=URL.createObjectURL(file);
                                }
                            </script> 
                            <div class="button">
                                <button class="btn" type="submit" name="btnSubmit">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection