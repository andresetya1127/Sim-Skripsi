<div class="main-header no-box-shadow" data-background-color="yellow2">
    <div class="nav-top">
        <div class="container d-flex flex-row pt-2">
            <button class="navbar-toggler sidenav-toggler2 ml-auto" type="button" data-toggle="collapse"
                data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="icon-menu"></i>
                </span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
            <!-- Logo Header -->
            <a href="{{ route('root') }}" class="logo">
                <img src="{{ asset('asset/img/logo_kampus.png') }}" alt="navbar brand" class="navbar-brand"
                    width="50px">
            </a>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header-left navbar-expand-lg p-0">
                <ul class="navbar-nav page-navigation">
                    <h3 class="title-menu d-flex d-lg-none">
                        Menu
                        <div class="close-menu"> <i class="flaticon-cross"></i></div>
                    </h3>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('root') }}">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('skripsi.index') }}">
                            <i class="fas fa-trophy"></i> Skripsi
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('skripsi.index') }}">
                            <i class="fas fa-book"></i> Buku
                        </a>
                    </li> --}}
                    @if (Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-tasks"></i> Kelola
                            </a>
                            @if (Auth::user()->role == 'Akademik')
                                <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('skripsi.manage') }}"> - Kelola Skripsi</a>
                                    {{-- <a class="dropdown-item" href="{{ route('buku.manage') }}"> - Kelola Buku</a> --}}
                                </div>
                            @elseif (Auth::user()->role == 'Mahasiswa')
                                <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('add.skripsi') }}">Tambah Skripsi</a>
                                </div>
                            @endif
                        </li>
                    @endif

                    @if (Auth::check())
                        @if (Auth::user()->role == 'Akademik')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('acces.index') }}">
                                    <i class="fas fa-key"></i> Kontrol Akses
                                </a>
                            </li>
                        @endif
                    @endif
                </ul>
            </nav>

            <nav class="navbar navbar-header navbar-expand-lg p-0">
                <div class="container-fluid p-0">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        @if (Auth::check())
                            @php
                                $user = Auth::user()->id;
                                $message = App\Models\ChMessage::where('to_id', $user)
                                    ->where('seen', 0)
                                    ->select('from_id', 'seen')
                                    ->count();
                            @endphp
                            <li class="nav-item hidden-caret">
                                <a class="nav-link" href="{{ route('chatify') }}" id="messageDropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-envelope"></i>
                                    <span class="notification bg-primary">{{ $message }}</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                    aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="{{ asset('storage/users-avatar/' . Auth::user()->avatar) }}"
                                            alt="..." class="avatar-img rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <img src="{{ asset('storage/users-avatar/' . Auth::user()->avatar) }}"
                                                        alt="image profile" class="avatar-img rounded">
                                                </div>
                                                <div class="u-text">
                                                    <h4>{{ Auth::user()->name }}</h4>
                                                    <p class="text-muted">{{ Auth::user()->role }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('auth.logOut') }}">Keluar</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item dropdown hidden-caret">
                                <a class="nav-link" href="{{ route('auth.index') }}" aria-haspopup="true">
                                    <i class="fas fa-lock"></i> Login
                                </a>
                            </li>
                        @endif

                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>
