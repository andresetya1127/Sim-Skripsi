@extends('template.template')
@section('content')
    <form data-url="{{ route('save.skripsi') }}" id="form-tambah-skripsi" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title mb-3">Tambah Skripsi</div>

                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <textarea class="form-control" id="judul" name="judul" rows="3" placeholder="Masukkan Judul.."></textarea>
                            <div class="message-error"></div>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukkan Nama...">
                            <div class="message-error"></div>
                        </div>

                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim"
                                placeholder="Masukkan NIM...">
                            <div class="message-error"></div>
                        </div>
                        <div class="form-group">
                            <label>Program Studi</label>
                            <select id="prodi" name="prodi" class="form-control select2">
                                <option selected disabled> Pilih ... </option>
                                <option value="55201"> Teknik Informatika </option>
                                <option value="57201"> Sistem Informasi </option>
                            </select>
                            <div class="message-error"></div>
                        </div>

                        @php
                            $tema = ['Android', 'Internet Of Think (IOT)', 'Web', 'SPK', 'Tata Kelola Tehnologi Informasi', 'Audit Tehkhnologi Informasi', 'Web GIS', 'Jaringan Komputer', 'Sistem Enterprice', 'Sistem Informasi Management (SIM)'];
                        @endphp
                        <div class="form-group">
                            <label>Tema</label>
                            <select id="tema" name="tema" class="form-control select2">
                                <option selected disabled> Pilih ... </option>
                                @foreach ($tema as $tm)
                                    <option value="{{ $tm }}"> {{ $tm }} </option>
                                @endforeach
                            </select>
                            <div class="message-error"></div>
                        </div>

                        <div class="form-group">
                            <label>Dosen 1</label>
                            <select id="dosen_1" name="dosen_1" class="form-control select2">
                                <option selected disabled> Pilih ... </option>
                                @foreach ($dosen as $dos)
                                    <option value=" {{ $dos->nama_dosen }} "> {{ $dos->nama_dosen }} </option>
                                @endforeach
                            </select>
                            <div class="message-error"></div>
                        </div>

                        <div class="form-group error-show">
                            <label>Dosen 2</label>
                            <select id="dosen_2" name="dosen_2" class="form-control select2">
                                <option selected disabled> Pilih ... </option>
                                @foreach ($dosen as $dos)
                                    <option value=" {{ $dos->nama_dosen }} "> {{ $dos->nama_dosen }} </option>
                                @endforeach
                            </select>
                            <div class="message-error"></div>
                        </div>

                        <div class="form-group">
                            <label>Tahun</label>
                            <select id="tahun" name="tahun" class="form-control select2">
                                <option selected disabled> Pilih ... </option>
                                @php
                                    $start = 2000;
                                    $end = date('Y');
                                @endphp
                                @for ($i = $end; $i >= $start; $i--)
                                    <option value="{{ $i }}"> Tahun {{ $i }} </option>
                                @endfor
                            </select>
                            <div class="message-error"></div>
                        </div>

                        <div class="form-group">
                            <label for="abstract">Abstract</label>
                            <textarea class="form-control" id="abstract" name="abstract" rows="8" placeholder="Masukkan Abstract"></textarea>
                            <div class="message-error"></div>
                        </div>

                        <div class="form-group">
                            <label for="comment">Keyword</label>
                            <div class="bootstrap-tagsinput w-100 border" data-id="keyword">
                                <input type="text" id="keyword" name="keyword" class="form-control"
                                    data-role="tagsinput">
                            </div>
                            <div class="message-error">
                                <small class="form-text text-muted">
                                    <i class="fas fa-bell"></i> Masukkan Keyword Yang Sesuai.
                                </small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Refrensi</label>
                            <div id="refrensi"></div>
                            <div class="message-error"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        {{-- upload cover --}}
                        <div class="position-relative">
                            <div class="input-file">
                                <img class="img-upload-preview w-100 rounded"
                                    src="{{ asset('storage/cover/default_cover.png') }}" id="img-tampil" height="400">
                                <input type="file" class="form-control form-control-file" id="uploadImage"
                                    name="uploadImage" accept="image/*">

                                <label for="uploadImage"
                                    class="position-absolute upload-cover label-input-file btn btn-black btn-round">
                                    <i class="fas fa-cloud-upload-alt"></i> Upload Cover
                                </label>
                            </div>
                            <div class="message-error"></div>
                        </div>
                        <!-- End Of Uplaod Image-->

                        {{-- uppload file --}}
                        <div class="position-relative mt-4">
                            <div class="input-file">
                                <input type="file" class="form-control form-control-file" id="uploadFile"
                                    name="uploadFile" accept=".pdf">
                            </div>

                            <label for="uploadFile" class="w-100 file-input-drop rounded">
                                <p class="m-0 text-center" id="fileName">
                                    <i class="fas fa-upload text-muted"></i><br>
                                    Silahkan Upload Dokumen Skripsi.
                                </p>
                            </label>
                            <div class="message-error"></div>
                        </div>
                        <!-- end of upload -->
                        <div class="mt-3 ">
                            <button class="btn btn-primary w-100"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
