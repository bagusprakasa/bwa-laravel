<div class="main-header" data-background-color="custom" custom-color="#1f1e2e">
    <div class="nav-top py-lg-3">
        <div class="container d-flex flex-row">
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="icon-menu"></i>
                </span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
            <!-- Logo Header -->
            <a href="{{ route('dashboard.index') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('/') }}img/logo.svg" alt="navbar brand" class="navbar-brand">
            </a>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header-left navbar-expand-lg p-0">
                <ul class="navbar-nav page-navigation pl-md-3">
                    <h3 class="title-menu d-flex d-lg-none">
                        Menu
                        <div class="close-menu"> <i class="flaticon-cross"></i></div>
                    </h3>
                </ul>
            </nav>
            <nav class="navbar navbar-header navbar-expand-lg p-0" data-background-color="custom"
                custom-color="#1f1e2e">
                <div class="container-fluid p-0">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-end">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <div class="avatar-sm">
                                        <img src="{{ asset('/') }}img/profile.jpg" alt="..."
                                            class="avatar-img rounded">
                                    </div>
                                    <span class="text-white ml-3">
                                        <span class="op-8">Hi,</span> <span
                                            class="fw-bold">{{ Auth::user()->name }}</span>
                                    </span>
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img src="{{ asset('/') }}img/profile.jpg"
                                                    alt="image profile" class="avatar-img rounded"></div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p class="text-muted">{{ Auth::user()->email }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)" id="logoutButton">Logout</a>
                                        <form method="POST" action="{{ route('logout') }}" id="logout">
                                            @csrf
                                        </form>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
    <div class="nav-bottom nav-bottom-dark py-md-1" data-background-color="custom" custom-color="#181824">
        <h3 class="title-menu d-flex d-lg-none">
            Menu
            <div class="close-menu"> <i class="flaticon-cross"></i></div>
        </h3>
        <div class="container d-flex flex-lg-row flex-column-reverse px-3 px-lg-0">
            <ul class="nav page-navigation page-navigation-style-2 page-navigation-secondary mt-3 mt-lg-0">
                <li class="nav-item @if (Request::segment(1) == '') active @endif">
                    {{ Request::segment(1) }}
                    <a class="nav-link" href="{{ route('dashboard.index') }}">
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item submenu">
                    <a class="nav-link" href="#">
                        <span class="menu-title">Apps</span>
                    </a>
                    <div class="navbar-dropdown animated fadeIn">
                        <ul>
                            <li>
                                <a href="boards.html">Boards</a>
                            </li>
                            <li>
                                <a href="projects.html">Projects</a>
                            </li>
                            <li>
                                <a href="email-inbox.html">Email Inbox</a>
                            </li>
                            <li>
                                <a href="email-detail.html">Email Detail</a>
                            </li>
                            <li>
                                <a href="email-compose.html">Email Inbox</a>
                            </li>
                            <li>
                                <a href="messages.html">Messages</a>
                            </li>
                            <li>
                                <a href="conversations.html">Conversations</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item submenu">
                    <a class="nav-link" href="#">
                        <span class="menu-title">Finance</span>
                    </a>
                    <div class="navbar-dropdown animated fadeIn">
                        <ul>
                            <li>
                                <a href="starter-template.html">Annual Report</a>
                            </li>
                            <li>
                                <a href="starter-template.html">HR Report</a>
                            </li>
                            <li>
                                <a href="starter-template.html">Finance Report</a>
                            </li>
                            <li>
                                <a href="starter-template.html">Revenue Report</a>
                            </li>
                            <li>
                                <a href="starter-template.html">IPO Report</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item submenu mega-menu dropdown">
                    <a class="nav-link" href="#">
                        <span class="menu-title">Project</span>
                    </a>
                    <div class="navbar-dropdown animated fadeIn">
                        <div class="col-group-wrapper row">
                            <div class="col-group col-md-4">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="category-heading">Basic Elements</p>
                                        <div class="submenu-item">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul>
                                                        <li><a href="#">Accordion</a></li>
                                                        <li><a href="#">Buttons</a></li>
                                                        <li><a href="#">Badges</a></li>
                                                        <li><a href="#">Breadcrumbs</a></li>
                                                        <li><a href="#">Dropdown</a></li>
                                                        <li><a href="#">Modals</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul>
                                                        <li><a href="#">Progress bar</a></li>
                                                        <li><a href="#">Pagination</a></li>
                                                        <li><a href="#">Tabs</a></li>
                                                        <li><a href="#">Typography</a></li>
                                                        <li><a href="#">Tooltip</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-group col-md-4">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="category-heading">Advanced Elements</p>
                                        <div class="submenu-item">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul>
                                                        <li><a href="#">Datatables</a></li>
                                                        <li><a href="#">Carousel</a></li>
                                                        <li><a href="#">Clipboard</a></li>
                                                        <li><a href="#">Chart.js</a></li>
                                                        <li><a href="#">Loader</a></li>
                                                        <li><a href="#">Slider</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul>
                                                        <li><a href="#">Popup</a></li>
                                                        <li><a href="#">Notification</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-group col-md-4">
                                <p class="category-heading">Icons</p>
                                <ul class="submenu-item">
                                    <li><a href="#">Flaticons</a></li>
                                    <li><a href="#">Font Awesome</a></li>
                                    <li><a class="3">Simple Line Icons</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item submenu">
                    <a class="nav-link" href="#">
                        <span class="menu-title">HR</span>
                    </a>
                    <div class="navbar-dropdown animated fadeIn">
                        <ul>
                            <li>
                                <a href="starter-template.html">Annual Report</a>
                            </li>
                            <li>
                                <a href="starter-template.html">HR Report</a>
                            </li>
                            <li>
                                <a href="starter-template.html">Finance Report</a>
                            </li>
                            <li>
                                <a href="starter-template.html">Revenue Report</a>
                            </li>
                            <li>
                                <a href="starter-template.html">IPO Report</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <div class="quick-search">
                <form class="quick-search-form">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-search">
                                <i class="fa fa-search search-icon"></i>
                            </button>
                        </div>
                        <input type="text" placeholder="Search ..." class="form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('custom-js')
    <script>
        $('#logoutButton').click(function(e) {
            swal("Are you sure ?", "You want to logout ?", {
                icon: "info",
                buttons: {
                    confirm: {
                        className: 'btn btn-danger',
                        text: "Yes",
                    },
                    cancel: {
                        visible: true,
                        className: 'btn btn-secondary',
                    },
                },
            }).then((response) => {
                if (response == true) {
                    $('#logout').submit();
                }
            });;
        });
    </script>
@endpush
