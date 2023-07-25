@extends('template.template')
@section('content')
    <form data-url="{{ route('update.skripsi', $data->id_skripsi) }}" id="form-update-skripsi" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Skripsi</div>

                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <textarea class="form-control" id="judul" name="judul" rows="3" placeholder="Masukkan Judul..">{{ $data->judul }}</textarea>
                            <div class="message-error"></div>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" disabled value="{{ $data->nama }}">
                            <div class="message-error"></div>
                        </div>

                        <div class="form-group">
                            <label>NIM</label>
                            <select id="nim" class="form-control" disabled>
                                <option selected disabled> {{ $data->nim }} . </option>
                            </select>
                            <div class="message-error"></div>
                        </div>

                        <div class="form-group">
                            <label>Program Studi</label>
                            <select id="prodi" name="prodi" class="form-control" disabled>
                                <option selected>
                                    {{ $data->program_studi == '55201' ? 'Teknik Informatika' : 'Sistem Informasi' }}
                                </option>
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
                                    @if ($data->tema == $tm)
                                        <option value="{{ $tm }}" selected>{{ $tm }} </option>
                                    @else
                                        <option value="{{ $tm }}"> Tahun {{ $tm }} </option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="message-error"></div>
                        </div>

                        <div class="form-group">
                            <label>Dosen 1</label>
                            <select id="dosen_1" name="dosen_1" class="form-control select2">
                                @foreach ($dosen as $dos)
                                    @if ($dos->nama_dosen == $data->dosen_1)
                                        <option selected value="{{ $data->dosen_1 }}"> {{ $data->dosen_1 }} </option>
                                    @endif
                                    <option value=" {{ $dos->nama_dosen }}"> {{ $dos->nama_dosen }} </option>
                                @endforeach
                            </select>
                            <div class="message-error"></div>
                        </div>

                        <div class="form-group error-show">
                            <label>Dosen 2</label>
                            <select id="dosen_2" name="dosen_2" class="form-control select2">
                                @foreach ($dosen as $dos)
                                    @if ($dos->nama_dosen == $data->dosen_2)
                                        <option selected value="{{ $data->dosen_2 }}"> {{ $data->dosen_2 }} </option>
                                    @endif
                                    <option value=" {{ $dos->nama_dosen }}"> {{ $dos->nama_dosen }} </option>
                                @endforeach
                            </select>
                            <div class="message-error"></div>
                        </div>

                        <div class="form-group">
                            <label>Tahun</label>
                            <select id="tahun" name="tahun" class="form-control select2">
                                <option disabled> Pilih ... </option>
                                @php
                                    $start = 2000;
                                    $end = date('Y');
                                @endphp
                                @for ($i = $end; $i >= $start; $i--)
                                    @if ($data->tahun == $i)
                                        <option value="{{ $i }}" selected>
                                            Tahun {{ $i }}
                                        </option>
                                    @else
                                        <option value="{{ $i }}"> Tahun {{ $i }} </option>
                                    @endif
                                @endfor
                            </select>
                            <div class="message-error"></div>
                        </div>

                        <div class="form-group">
                            <label for="abstract">Abstract</label>
                            <textarea class="form-control" id="abstract" name="abstract" rows="8" placeholder="Masukkan Abstract">{{ $data->abstract }}</textarea>
                            <div class="message-error"></div>
                        </div>

                        <div class="form-group">
                            <label for="comment">Keyword</label>
                            <div class="bootstrap-tagsinput w-100 border" data-id="keyword">
                                <input type="text" id="keyword" name="keyword" class="form-control"
                                    data-role="tagsinput" value="{{ $data->keyword }}">
                            </div>

                            <div class="message-error">
                                <small class="form-text text-muted">
                                    <i class="fas fa-bell"></i> Masukkan Keyword Yang Sesuai.
                                </small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Refrensi</label>
                            <div id="refrensi">{!! $data->refrensi !!}</div>
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
                                    src="{{ asset('storage/cover/' . ($data->cover ? $data->cover : 'default_cover.jpg')) }}"
                                    id="img-tampil" height="400">
                                <input type="file" class="form-control form-control-file" id="uploadImage"
                                    name="uploadImage" accept="image/*">

                                <label for="uploadImage"
                                    class="position-absolute upload-cover label-input-file btn btn-black btn-round">
                                    <i class="fas fa-cloud-upload-alt"></i> Upload Cover
                                </label>
                            </div>
                        </div>
                        <!-- End Of Uplaod Image-->

                        {{-- uppload file --}}
                        <div class="position-relative mt-4">
                            <div class="input-file">
                                <input type="file" class="form-control form-control-file" id="uploadFile"
                                    name="uploadFile" accept="application/pdf">
                            </div>

                            <label for="uploadFile" class="w-100 file-input-drop rounded">
                                <p class="m-0" id="fileName">
                                    {{ $data->dokumen }}
                                </p>
                            </label>
                            <div class="message-error"></div>
                        </div>
                        <!-- end of upload -->
                        <div class="mt-3 d-flex justify-content-between">
                            <button class="btn btn-primary w-100"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
