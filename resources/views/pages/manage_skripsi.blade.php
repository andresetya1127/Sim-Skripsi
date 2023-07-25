@extends('template.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Kelola Skripsi</h4>
                    <div class="text-right">
                        <button data-toggle="modal" data-target="#modal" type="button"
                            class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-tags"></i> Tema
                        </button>

                        <a href="{{ route('add.skripsi') }}" class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i> Skripsi
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-skripsi" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>Judul</th>
                                    <th>Tema</th>
                                    <th>Tahun</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal" class="modal fixed-right fade" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kelola Tema</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-tema" data-target="{{ route('save.tema') }}">

                        <div class="form-group">
                            <label for="tema">Tema</label>

                            <div class="input-group">
                                <input type="text" class="form-control" id="tema" name="tema"
                                    placeholder="Masukkan Tema...">
                                <div class="input-group-prepend">
                                    <button type="submit" formtarget="form-tema" class="btn btn-success">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive mt-4">
                        <table id="table-tema" class="table table-striped w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tema</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- modal-bialog .// -->
    </div> <!-- modal.// -->
@endsection
