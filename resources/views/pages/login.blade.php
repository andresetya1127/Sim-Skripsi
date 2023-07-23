@include('template.component.header')

<body class="login">
    <style>
        .bg-stmik {
            background-position: bottom center;
            object-fit: cover;
            background-repeat: no-repeat;
            background-color: rgb(255, 231, 0);
        }
    </style>

    <div class="wrapper wrapper-login wrapper-login-full p-0">
        <div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-stmik"
            style="background-image: url('{{ asset('asset/img/image_1.png') }}')"> </div>

        {{-- Login --}}
        <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
            <div class="container container-login container-transparent animated fadeIn">
                <h3 class="text-center">STMIK Lombok</h3>
                <form action="{{ route('auth.authenticate') }}" method="POST">
                    @csrf
                    <div class="login-form">
                        <div class="form-group">
                            <label for="name" class="placeholder"><b>Username</b></label>
                            <input id="name" name="name" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="placeholder"><b>Password</b></label>
                            <div class="position-relative">
                                <input id="password" name="password" type="password" class="form-control" required>
                                <div class="show-password">
                                    <i class="icon-eye"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-action-d-flex justify-content-center mb-3">
                            <button type="submit"
                                class="btn btn-secondary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Sign In</button>
                        </div>
                        <div class="login-account">
                            <span class="msg">Belum punya akun ?</span>
                            <a href="#" id="show-signup" class="link">Daftar</a>
                        </div>
                    </div>
                </form>
            </div>

            {{-- register --}}
            <div class="container container-signup container-transparent animated fadeIn">
                <h3 class="text-center">Sign Up</h3>
                @if ($sesi = Session::get('success'))
                    <div id="message-target" data-message="{{ $sesi }}" data-type="success"></div>
                @elseif ($sesi = Session::get('error'))
                    <div id="message-target" data-message="{{ $sesi }}" data-type="warning"></div>
                    {{ $sesi }}
                @elseif ($sesi = Session::get('authError'))
                    <div id="message-target" data-message="{{ $sesi }}" data-type="danger"></div>
                    {{ $sesi }}
                @else
                    <div id="message-target" data-message="" data-type=""></div>
                @endif
                <div class="login-form">
                    <form action="{{ route('auth.register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nim" class="placeholder"><b>NIM</b></label>
                            <input id="nim" name="nim" type="text" class="form-control" required="">
                        </div>

                        <div class="form-group">
                            <label for="nama" class="placeholder"><b>Nama</b></label>
                            <input id="nama" name="nama" type="text" class="form-control" required="">
                        </div>

                        <div class="form-group">
                            <label for="ibu_kandung" class="placeholder"><b>Ibu Kandung</b></label>
                            <input id="ibu_kandung" name="ibu_kandung" type="text" class="form-control"
                                required="">
                        </div>

                        <div class="row form-action">
                            <div class="col-md-6">
                                <a href="#" id="show-signin"
                                    class="btn btn-danger btn-link w-100 fw-bold">Cancel</a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-secondary w-100 fw-bold">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('template.component.tag_script')
</body>
