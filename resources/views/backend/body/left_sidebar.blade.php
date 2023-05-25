<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('backend/assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">Geneva Kennedy 123</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account 123</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li>
                    <a href="index.html" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Bảng điều khiển</span>
                    </a>
                </li>

                <li class="menu-title mt-2">Apps</li>


                <li>
                    <a href="#Employee" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Nhân Viên </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="Employee">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.employee') }}">Tất cả nhân viên</a>
                            </li>
                            <li>
                                <a href="{{ route('add.employee') }}">Thêm nhân viên</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#Customer" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Khách hàng </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="Customer">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.customer') }}">Tất cả khách hàng</a>
                            </li>
                            <li>
                                <a href="{{ route('add.customer') }}">Thêm khách hàng</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#Supplier" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Nhà cung cấp </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="Supplier">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.supplier') }}">Tất cả nhà cung cấp</a>
                            </li>
                            <li>
                                <a href="{{ route('add.supplier') }}">Thêm nhà cung cấp</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#Advante_Salary" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Lương Nhân Viên </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="Advante_Salary">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('add.AdvanceSalary') }}">Thêm lương tạm ứng</a>
                            </li>
                            <li>
                                <a href="{{ route('all.AdvanceSalary') }}">Bản lương tạm ứng</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#sidebarMultilevel" data-bs-toggle="collapse">
                        <i class="mdi mdi-share-variant"></i>
                        <span> Multi Level </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMultilevel">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#sidebarMultilevel2" data-bs-toggle="collapse">
                                    Second Level <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultilevel2">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="javascript: void(0);">Item 1</a>
                                        </li>
                                        <li>
                                            <a href="javascript: void(0);">Item 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarMultilevel3" data-bs-toggle="collapse">
                                    Third Level <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultilevel3">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="javascript: void(0);">Item 1</a>
                                        </li>
                                        <li>
                                            <a href="#sidebarMultilevel4" data-bs-toggle="collapse">
                                                Item 2 <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarMultilevel4">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="javascript: void(0);">Item 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript: void(0);">Item 2</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
