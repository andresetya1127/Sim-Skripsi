@php
    $split = explode(',', $data->keyword);
@endphp

<div class="card">
    <div class="card-body">
        <h2 class="text-center text-capitalize fw-bold">
            {{ $data->judul }}
            <p class="text-muted">{{ $data->tema }}</p>
        </h2>
    </div>
</div>

<div class="card">
    <div class="card-body d-flex justify-content-center">
        <p class="text-muted mr-3"><i class="fas fa-calendar-alt"></i> {{ $data->tahun }}</p>
        <p class="text-muted text-capitalize mr-3"><i class="fas fa-user-tie"></i> {{ $data->nama }}</p>
        <p class="text-muted text-capitalize mr-3"><i class="fas fa-user-tie"></i> {{ $data->dosen_1 }}</p>
        <p class="text-muted text-capitalize mr-3"><i class="fas fa-user-tie"></i> {{ $data->dosen_2 }}</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h4 class="text-capitalize fw-bold">abstract</h4>
        </div>
        <p class="text-justify">
            {{ $data->abstract }}
        </p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h4 class="text-capitalize fw-bold">Keyword</h4>
        </div>
        <div class="d-flex flex-wrap">
            @foreach ($split as $sp)
                <a href="{{ route('skripsi.key', $sp) }}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                    <i class="fas fa-tags"></i> {{ $sp }}
            @endforeach

            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h4 class="text-capitalize fw-bold">Refrensi</h4>
        </div>
        {!! $data->refrensi !!}
    </div>
</div>
