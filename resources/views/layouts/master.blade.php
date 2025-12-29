@php($path = asset('/'))
<!doctype html>

<html lang="{{ session()->get('locale') ?? app()->getLocale() }}" class="light-style layout-wide customizer-hide"
    dir="ltr" data-theme="theme-default" data-assets-path="{{ $path }}assets/"
    data-template="horizontal-menu-template-no-customizer" data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') | {{ config('variables.projectName') }}</title>

    <meta name="description"
        content="{{ config('variables.projectDescription') ? config('variables.projectDescription') : '' }}" />
    <meta name="keywords" content="{{ config('variables.projectKeyword') ? config('variables.projectKeyword') : '' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">


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
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/toastr/toastr.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/animate-css/animate.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/sweetalert2/sweetalert2.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet"
        href="{{ $path }}assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet"
        href="{{ $path }}assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet"
        href="{{ $path }}assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/datatables-select-bs5/select.bootstrap5.css" />
    <link rel="stylesheet"
        href="{{ $path }}assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet"
        href="{{ $path }}assets/vendor/libs/datatables-fixedcolumns-bs5/fixedcolumns.bootstrap5.css" />
    <link rel="stylesheet"
        href="{{ $path }}assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/spinkit/spinkit.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet"
        href="{{ $path }}assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />
    <link rel="stylesheet"
        href="{{ $path }}assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/jquery-timepicker/jquery-timepicker.css" />
    <link rel="stylesheet" href="{{ $path }}assets/vendor/libs/pickr/pickr-themes.css" />
    <script src="{{ $path }}assets/vendor/js/helpers.js"></script>
    <script src="{{ $path }}assets/js/config.js"></script>
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
            background-size: 7% auto;
        }

        /* Turn off scrollbar when body element has the loading class */
        body.loading {
            overflow: hidden;
        }

        /* Make spinner image visible when body element has the loading class */
        body.loading .overlay {
            display: block;
        }

        .border-left-primary {
            border-left: 7px solid #0A80B8;
        }

        .border-top-primary {
            border-top: 7px solid #0A80B8;
        }

        .toast-error {
            border-left: 5px solid red;
        }

        .toast-success {
            border-left: 5px solid green;
        }

        .toast-warning {
            border-left: 5px solid greenyellow;
        }

        .toast-info {
            border-left: 5px solid #17A2B8;
        }

        .border-left {
            border-left: 4px solid #17A2B8;
        }

        .c-border-top {
            border-top: 4px solid #17A2B8 !important;
        }

        .modal-content {
            border-left: 7px solid #5ca0b9;
        }

        .swal2-image {

            filter: brightness(0) saturate(100%) invert(49%) sepia(83%) saturate(562%) hue-rotate(328deg) brightness(99%) contrast(92%);
        }

        .swal2-title {
            margin-top: 0px !important;
        }

        .change-status {
            filter: brightness(0) saturate(100%) invert(41%) sepia(17%) saturate(902%) hue-rotate(174deg) brightness(93%) contrast(90%);
        }

        .flatpickr-calendar {
            /* To on the 2nd Modal */
            z-index: 1110 !important;
        }

        .light-style .swal2-container {
            z-index: 1120;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 4px solid #7367f0;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>
    @yield('styles')

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ $path }}assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ $path }}assets/js/config.js"></script>
</head>

<body>
    <div class="overlay"></div>
    <!-- Content -->


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            <!-- Navbar -->

            @include('layouts.components.header')

            <!-- / Navbar -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Menu -->
                    @include('layouts.components.navbar')
                    <!-- / Menu -->

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')

                    </div>
                    <!--/ Content -->

                    <!-- Footer -->
                    @include('layouts.components.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!--/ Content wrapper -->
            </div>

            <!--/ Layout container -->
        </div>
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
    @yield('modals')

    <div id="bind_modal"></div>

    <!--/ Layout wrapper -->

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
    <script src="{{ $path }}assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{ $path }}assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ $path }}assets/js/dashboards-crm.js"></script>
    <script src="{{ $path }}assets/vendor/libs/select2/select2.js"></script>

    <script src="{{ $path }}assets/vendor/libs/toastr/toastr.js"></script><!-- Page JS -->
    <script src="{{ $path }}assets/js/ui-toasts.js"></script>
    <script src="{{ $path }}assets/js/customjs/custome_validation.js" defer></script>
    <script src="{{ $path }}assets/js/customjs/generic.js" defer></script>
    <script>
        var token = "{{ Session::token() }}";

        function clearCache(route) {
            showAjaxLoader();

            $.get(route, function(result) {

                if (result.status) {
                    messageToaster("success", result.message, "Cleared");
                } else {
                    messageToaster("error", result.message, "Failed");
                }

                removeAjaxLoader();
            });
        }
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.change-lang').forEach(function(element) {
                element.addEventListener('click', function(event) {
                    event.preventDefault();
                    let lang = this.getAttribute('data-locale');
                    let route = this.getAttribute('data-route');

                    // If you want to send an AJAX request to change language
                    fetch(route, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": token,
                            },
                            body: JSON.stringify({
                                lang: lang
                            })
                        }).then(response => response.json())
                        .then(data => {
                            location.reload();
                            messageToaster("success", 'Language Changed Successfully',
                                "Success");
                        }).catch(error => {
                            messageToaster("error", 'Error changing language', "Failed");
                        });
                });
            });
        });


        $(function() {

            var searchInputWrapper = $('.search-input-wrapper'),
                searchInput = $('.search-input'),
                contentBackdrop = $('.content-backdrop');

            // Collect only valid links
            var linksData = [];
            $('.layout-container a').each(function() {
                var $this = $(this);
                var href = $this.attr('href');

                if (href &&
                    href.trim() !== '' &&
                    href !== '#' &&
                    !href.startsWith('javascript:')) {
                    linksData.push({
                        name: $this.text().trim(),
                        url: href
                    });
                }
            });

            // Filter function
            var filterConfig = function() {
                return function findMatches(q, cb) {
                    let matches = [];
                    linksData.forEach(function(link) {
                        if (link.name.toLowerCase().includes(q.toLowerCase())) {
                            matches.push(link);
                        }
                    });
                    cb(matches);
                };
            };

            // Initialize Typeahead
            if (searchInput.length) {
                searchInput.typeahead({
                        hint: false,
                        minLength: 1,
                        classNames: {
                            menu: 'tt-menu navbar-search-suggestion',
                            cursor: 'active',
                            suggestion: 'suggestion d-flex justify-content-between px-4 py-2 w-100'
                        }
                    }, {
                        name: 'links',
                        display: 'name',
                        limit: 10,
                        source: filterConfig(),
                        templates: {
                            suggestion: function(item) {
                                return `<a href="${item.url}"><div>${item.name}</div></a>`;
                            },
                            notFound: '<div class="not-found px-4 py-2">No Results Found</div>'
                        }
                    })
                    .bind('typeahead:render', function() {
                        contentBackdrop.addClass('show').removeClass('fade');
                    })
                    .bind('typeahead:select', function(ev, suggestion) {
                        if (suggestion.url) {
                            window.location = suggestion.url;
                        }
                    })
                    .bind('typeahead:close', function() {
                        searchInput.val('');
                        searchInputWrapper.addClass('d-none');
                        contentBackdrop.addClass('fade').removeClass('show');
                    });

                searchInput.on('keyup', function() {
                    if (searchInput.val() === '') {
                        contentBackdrop.addClass('fade').removeClass('show');
                    }
                });
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const dd = String(today.getDate()).padStart(2, '0');
            const formattedToday = `${yyyy}-${mm}-${dd}`;

            document.querySelectorAll('.cls_date').forEach(function(input) {
                if (!input.value) {
                    input.value = formattedToday;
                }
            });
        });
    </script>
    @yield('scripts')
</body>

</html>
