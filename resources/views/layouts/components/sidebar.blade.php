<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"><!--begin::Sidebar Brand-->
    <div class="sidebar-brand"><a href="" class="brand-link"><img src="/adminlte/assets/img/AdminLTELogo.png"
                alt="AdminLTE Logo" class="brand-image opacity-75 shadow"><span class="brand-text fw-light">AdminLTE
                4</span></a>
    </div>
    <div class="sidebar-wrapper">

        <nav class="mt-2"><!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"><a href="./docs/introduction.html" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a></li>
                </li>

                {{-- Brand --}}
                <li class="nav-item"><a href="#" class="nav-link">
                        <p>
                            Brand
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('admin.brands.index') }}" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                <p>List Brand</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('admin.brands.create') }}" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                <p>Create New</p>
                            </a></li>
                    </ul>
                </li>

                {{-- Cars --}}
                <li class="nav-item"><a href="#" class="nav-link"><i class="fa-solid fa-car"></i>
                        <p>
                            Car
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('admin.cars.index') }}" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                <p>List Car</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('admin.cars.create') }}" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                <p>Add New</p>
                            </a></li>
                    </ul>
                </li>

                {{-- Student --}}
                <li class="nav-item"><a href="#" class="nav-link"><i class="fa-solid fa-user"></i>
                        <p>
                            Student
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('students.index') }}" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                <p>List Student</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('students.create') }}" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                <p>Add New</p>
                            </a></li>
                    </ul>
                </li>

                {{-- Device --}}
                <li class="nav-item"><a href="#" class="nav-link">
                        <p>
                            Device
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('devices.index') }}" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                <p>List Device</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('devices.create') }}" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                <p>Add New</p>
                            </a></li>
                    </ul>
                </li>

                {{-- Product --}}
                <li class="nav-item"><a href="#" class="nav-link"><i class="fa-brands fa-product-hunt"></i>
                        <p>
                            Product
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                <p>List Product</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('products.create') }}" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                <p>Add New</p>
                            </a></li>
                    </ul>
                </li>

                
            </ul>
        </nav>
    </div>
</aside>
