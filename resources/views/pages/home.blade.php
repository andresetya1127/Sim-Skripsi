@extends('template.template')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-dark bg-secondary-gradient">
                <div class="card-body bubble-shadow">
                    <h3>{{ $skripsi_ti }} Dokumen</h3>
                    <h5 class="op-8">Skripsi Teknik Informasi</h5>
                    <div class="pull-right">
                        <i class="fas fa-book" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-dark bg-secondary-gradient">
                <div class="card-body bubble-shadow">
                    <h3>{{ $skripsi_si }} Dokumen</h3>
                    <h5 class="op-8">Skripsi Sistem Informasi</h5>
                    <div class="pull-right">
                        <i class="fas fa-book" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-4">
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
        </div> --}}

        @include('template.component.chart_column')
    </div>
@section('manual_script')
    <!-- Chart -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('') }}asset/js/customChart.js"></script>
@endsection
@endsection
