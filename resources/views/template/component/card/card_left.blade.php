@if (Auth::check())
    <div class="card card-profile ">
        <div class="card-header" style="background-image: url('{{ asset('asset/img/blogpost.jpg') }}')">
            <div class="profile-picture">
                <div class="avatar avatar-xl">
                    <img src="{{ asset('asset/img/chadengle.jpg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="user-profile text-center">
                <div class="name ">{{ $data->nim }}</div>
                <div class="job"> {{ $data->program_studi == '55201' ? 'Teknik Informatika' : 'Sistem Informasi' }}
                </div>
            </div>
        </div>
    </div>
@endif

<div class="card">
    <div class="thumbnail-open show">
        <div class="card-body">
            <img class="card-img-top rounded" src="{{ asset('cover/' . $data->cover) }}" height="400px" alt="">
            @if (Auth::check())
                <div class="action-card text-center">
                    <button role="button" data-file="{{ route('download.skripsi', $data->dokumen) }}"
                        class="btn btn-primary btn-rounded" id="download-skripsi">
                        <i class="fas fa-cloud-download-alt"></i> Download
                    </button>
                </div>
            @else
                <div class="action-card text-center">
                    <p>Silahkan Login Untuk Download</p>
                    <a href="{{ route('auth.index') }}" class="btn btn-primary btn-round">
                        <i class="fas fa-cloud-download-alt"></i> Login
                    </a>
                </div>
            @endif

        </div>
    </div>
</div>
