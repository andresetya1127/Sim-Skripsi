<div class="form-button-action">
    <a href="{{ route('edit.skripsi', $skripsi->id_skripsi) }}" data-toggle="tooltip" title=""
        class="btn btn-link btn-primary" data-original-title="Ubah Skripsi">
        <i class="fa fa-edit"></i>
    </a>
    <a href="{{ route('skripsi.detail', $skripsi->id_skripsi) }}" data-toggle="tooltip" title=""
        class="btn btn-link btn-info" data-original-title="Ubah Skripsi">
        <i class="fa fa-info"></i>
    </a>
    <a data-target="{{ route('delete.skripsi', $skripsi->id_skripsi) }}" id="dataDelete" data-toggle="tooltip"
        title="" class="btn btn-link btn-danger" data-original-title="Hapus">
        <i class="fa fa-times"></i>
    </a>
</div>
