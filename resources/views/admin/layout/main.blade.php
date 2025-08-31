<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Multipurpose, super flexible, powerful, clean modern responsive bootstrap 5 admin template"
        name="description" />
    <meta
        content="admin template, ki-admin admin template, dashboard template, flat admin template, responsive admin template, web app"
        name="keywords" />
    <meta content="la-themes" name="author" />
    <link href="{{ asset('/admin/assets/images/logo/favicon.png') }}" rel="icon" type="image/x-icon" />
    <link href="{{ asset('/admin/assets/images/logo/favicon.png') }}" rel="shortcut icon" type="image/x-icon" />
    <title>Ecommerce Dashboard | ki-admin - Premium Admin Template</title>

    <!-- Animation css -->
    <link href="{{ asset('/admin/assets/vendor/animation/animate.min.css') }}" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/3.34.1/tabler-icons.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/" rel="preconnect" />
    <link crossorigin href="https://fonts.gstatic.com/" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&amp;display=swap"
        rel="stylesheet" />

    <!--flag Icon css-->
    <link href="{{ asset('/admin/assets/vendor/flag-icons-master/flag-icon.css') }}" rel="stylesheet" type="text/css" />

    <!-- tabler icons-->


    <!-- apexcharts css-->
    <link href="{{ asset('/admin/assets/vendor/apexcharts/apexcharts.css') }}" rel="stylesheet" type="text/css" />

    <!-- glight css -->
    <link href="{{ asset('/admin/assets/vendor/glightbox/glightbox.min.css') }}" rel="stylesheet" />

    <!-- Bootstrap css-->
    <link href="{{ asset('/admin/assets/vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- simplebar css-->
    <link href="{{ asset('/admin/assets/vendor/simplebar/simplebar.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css-->
    <link href="{{ asset('/admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    <!-- Responsive css-->
    <link href="{{ asset('/admin/assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />


    <!-- Data Table css-->
    <link href="{{ asset('/admin/assets/vendor/datatable/jquery.dataTables.min.css') }}" rel="stylesheet"
        type="text/css" />
</head>

<body>
    <div class="app-wrapper">
        <div class="loader-wrapper">
            <div class="loader_24"></div>
        </div>

        <!-- Menu Navigation starts -->
        @include('admin.partials.sidebar')
        <!-- Menu Navigation ends -->

        <div class="app-content">
            <div class="">
                <!-- Header Section starts -->
                @include('admin.partials.header')
                <!-- Header Section ends -->

                <!-- Body main section starts -->
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
        <!-- Body main section ends -->

        <!-- tap on top -->
        <div class="go-top">
            <span class="progress-value">
                <i class="ti ti-chevron-up"></i>
            </span>
        </div>

        <!-- Footer Section starts-->
        {{-- @include('admin.partials.footer') --}}
        <!-- Footer Section ends-->
    </div>

    <!-- modal -->

    {{-- <div class="modal" data-bs-backdrop="static" id="welcomeCard" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content welcome-card">
                <div class="modal-body p-0">
                    <div>
                        <img alt="img" class="img-fluid"
                            src="{{ asset('/admin/assets/images/modals/welcome-bg.png') }}" />
                        <div>
                            <img src="{{ asset('/admin/assets/images/modals/welcome-rocket.png') }}"
                                class="modal-rocket img-fluid" alt="img" />
                        </div>
                    </div>
                    <div class="text-end position-absolute end-0 top-0 p-3">
                        <i class="ti ti-x fs-5 text-dark f-w-600" data-bs-dismiss="modal"></i>
                    </div>
                    <div class="text-center position-relative welcome-card-content z-1 p-3">
                        <h2 class="f-w-600">Welcome !👋</h2>
                        <h6 class="f-s-15 text-dark f-w-500 mx-0 mx-sm-5">
                            Start Multipurpose, clean modern responsive bootstrap 5 admin
                            template
                        </h6>
                        <ul class="modal-features-list">
                            <li class="btn btn-light-primary flex-fill">
                                Fully Responsive
                            </li>
                            <li class="btn btn-light-primary flex-fill">
                                Built with bootstrap 5
                            </li>
                            <li class="btn btn-light-primary flex-fill">scss support</li>
                            <li class="btn btn-light-primary flex-fill">
                                Light & Dark Mode
                            </li>
                            <li class="btn btn-light-primary flex-fill">Enjoy Started!</li>
                        </ul>
                        <div class="mt-3 mb-4">
                            <button class="btn btn-primary text-white btn-lg" data-bs-dismiss="modal" type="button">
                                Get Started <i class="ti ti-chevrons-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- modal -->

    <!--customizer-->
    <div id="customizer"></div>

    <!-- latest jquery-->
    <script src="{{ asset('/admin/assets/js/jquery-3.6.3.min.js') }}"></script>

    <!-- data table js -->
    <script src="{{ asset('/admin/assets/vendor/datatable/jquery.dataTables.min.js') }}"></script>

    <!-- js-->
    <script src="{{ asset('/admin/assets/js/data_table.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('/admin/assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- Simple bar js-->
    <script src="{{ asset('/admin/assets/vendor/simplebar/simplebar.js') }}"></script>

    <!-- phosphor js -->
    <script src="{{ asset('/admin/assets/vendor/phosphor/phosphor.js') }}"></script>

    <!-- Glight js -->
    <script src="{{ asset('/admin/assets/vendor/glightbox/glightbox.min.js') }}"></script>

    <!-- apexcharts-->
    <script src="{{ asset('/admin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Customizer js-->
    <script src="{{ asset('/admin/assets/js/customizer.js') }}"></script>

    <!-- Ecommerce js-->
    <script src="{{ asset('/admin/assets/js/ecommerce_dashboard.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('/admin/assets/js/script.js') }}"></script>

    @stack('scripts')
</body>

</html>
