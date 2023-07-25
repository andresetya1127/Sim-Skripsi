@if (Session::get('showBy') == 'card')
    @forelse ($data as $dt)
        <div class="col-md-4 ">
            <div class="card">
                <div class="thumbnail-open" data-id="thumbnail-show">
                    <div class="card-body">
                        <img class="card-img-top rounded" height="400px" src="{{ asset('storage/cover/' . $dt->cover) }}"
                            alt="">
                        <div class="action-card text-center">
                            <h4 class="fw-bold text-capitalize">
                                {{ $dt->judul }}
                            </h4>
                            <span class="fw-bold text-muted">
                                <i class="fas fa-user"></i> {{ $dt->nama }}
                            </span>
                            <a href="{{ route('skripsi.detail', $dt->id_skripsi) }}"
                                class="btn btn-primary btn-round mt-3">
                                <i class="fas fa-search"></i>
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="text-muted fw-bold"><i class="far fa-folder-open fa-lg"></i> Tidak Ada Data.
                    </h5>
                </div>
            </div>
        </div>
    @endforelse
@elseif (Session::get('showBy') == 'list')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <div class="table-responsive table-hover table-sales">
                    <table class="table">
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($data as $dt)
                                <tr>
                                    <td>
                                        #{{ $no++ }}
                                    </td>
                                    <td> {{ $dt->nama }},<a href="{{ route('skripsi.detail', $dt->id_skripsi) }}"
                                            class="">{{ $dt->judul }}</a>,
                                        {{ $dt->tahun }}, Skripsi, STMIK Lombok
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        <h5 class="text-muted text-center fw-bold">
                                            <i class="far fa-folder-open fa-lg"></i>Tidak Ada Data.
                                        </h5>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endif
