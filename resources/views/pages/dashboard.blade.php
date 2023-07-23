@extends('template.template')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md mr-3 bg-warning">
                        <i class="fas fa-book"></i>
                    </span>
                    <div>
                        <h5 class="mb-1"><b>
                                <a href="#">
                                    Skripsi Teknik Informatika
                                </a>
                            </b>
                        </h5>
                        <small class="text-muted">{{ $skripsi_ti }} Dokumen</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md mr-3 bg-info">
                        <i class="fas fa-book"></i>
                    </span>
                    <div>
                        <h5 class="mb-1"><b>
                                <a href="#">
                                    Skripsi Sistem Informasi
                                </a>
                            </b>
                        </h5>
                        <small class="text-muted">{{ $skripsi_si }} Dokumen</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-success mr-3">
                        <i class="fa fa-users"></i>
                    </span>
                    <div>
                        <h5 class="mb-1"><b><a href="#">Buku</a></b></h5>
                        <small class="text-muted">{{ $buku }} Dokumen</small>
                    </div>
                </div>
            </div>
        </div>

        @include('template.component.chart_column')
    </div>
@endsection
