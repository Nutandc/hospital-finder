<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('img/logo-short.png')}}" height="25px">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ 'admin' == request()->path() ? 'active' : ''}}">
                <a class="nav-link" href="{{ url('/admin') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdminSection" aria-expanded="true" aria-controls="collapseAdminSection">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Admin Section</span>
                </a>
                <div id="collapseAdminSection" class="collapse" aria-labelledby="headingAdminSection" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Admin Section:</h6>
                        <a class="collapse-item" href="AdminSection-color.html">Admission Query</a>
                        <a class="collapse-item" href="AdminSection-border.html">Class</a>
                        <a class="collapse-item" href="AdminSection-border.html">Subjects</a>
                        <a class="collapse-item" href="AdminSection-animation.html">Animations</a>
                        <a class="collapse-item" href="AdminSection-other.html">Other</a>
                    </div>
                </div>
            </li> -->

            <!-- Heading -->
            <div class="sidebar-heading">
                Users
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Add Users</span>
                </a>
                <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Users:</h6>
                        <a class="collapse-item" href="{{ url('/addteacherpage') }}">Add Teacher</a>
                        <a class="collapse-item" href="{{ url('/addstudentpage') }}">Add Student</a>
                        <a class="collapse-item" href="{{ url('/addparentpage') }}">Add Parent</a>
                        <a class="collapse-item" href="{{ url('/addaccountantpage') }}">Add Accountant</a>
                        <a class="collapse-item" href="{{ url('/addlibrarianpage') }}">Add Librarian</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUserList" aria-expanded="true" aria-controls="collapseUserList">
                    <i class="fas fa-fw fa-list"></i>
                    <span>User List</span>
                </a>
                <div id="collapseUserList" class="collapse" aria-labelledby="headingUserList" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ url('/teacher-page') }}">Teachers</a>
                        <a class="collapse-item" href="{{ url('/student-page') }}">Students</a>
                        <a class="collapse-item" href="{{ url('/parent-page') }}">Parents</a>
                        <a class="collapse-item" href="{{ url('/accountant-page') }}">Accountants</a>
                        <a class="collapse-item" href="{{ url('/librarian-page') }}">Librarians</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAccountsList" aria-expanded="true" aria-controls="collapseAccountsList">
                    <i class="fas fa-fw fa-money"></i>
                    <span>Accounts</span>
                </a>
                <div id="collapseAccountsList" class="collapse" aria-labelledby="headingUserList" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ url('/add-fee-page') }}">Add Fee</a>
                        <a class="collapse-item" href="{{ url('/account-student-page') }}">Student Accounts</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/level-page')}}">
                    <i class="fas fa-fw fa-chalkboard-teacher"></i>
                    <span>Class</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/schedule-page')}}">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Class Routine</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/routine')}}">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Manage Classes</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/subject-page')}}">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Subjects</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>