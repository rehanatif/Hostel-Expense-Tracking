 <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
     <div class="container-xxl">
         <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
             <a href="index.html" class="app-brand-link">
                 <img src="{{ $path }}assets/img/excelorith.png" style="width: 200px;" alt="">
             </a>

             <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
                 <i class="ti ti-x ti-md align-middle"></i>
             </a>
         </div>

         <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
             <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                 <i class="ti ti-menu-2 ti-md"></i>
             </a>
         </div>

         <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
             <ul class="navbar-nav flex-row align-items-center ms-auto">
                 <!-- Search -->
                 <li class="nav-item navbar-search-wrapper">
                     <a
                         class="nav-link btn btn-text-secondary btn-icon rounded-pill search-toggler"
                         href="javascript:void(0);">
                         <i class="ti ti-search ti-md"></i>
                     </a>
                 </li>
                 <!-- /Search -->

                 <!-- Language -->
                 <li class="nav-item dropdown-language dropdown">
                     <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow language_change"
                         href="javascript:void(0);"
                         data-bs-toggle="dropdown">
                         @if (session()->get('locale') === 'en')
                         <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             width="40" zoomAndPan="magnify" viewBox="0 0 30 30.000001" height="29"
                             preserveAspectRatio="xMidYMid meet" version="1.0">
                             <defs>
                                 <clipPath id="id1">
                                     <path
                                         d="M 2.511719 6.402344 L 27.191406 6.402344 L 27.191406 24.546875 L 2.511719 24.546875 Z M 2.511719 6.402344 "
                                         clip-rule="nonzero" />
                                 </clipPath>
                             </defs>
                             <g clip-path="url(#id1)">
                                 <path fill="rgb(0%, 14.118958%, 49.01886%)"
                                     d="M 2.519531 9.234375 L 2.519531 11.984375 L 6.375 11.984375 Z M 5.714844 24.546875 L 11.425781 24.546875 L 11.425781 20.472656 Z M 18.277344 20.472656 L 18.277344 24.546875 L 23.984375 24.546875 Z M 2.519531 18.964844 L 2.519531 21.714844 L 6.378906 18.964844 Z M 23.988281 6.402344 L 18.277344 6.402344 L 18.277344 10.472656 Z M 27.183594 21.714844 L 27.183594 18.964844 L 23.324219 18.964844 Z M 27.183594 11.984375 L 27.183594 9.234375 L 23.324219 11.984375 Z M 11.425781 6.402344 L 5.714844 6.402344 L 11.425781 10.472656 Z M 11.425781 6.402344 "
                                     fill-opacity="1" fill-rule="nonzero" />
                                 <path fill="rgb(81.17981%, 10.5896%, 16.859436%)"
                                     d="M 19.742188 18.964844 L 26.394531 23.710938 C 26.71875 23.375 26.949219 22.953125 27.074219 22.488281 L 22.132812 18.964844 Z M 11.425781 18.964844 L 9.960938 18.964844 L 3.304688 23.707031 C 3.664062 24.078125 4.121094 24.34375 4.632812 24.464844 L 11.425781 19.621094 Z M 18.277344 11.984375 L 19.742188 11.984375 L 26.394531 7.238281 C 26.039062 6.867188 25.582031 6.605469 25.070312 6.480469 L 18.277344 11.324219 Z M 9.960938 11.984375 L 3.304688 7.238281 C 2.984375 7.574219 2.753906 7.992188 2.628906 8.460938 L 7.570312 11.984375 Z M 9.960938 11.984375 "
                                     fill-opacity="1" fill-rule="nonzero" />
                                 <path fill="rgb(93.328857%, 93.328857%, 93.328857%)"
                                     d="M 27.183594 17.566406 L 16.90625 17.566406 L 16.90625 24.546875 L 18.277344 24.546875 L 18.277344 20.472656 L 23.984375 24.546875 L 24.441406 24.546875 C 25.207031 24.546875 25.898438 24.222656 26.394531 23.710938 L 19.742188 18.964844 L 22.132812 18.964844 L 27.074219 22.488281 C 27.136719 22.253906 27.183594 22.011719 27.183594 21.753906 L 27.183594 21.714844 L 23.324219 18.964844 L 27.183594 18.964844 Z M 2.519531 17.566406 L 2.519531 18.964844 L 6.378906 18.964844 L 2.519531 21.714844 L 2.519531 21.753906 C 2.519531 22.515625 2.820312 23.203125 3.304688 23.707031 L 9.960938 18.964844 L 11.425781 18.964844 L 11.425781 19.621094 L 4.632812 24.464844 C 4.835938 24.515625 5.042969 24.546875 5.261719 24.546875 L 5.714844 24.546875 L 11.425781 20.472656 L 11.425781 24.546875 L 12.796875 24.546875 L 12.796875 17.566406 Z M 27.183594 9.191406 C 27.183594 8.429688 26.882812 7.742188 26.394531 7.238281 L 19.742188 11.984375 L 18.277344 11.984375 L 18.277344 11.324219 L 25.070312 6.480469 C 24.867188 6.433594 24.660156 6.402344 24.441406 6.402344 L 23.988281 6.402344 L 18.277344 10.472656 L 18.277344 6.402344 L 16.90625 6.402344 L 16.90625 13.378906 L 27.183594 13.378906 L 27.183594 11.984375 L 23.324219 11.984375 L 27.183594 9.234375 Z M 11.425781 6.402344 L 11.425781 10.472656 L 5.714844 6.402344 L 5.261719 6.402344 C 4.496094 6.402344 3.804688 6.722656 3.304688 7.238281 L 9.960938 11.984375 L 7.570312 11.984375 L 2.628906 8.460938 C 2.566406 8.695312 2.519531 8.9375 2.519531 9.191406 L 2.519531 9.234375 L 6.375 11.984375 L 2.519531 11.984375 L 2.519531 13.378906 L 12.796875 13.378906 L 12.796875 6.402344 Z M 11.425781 6.402344 "
                                     fill-opacity="1" fill-rule="nonzero" />
                                 <path fill="rgb(81.17981%, 10.5896%, 16.859436%)"
                                     d="M 16.90625 13.378906 L 16.90625 6.402344 L 12.796875 6.402344 L 12.796875 13.378906 L 2.519531 13.378906 L 2.519531 17.566406 L 12.796875 17.566406 L 12.796875 24.546875 L 16.90625 24.546875 L 16.90625 17.566406 L 27.183594 17.566406 L 27.183594 13.378906 Z M 16.90625 13.378906 "
                                     fill-opacity="1" fill-rule="nonzero" />
                             </g>
                         </svg>
                         @elseif(session()->get('locale') === 'ja')
                         <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             width="40" zoomAndPan="magnify" viewBox="0 0 30 30.000001" height="29"
                             preserveAspectRatio="xMidYMid meet" version="1.0">
                             <defs>
                                 <clipPath id="id1">
                                     <path
                                         d="M 2.226562 6.132812 L 27.628906 6.132812 L 27.628906 24.277344 L 2.226562 24.277344 Z M 2.226562 6.132812 "
                                         clip-rule="nonzero" />
                                 </clipPath>
                             </defs>
                             <g clip-path="url(#id1)">
                                 <path fill="rgb(93.328857%, 93.328857%, 93.328857%)"
                                     d="M 27.621094 21.488281 C 27.621094 23.027344 26.359375 24.277344 24.800781 24.277344 L 5.054688 24.277344 C 3.496094 24.277344 2.234375 23.027344 2.234375 21.488281 L 2.234375 8.925781 C 2.234375 7.382812 3.496094 6.132812 5.054688 6.132812 L 24.800781 6.132812 C 26.359375 6.132812 27.621094 7.382812 27.621094 8.925781 Z M 27.621094 21.488281 "
                                     fill-opacity="1" fill-rule="nonzero" />
                             </g>
                             <path fill="rgb(92.939758%, 10.5896%, 18.429565%)"
                                 d="M 19.863281 15.207031 C 19.863281 15.527344 19.832031 15.84375 19.769531 16.160156 C 19.707031 16.472656 19.613281 16.78125 19.488281 17.074219 C 19.363281 17.371094 19.210938 17.652344 19.03125 17.921875 C 18.851562 18.1875 18.648438 18.433594 18.417969 18.660156 C 18.1875 18.886719 17.941406 19.089844 17.671875 19.269531 C 17.402344 19.445312 17.117188 19.597656 16.816406 19.71875 C 16.515625 19.84375 16.207031 19.933594 15.890625 19.996094 C 15.574219 20.058594 15.25 20.089844 14.925781 20.089844 C 14.601562 20.089844 14.28125 20.058594 13.964844 19.996094 C 13.644531 19.933594 13.335938 19.84375 13.039062 19.71875 C 12.738281 19.597656 12.453125 19.445312 12.183594 19.269531 C 11.914062 19.089844 11.664062 18.886719 11.4375 18.660156 C 11.207031 18.433594 11.003906 18.1875 10.824219 17.921875 C 10.644531 17.652344 10.492188 17.371094 10.367188 17.074219 C 10.242188 16.78125 10.148438 16.472656 10.085938 16.160156 C 10.023438 15.84375 9.992188 15.527344 9.992188 15.207031 C 9.992188 14.886719 10.023438 14.566406 10.085938 14.253906 C 10.148438 13.9375 10.242188 13.632812 10.367188 13.335938 C 10.492188 13.039062 10.644531 12.757812 10.824219 12.492188 C 11.003906 12.226562 11.207031 11.980469 11.4375 11.75 C 11.664062 11.523438 11.914062 11.324219 12.183594 11.144531 C 12.453125 10.964844 12.738281 10.816406 13.039062 10.691406 C 13.335938 10.570312 13.644531 10.476562 13.964844 10.414062 C 14.28125 10.351562 14.601562 10.320312 14.925781 10.320312 C 15.25 10.320312 15.574219 10.351562 15.890625 10.414062 C 16.207031 10.476562 16.515625 10.570312 16.816406 10.691406 C 17.117188 10.816406 17.402344 10.964844 17.671875 11.144531 C 17.941406 11.324219 18.1875 11.523438 18.417969 11.75 C 18.648438 11.980469 18.851562 12.226562 19.03125 12.492188 C 19.210938 12.757812 19.363281 13.039062 19.488281 13.335938 C 19.613281 13.632812 19.707031 13.9375 19.769531 14.253906 C 19.832031 14.566406 19.863281 14.886719 19.863281 15.207031 Z M 19.863281 15.207031 "
                                 fill-opacity="1" fill-rule="nonzero" />
                         </svg>

                         @endif
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end">
                         <li class="change-lang" data-locale="en" data-route="{{ route('admin.changeLocalization') }}">
                             <a class="dropdown-item @if (session()->get('locale') === 'en') active @endif" href="javascript:void(0);">
                                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="40" zoomAndPan="magnify" viewBox="0 0 30 30.000001" height="29"
                                     preserveAspectRatio="xMidYMid meet" version="1.0">
                                     <defs>
                                         <clipPath id="id1">
                                             <path
                                                 d="M 2.511719 6.402344 L 27.191406 6.402344 L 27.191406 24.546875 L 2.511719 24.546875 Z M 2.511719 6.402344 "
                                                 clip-rule="nonzero" />
                                         </clipPath>
                                     </defs>
                                     <g clip-path="url(#id1)">
                                         <path fill="rgb(0%, 14.118958%, 49.01886%)"
                                             d="M 2.519531 9.234375 L 2.519531 11.984375 L 6.375 11.984375 Z M 5.714844 24.546875 L 11.425781 24.546875 L 11.425781 20.472656 Z M 18.277344 20.472656 L 18.277344 24.546875 L 23.984375 24.546875 Z M 2.519531 18.964844 L 2.519531 21.714844 L 6.378906 18.964844 Z M 23.988281 6.402344 L 18.277344 6.402344 L 18.277344 10.472656 Z M 27.183594 21.714844 L 27.183594 18.964844 L 23.324219 18.964844 Z M 27.183594 11.984375 L 27.183594 9.234375 L 23.324219 11.984375 Z M 11.425781 6.402344 L 5.714844 6.402344 L 11.425781 10.472656 Z M 11.425781 6.402344 "
                                             fill-opacity="1" fill-rule="nonzero" />
                                         <path fill="rgb(81.17981%, 10.5896%, 16.859436%)"
                                             d="M 19.742188 18.964844 L 26.394531 23.710938 C 26.71875 23.375 26.949219 22.953125 27.074219 22.488281 L 22.132812 18.964844 Z M 11.425781 18.964844 L 9.960938 18.964844 L 3.304688 23.707031 C 3.664062 24.078125 4.121094 24.34375 4.632812 24.464844 L 11.425781 19.621094 Z M 18.277344 11.984375 L 19.742188 11.984375 L 26.394531 7.238281 C 26.039062 6.867188 25.582031 6.605469 25.070312 6.480469 L 18.277344 11.324219 Z M 9.960938 11.984375 L 3.304688 7.238281 C 2.984375 7.574219 2.753906 7.992188 2.628906 8.460938 L 7.570312 11.984375 Z M 9.960938 11.984375 "
                                             fill-opacity="1" fill-rule="nonzero" />
                                         <path fill="rgb(93.328857%, 93.328857%, 93.328857%)"
                                             d="M 27.183594 17.566406 L 16.90625 17.566406 L 16.90625 24.546875 L 18.277344 24.546875 L 18.277344 20.472656 L 23.984375 24.546875 L 24.441406 24.546875 C 25.207031 24.546875 25.898438 24.222656 26.394531 23.710938 L 19.742188 18.964844 L 22.132812 18.964844 L 27.074219 22.488281 C 27.136719 22.253906 27.183594 22.011719 27.183594 21.753906 L 27.183594 21.714844 L 23.324219 18.964844 L 27.183594 18.964844 Z M 2.519531 17.566406 L 2.519531 18.964844 L 6.378906 18.964844 L 2.519531 21.714844 L 2.519531 21.753906 C 2.519531 22.515625 2.820312 23.203125 3.304688 23.707031 L 9.960938 18.964844 L 11.425781 18.964844 L 11.425781 19.621094 L 4.632812 24.464844 C 4.835938 24.515625 5.042969 24.546875 5.261719 24.546875 L 5.714844 24.546875 L 11.425781 20.472656 L 11.425781 24.546875 L 12.796875 24.546875 L 12.796875 17.566406 Z M 27.183594 9.191406 C 27.183594 8.429688 26.882812 7.742188 26.394531 7.238281 L 19.742188 11.984375 L 18.277344 11.984375 L 18.277344 11.324219 L 25.070312 6.480469 C 24.867188 6.433594 24.660156 6.402344 24.441406 6.402344 L 23.988281 6.402344 L 18.277344 10.472656 L 18.277344 6.402344 L 16.90625 6.402344 L 16.90625 13.378906 L 27.183594 13.378906 L 27.183594 11.984375 L 23.324219 11.984375 L 27.183594 9.234375 Z M 11.425781 6.402344 L 11.425781 10.472656 L 5.714844 6.402344 L 5.261719 6.402344 C 4.496094 6.402344 3.804688 6.722656 3.304688 7.238281 L 9.960938 11.984375 L 7.570312 11.984375 L 2.628906 8.460938 C 2.566406 8.695312 2.519531 8.9375 2.519531 9.191406 L 2.519531 9.234375 L 6.375 11.984375 L 2.519531 11.984375 L 2.519531 13.378906 L 12.796875 13.378906 L 12.796875 6.402344 Z M 11.425781 6.402344 "
                                             fill-opacity="1" fill-rule="nonzero" />
                                         <path fill="rgb(81.17981%, 10.5896%, 16.859436%)"
                                             d="M 16.90625 13.378906 L 16.90625 6.402344 L 12.796875 6.402344 L 12.796875 13.378906 L 2.519531 13.378906 L 2.519531 17.566406 L 12.796875 17.566406 L 12.796875 24.546875 L 16.90625 24.546875 L 16.90625 17.566406 L 27.183594 17.566406 L 27.183594 13.378906 Z M 16.90625 13.378906 "
                                             fill-opacity="1" fill-rule="nonzero" />
                                     </g>
                                 </svg>
                                 <span>@lang('languages.English')</span>
                             </a>
                         </li>
                         <li class="change-lang" data-locale="ja" data-route="{{ route('admin.changeLocalization') }}">
                             <a class="dropdown-item @if (session()->get('locale') === 'ja') active @endif" href="javascript:void(0);">
                                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="40" zoomAndPan="magnify" viewBox="0 0 30 30.000001" height="29"
                                     preserveAspectRatio="xMidYMid meet" version="1.0">
                                     <defs>
                                         <clipPath id="id1">
                                             <path
                                                 d="M 2.226562 6.132812 L 27.628906 6.132812 L 27.628906 24.277344 L 2.226562 24.277344 Z M 2.226562 6.132812 "
                                                 clip-rule="nonzero" />
                                         </clipPath>
                                     </defs>
                                     <g clip-path="url(#id1)">
                                         <path fill="rgb(93.328857%, 93.328857%, 93.328857%)"
                                             d="M 27.621094 21.488281 C 27.621094 23.027344 26.359375 24.277344 24.800781 24.277344 L 5.054688 24.277344 C 3.496094 24.277344 2.234375 23.027344 2.234375 21.488281 L 2.234375 8.925781 C 2.234375 7.382812 3.496094 6.132812 5.054688 6.132812 L 24.800781 6.132812 C 26.359375 6.132812 27.621094 7.382812 27.621094 8.925781 Z M 27.621094 21.488281 "
                                             fill-opacity="1" fill-rule="nonzero" />
                                     </g>
                                     <path fill="rgb(92.939758%, 10.5896%, 18.429565%)"
                                         d="M 19.863281 15.207031 C 19.863281 15.527344 19.832031 15.84375 19.769531 16.160156 C 19.707031 16.472656 19.613281 16.78125 19.488281 17.074219 C 19.363281 17.371094 19.210938 17.652344 19.03125 17.921875 C 18.851562 18.1875 18.648438 18.433594 18.417969 18.660156 C 18.1875 18.886719 17.941406 19.089844 17.671875 19.269531 C 17.402344 19.445312 17.117188 19.597656 16.816406 19.71875 C 16.515625 19.84375 16.207031 19.933594 15.890625 19.996094 C 15.574219 20.058594 15.25 20.089844 14.925781 20.089844 C 14.601562 20.089844 14.28125 20.058594 13.964844 19.996094 C 13.644531 19.933594 13.335938 19.84375 13.039062 19.71875 C 12.738281 19.597656 12.453125 19.445312 12.183594 19.269531 C 11.914062 19.089844 11.664062 18.886719 11.4375 18.660156 C 11.207031 18.433594 11.003906 18.1875 10.824219 17.921875 C 10.644531 17.652344 10.492188 17.371094 10.367188 17.074219 C 10.242188 16.78125 10.148438 16.472656 10.085938 16.160156 C 10.023438 15.84375 9.992188 15.527344 9.992188 15.207031 C 9.992188 14.886719 10.023438 14.566406 10.085938 14.253906 C 10.148438 13.9375 10.242188 13.632812 10.367188 13.335938 C 10.492188 13.039062 10.644531 12.757812 10.824219 12.492188 C 11.003906 12.226562 11.207031 11.980469 11.4375 11.75 C 11.664062 11.523438 11.914062 11.324219 12.183594 11.144531 C 12.453125 10.964844 12.738281 10.816406 13.039062 10.691406 C 13.335938 10.570312 13.644531 10.476562 13.964844 10.414062 C 14.28125 10.351562 14.601562 10.320312 14.925781 10.320312 C 15.25 10.320312 15.574219 10.351562 15.890625 10.414062 C 16.207031 10.476562 16.515625 10.570312 16.816406 10.691406 C 17.117188 10.816406 17.402344 10.964844 17.671875 11.144531 C 17.941406 11.324219 18.1875 11.523438 18.417969 11.75 C 18.648438 11.980469 18.851562 12.226562 19.03125 12.492188 C 19.210938 12.757812 19.363281 13.039062 19.488281 13.335938 C 19.613281 13.632812 19.707031 13.9375 19.769531 14.253906 C 19.832031 14.566406 19.863281 14.886719 19.863281 15.207031 Z M 19.863281 15.207031 "
                                         fill-opacity="1" fill-rule="nonzero" />
                                 </svg>
                                 <span>@lang('languages.Japanese')</span>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <!--/ Language -->

                 <!-- Quick links  -->
                 <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown">
                     <a
                         class="nav-link btn btn-text-secondary btn-icon rounded-pill btn-icon dropdown-toggle hide-arrow"
                         href="javascript:void(0);"
                         data-bs-toggle="dropdown"
                         data-bs-auto-close="outside"
                         aria-expanded="false">
                         <i class="ti ti-layout-grid-add ti-md"></i>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end p-0">
                         <div class="dropdown-menu-header border-bottom">
                             <div class="dropdown-header d-flex align-items-center py-3">
                                 <h6 class="mb-0 me-auto">Shortcuts</h6>
                                 <a
                                     href="javascript:void(0)"
                                     class="btn btn-text-secondary rounded-pill btn-icon dropdown-shortcuts-add"
                                     data-bs-toggle="tooltip"
                                     data-bs-placement="top"
                                     title="Add shortcuts"><i class="ti ti-plus text-heading"></i></a>
                             </div>
                         </div>
                         <div class="dropdown-shortcuts-list scrollable-container">
                             <div class="row row-bordered overflow-visible g-0">
                                 <div class="dropdown-shortcuts-item col">
                                     <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                         <i class="ti ti-calendar ti-26px text-heading"></i>
                                     </span>
                                     <a href="app-calendar.html" class="stretched-link">Calendar</a>
                                     <small>Appointments</small>
                                 </div>
                                 <div class="dropdown-shortcuts-item col">
                                     <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                         <i class="ti ti-file-dollar ti-26px text-heading"></i>
                                     </span>
                                     <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                                     <small>Manage Accounts</small>
                                 </div>
                             </div>
                             <div class="row row-bordered overflow-visible g-0">
                                 <div class="dropdown-shortcuts-item col">
                                     <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                         <i class="ti ti-user ti-26px text-heading"></i>
                                     </span>
                                     <a href="app-user-list.html" class="stretched-link">User App</a>
                                     <small>Manage Users</small>
                                 </div>
                                 <div class="dropdown-shortcuts-item col">
                                     <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                         <i class="ti ti-users ti-26px text-heading"></i>
                                     </span>
                                     <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                                     <small>Permission</small>
                                 </div>
                             </div>
                             <div class="row row-bordered overflow-visible g-0">
                                 <div class="dropdown-shortcuts-item col">
                                     <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                         <i class="ti ti-device-desktop-analytics ti-26px text-heading"></i>
                                     </span>
                                     <a href="index.html" class="stretched-link">Dashboard</a>
                                     <small>User Dashboard</small>
                                 </div>
                                 <div class="dropdown-shortcuts-item col">
                                     <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                         <i class="ti ti-settings ti-26px text-heading"></i>
                                     </span>
                                     <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                                     <small>Account Settings</small>
                                 </div>
                             </div>
                             <div class="row row-bordered overflow-visible g-0">
                                 <div class="dropdown-shortcuts-item col">
                                     <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                         <i class="ti ti-help ti-26px text-heading"></i>
                                     </span>
                                     <a href="pages-faq.html" class="stretched-link">FAQs</a>
                                     <small>FAQs & Articles</small>
                                 </div>
                                 <div class="dropdown-shortcuts-item col">
                                     <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                         <i class="ti ti-square ti-26px text-heading"></i>
                                     </span>
                                     <a href="modal-examples.html" class="stretched-link">Modals</a>
                                     <small>Useful Popups</small>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </li>
                 <!-- Quick links -->

                 <!-- Notification -->
                 <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
                     <a
                         class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow"
                         href="javascript:void(0);"
                         data-bs-toggle="dropdown"
                         data-bs-auto-close="outside"
                         aria-expanded="false">
                         <span class="position-relative">
                             <i class="ti ti-bell ti-md"></i>
                             <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
                         </span>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end p-0">
                         <li class="dropdown-menu-header border-bottom">
                             <div class="dropdown-header d-flex align-items-center py-3">
                                 <h6 class="mb-0 me-auto">Notification</h6>
                                 <div class="d-flex align-items-center h6 mb-0">
                                     <span class="badge bg-label-primary me-2">8 New</span>
                                     <a
                                         href="javascript:void(0)"
                                         class="btn btn-text-secondary rounded-pill btn-icon dropdown-notifications-all"
                                         data-bs-toggle="tooltip"
                                         data-bs-placement="top"
                                         title="Mark all as read"><i class="ti ti-mail-opened text-heading"></i></a>
                                 </div>
                             </div>
                         </li>
                         <li class="dropdown-notifications-list scrollable-container">
                             <ul class="list-group list-group-flush">
                                 <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                     <div class="d-flex">
                                         <div class="flex-shrink-0 me-3">
                                             <div class="avatar">
                                                 <img src="{{ $path }}assets/img/avatars/1.png" alt class="rounded-circle" />
                                             </div>
                                         </div>
                                         <div class="flex-grow-1">
                                             <h6 class="small mb-1">Congratulation Lettie 🎉</h6>
                                             <small class="mb-1 d-block text-body">Won the monthly best seller gold badge</small>
                                             <small class="text-muted">1h ago</small>
                                         </div>
                                         <div class="flex-shrink-0 dropdown-notifications-actions">
                                             <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                             <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                         </div>
                                     </div>
                                 </li>
                                 <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                     <div class="d-flex">
                                         <div class="flex-shrink-0 me-3">
                                             <div class="avatar">
                                                 <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                                             </div>
                                         </div>
                                         <div class="flex-grow-1">
                                             <h6 class="mb-1 small">Charles Franklin</h6>
                                             <small class="mb-1 d-block text-body">Accepted your connection</small>
                                             <small class="text-muted">12hr ago</small>
                                         </div>
                                         <div class="flex-shrink-0 dropdown-notifications-actions">
                                             <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                             <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                         </div>
                                     </div>
                                 </li>
                                 <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                     <div class="d-flex">
                                         <div class="flex-shrink-0 me-3">
                                             <div class="avatar">
                                                 <img src="{{ $path }}assets/img/avatars/2.png" alt class="rounded-circle" />
                                             </div>
                                         </div>
                                         <div class="flex-grow-1">
                                             <h6 class="mb-1 small">New Message ✉️</h6>
                                             <small class="mb-1 d-block text-body">You have new message from Natalie</small>
                                             <small class="text-muted">1h ago</small>
                                         </div>
                                         <div class="flex-shrink-0 dropdown-notifications-actions">
                                             <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                             <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                         </div>
                                     </div>
                                 </li>
                                 <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                     <div class="d-flex">
                                         <div class="flex-shrink-0 me-3">
                                             <div class="avatar">
                                                 <span class="avatar-initial rounded-circle bg-label-success"><i class="ti ti-shopping-cart"></i></span>
                                             </div>
                                         </div>
                                         <div class="flex-grow-1">
                                             <h6 class="mb-1 small">Whoo! You have new order 🛒</h6>
                                             <small class="mb-1 d-block text-body">ACME Inc. made new order $1,154</small>
                                             <small class="text-muted">1 day ago</small>
                                         </div>
                                         <div class="flex-shrink-0 dropdown-notifications-actions">
                                             <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                             <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                         </div>
                                     </div>
                                 </li>
                                 <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                     <div class="d-flex">
                                         <div class="flex-shrink-0 me-3">
                                             <div class="avatar">
                                                 <img src="{{ $path }}assets/img/avatars/9.png" alt class="rounded-circle" />
                                             </div>
                                         </div>
                                         <div class="flex-grow-1">
                                             <h6 class="mb-1 small">Application has been approved 🚀</h6>
                                             <small class="mb-1 d-block text-body">Your ABC project application has been approved.</small>
                                             <small class="text-muted">2 days ago</small>
                                         </div>
                                         <div class="flex-shrink-0 dropdown-notifications-actions">
                                             <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                             <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                         </div>
                                     </div>
                                 </li>
                                 <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                     <div class="d-flex">
                                         <div class="flex-shrink-0 me-3">
                                             <div class="avatar">
                                                 <span class="avatar-initial rounded-circle bg-label-success"><i class="ti ti-chart-pie"></i></span>
                                             </div>
                                         </div>
                                         <div class="flex-grow-1">
                                             <h6 class="mb-1 small">Monthly report is generated</h6>
                                             <small class="mb-1 d-block text-body">July monthly financial report is generated </small>
                                             <small class="text-muted">3 days ago</small>
                                         </div>
                                         <div class="flex-shrink-0 dropdown-notifications-actions">
                                             <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                             <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                         </div>
                                     </div>
                                 </li>
                                 <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                     <div class="d-flex">
                                         <div class="flex-shrink-0 me-3">
                                             <div class="avatar">
                                                 <img src="{{ $path }}assets/img/avatars/5.png" alt class="rounded-circle" />
                                             </div>
                                         </div>
                                         <div class="flex-grow-1">
                                             <h6 class="mb-1 small">Send connection request</h6>
                                             <small class="mb-1 d-block text-body">Peter sent you connection request</small>
                                             <small class="text-muted">4 days ago</small>
                                         </div>
                                         <div class="flex-shrink-0 dropdown-notifications-actions">
                                             <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                             <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                         </div>
                                     </div>
                                 </li>
                                 <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                     <div class="d-flex">
                                         <div class="flex-shrink-0 me-3">
                                             <div class="avatar">
                                                 <img src="{{ $path }}assets/img/avatars/6.png" alt class="rounded-circle" />
                                             </div>
                                         </div>
                                         <div class="flex-grow-1">
                                             <h6 class="mb-1 small">New message from Jane</h6>
                                             <small class="mb-1 d-block text-body">Your have new message from Jane</small>
                                             <small class="text-muted">5 days ago</small>
                                         </div>
                                         <div class="flex-shrink-0 dropdown-notifications-actions">
                                             <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                             <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                         </div>
                                     </div>
                                 </li>
                                 <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                     <div class="d-flex">
                                         <div class="flex-shrink-0 me-3">
                                             <div class="avatar">
                                                 <span class="avatar-initial rounded-circle bg-label-warning"><i class="ti ti-alert-triangle"></i></span>
                                             </div>
                                         </div>
                                         <div class="flex-grow-1">
                                             <h6 class="mb-1 small">CPU is running high</h6>
                                             <small class="mb-1 d-block text-body">CPU Utilization Percent is currently at 88.63%,</small>
                                             <small class="text-muted">5 days ago</small>
                                         </div>
                                         <div class="flex-shrink-0 dropdown-notifications-actions">
                                             <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                             <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                         </div>
                                     </div>
                                 </li>
                             </ul>
                         </li>
                         <li class="border-top">
                             <div class="d-grid p-4">
                                 <a class="btn btn-primary btn-sm d-flex" href="javascript:void(0);">
                                     <small class="align-middle">View all notifications</small>
                                 </a>
                             </div>
                         </li>
                     </ul>
                 </li>
                 <!--/ Notification -->

                 <!-- User -->
                 <li class="nav-item navbar-dropdown dropdown-user dropdown">
                     <a
                         class="nav-link dropdown-toggle hide-arrow p-0"
                         href="javascript:void(0);"
                         data-bs-toggle="dropdown">
                         <div class="avatar avatar-online">

                             <img
                                 @if(isset($user->image))
                             src="{{ EH::getFile($user->image) }}"
                             @else
                             src="{{ $path }}assets/img/avatars/1.png"

                             @endif
                             alt class="rounded-circle" />
                         </div>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end">
                         <li>
                             <a class="dropdown-item mt-0" href="#!">
                                 <div class="d-flex align-items-center">
                                     <div class="flex-shrink-0 me-2">
                                         <div class="avatar avatar-online">
                                             <img
                                                 @if(isset($user->image))
                                             src="{{ EH::getFile($user->image) }}"
                                             @else
                                             src="{{ $path }}assets/img/avatars/1.png"

                                             @endif
                                             alt class="rounded-circle" />
                                         </div>
                                     </div>
                                     <div class="flex-grow-1">
                                         <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                         <small class="text-muted">Admin</small>
                                     </div>
                                 </div>
                             </a>
                         </li>
                         <li>
                             <div class="dropdown-divider my-1 mx-n2"></div>
                         </li>
                         <li>
                             <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                 <i class="ti ti-user me-3 ti-md"></i><span class="align-middle">@lang('general.My Profile')</span>
                             </a>
                         </li>

                         <li>
                             <div class="dropdown-divider my-1 mx-n2"></div>
                         </li>

                         <li>


                             <form method="POST" action="{{ route('logout') }}">
                                 @csrf

                                 <x-dropdown-link :href="route('logout')" class="btn btn-sm btn-danger d-flex" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                     {{ __('Log Out') }}
                                 </x-dropdown-link>
                             </form>
                         </li>
                     </ul>
                 </li>
                 <!--/ User -->
             </ul>
         </div>

         <!-- Search Small Screens -->
         <div class="navbar-search-wrapper search-input-wrapper container-xxl d-none">
             <input
                 type="text"
                 class="form-control search-input border-0"
                 placeholder="Search..."
                 aria-label="Search..." />
             <i class="ti ti-x search-toggler cursor-pointer"></i>
         </div>
     </div>
 </nav>
