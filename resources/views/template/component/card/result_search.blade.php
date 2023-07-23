@forelse ($data as $dt)
    <div class="col-md-4 ">
        <div class="card">
            <div class="thumbnail-open" data-id="thumbnail-show">
                <div class="card-body">
                    <img class="card-img-top rounded" src="{{ asset('asset/img/chadengle.jpg') }}" alt="">
                    <div class="action-card text-center">
                        <h4 class="mb-5">
                            {{ $dt->judul }}
                        </h4>
                        <a href="{{ route('skripsi.index', $dt->id_skripsi) }}" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                            Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
@endforelse
