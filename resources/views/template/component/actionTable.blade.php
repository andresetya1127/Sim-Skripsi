@if (isset($skripsi))
    <div class="form-button-action">
        <a href="{{ route('edit.skripsi', $skripsi->id_skripsi) }}" data-toggle="tooltip" title=""
            class="btn btn-link btn-primary" data-original-title="Ubah Skripsi">
            <i class="fa fa-edit"></i>
        </a>
        <a data-target="{{ route('delete.skripsi', $skripsi->id_skripsi) }}" id="dataDelete" data-toggle="tooltip"
            title="" class="btn btn-link btn-danger" data-original-title="Hapus Skripsi">
            <i class="fa fa-times"></i>
        </a>
        <a href="{{ route('skripsi.detail', $skripsi->id_skripsi) }}" data-toggle="tooltip" title=""
            class="btn btn-link btn-info" data-original-title="Lihat Skripsi">
            <i class="fa fa-info"></i>
        </a>
    </div>
@elseif (isset($tema))
    <div class="form-button-action">
        <a data-target="{{ route('delete.tema', $tema->id_tema) }}" id="DeleteTema" data-toggle="tooltip" title=""
            class="btn btn-link btn-danger" data-original-title="Hapus Tema">
            <i class="fa fa-times"></i>
        </a>
    </div>
@endif
