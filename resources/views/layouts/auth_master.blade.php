@php($path = asset('/'))
<!doctype html>


<html
    lang="{{ session()->get('locale') ?? app()->getLocale() }}"
    class="light-style layout-wide customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{ $path }}assets/"
    data-template="horizontal-menu-template-no-customizer"
    data-style="light">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') | {{ config('variables.projectName') }}</title>

    <meta name="description" content="{{ config('variables.projectDescription') ? config('variables.projectDescription') : '' }}" />
    <meta name="keywords" content="{{ config('variables.projectKeyword') ? config('variables.projectKeyword') : '' }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ $path }}assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ $path }}assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->

    <link rel="stylesheet" href="{{ $path }}assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/css/rtl/theme-default.css" />

    <link rel="stylesheet" href="{{ $path }}assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/node-waves/node-waves.css" />

    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/@form-validation/form-validation.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ $path }}assets/vendor/css/pages/page-auth.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/toastr/toastr.css" />
    <style>
        .overlay {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 9999;
            background: rgba(255, 255, 255, 0.8) url("{{ $path }}assets/img/loader2.gif") center no-repeat;
            background-size: 10% auto;
        }

        /* Turn off scrollbar when body element has the loading class */
        body.loading {
            overflow: hidden;
        }

        /* Make spinner image visible when body element has the loading class */
        body.loading .overlay {
            display: block;
        }
    </style>
    @yield('styles')

    <!-- Helpers -->
    <script src="{{ $path }}assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ $path }}assets/js/config.js"></script>
</head>

<body>
    <div class="overlay"></div>
    <!-- Content -->

    @yield('content')

    @yield('modals')


    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ $path }}assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ $path }}assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ $path }}assets/vendor/js/bootstrap.js"></script>
    <script src="{{ $path }}assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="{{ $path }}assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ $path }}assets/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ $path }}assets/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ $path }}assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ $path }}assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ $path }}assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="{{ $path }}assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="{{ $path }}assets/vendor/libs/@form-validation/auto-focus.js"></script>

    <!-- Main JS -->
    <script src="{{ $path }}assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ $path }}assets/js/pages-auth.js"></script>
    <script src="{{ $path }}assets/vendor/libs/toastr/toastr.js"></script><!-- Page JS -->
    <script src="{{ $path }}assets/js/ui-toasts.js"></script>
    <script src="{{ $path }}assets/js/customjs/custome_validation.js" defer></script>
    <script src="{{ $path }}assets/js/customjs/generic.js" defer></script>
    <script>
        var token = "{{ Session::token() }}";
    </script>
    @yield('scripts')
</body>

</html>
