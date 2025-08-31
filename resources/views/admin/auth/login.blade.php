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

    <title>Sign Up Bg | ki-admin - Premium Admin Template</title>

    <link
        href="https://phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/assets/vendor/fontawesome/css/all.css"
        rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/" rel="preconnect" />
    <link crossorigin href="https://fonts.gstatic.com/" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&amp;display=swap"
        rel="stylesheet" />

    <!-- tabler icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/3.34.1/tabler-icons.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Bootstrap css-->
    <link href="{{ asset('/admin/assets/vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css-->
    <link href="{{ asset('/admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    <!-- Responsive css-->
    <link href="{{ asset('/admin/assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="app-wrapper d-block">
        <div class="">
            <!-- Body main section starts -->
            <main class="w-100 p-0">
                <!-- Create Account start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="login-form-container">
                                <div class="mb-4">
                                    <a class="logo" href="index.html">
                                        <img alt="#" src="{{ asset('/admin/assets/images/logo/3.png') }}" />
                                    </a>
                                </div>
                                <div class="form_container">

                                    <form action="/admin/login" method="POST" class="app-form p-3">
                                        @csrf
                                        <div class="mb-3 text-center">
                                            <h3>Create Account</h3>
                                            <p class="f-s-12 text-secondary">
                                                Get started For Free Today.
                                            </p>
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input class="form-control" placeholder="Enter Your Username"
                                                type="text" />
                                        </div> --}}
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control" name="email" placeholder="Enter Your Email"
                                                type="email" />

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control" name="password"
                                                placeholder="Enter Your Password" type="password" />

                                        </div>
                                        {{-- <div class="mb-3 form-check">
                                            <input class="form-check-input" id="formCheck1" type="checkbox" />
                                            <label class="form-check-label" for="formCheck1">remember me</label>
                                        </div> --}}
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div>
                                            <button class="btn btn-primary w-100" type="submit">Submit</button>
                                        </div>
                                        <div class="app-divider-v justify-content-center">
                                            <p>OR</p>
                                        </div>
                                        <div class="mb-3">
                                            <div class="text-center">
                                                <button class="btn btn-primary icon-btn b-r-5 m-1" type="button">
                                                    <i class="ti ti-brand-facebook text-white"></i>
                                                </button>
                                                <button class="btn btn-danger icon-btn b-r-5 m-1" type="button">
                                                    <i class="ti ti-brand-google text-white"></i>
                                                </button>
                                                <button class="btn btn-dark icon-btn b-r-5 m-1" type="button">
                                                    <i class="ti ti-brand-github text-white"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <a class="text-secondary text-decoration-underline"
                                                href="terms_condition.html">Terms of use &amp; Conditions</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Create Account end -->
            </main>
            <!-- Body main section ends -->
        </div>
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('/admin/assets/js/jquery-3.6.3.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('/admin/assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
