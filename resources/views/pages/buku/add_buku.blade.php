@extends('template.template')
@section('content')
    <form data-url="{{ route('save.skripsi') }}" id="form-tambah-skripsi" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title mb-3">Tambah Buku</div>
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
                            <select id="nim" name="nim" class="form-control select2">
                                <option selected disabled> Pilih ... </option>
                                {{-- @forelse ($trx_mhs as $mhs)
                                            <option value="{{ $mhs->nim }}"> {{ $mhs->nim }} </option>
                                        @empty
                                        @endforelse --}}
                            </select>
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
                                    <option value="{{ $tm }}"> Tahun {{ $tm }} </option>
                                @endforeach
                            </select>
                            <div class="message-error"></div>
                        </div>

                        <div class="form-group">
                            <label for="abstract">Abstract</label>
                            <textarea class="form-control" id="abstract" name="abstract" rows="8" placeholder="Masukkan Abstract"></textarea>
                            <div class="message-error"></div>
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
                        <div class="position-relative border">
                            <div class="input-file">
                                <img class="img-upload-preview w-100 rounded"
                                    src="{{ asset('storage/cover/default_cover.jpg') }}" height="400" id="img-tampil">
                                <input type="file" class="form-control form-control-file" id="uploadImage"
                                    name="uploadImage" accept="image/*">

                                <label for="uploadImage"
                                    class="position-absolute upload-cover label-input-file btn btn-black btn-round">
                                    <i class="fas fa-cloud-upload-alt"></i> Upload Cover Buku
                                </label>
                            </div>
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
                                    Silahkan Upload Dokument Buku.
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
