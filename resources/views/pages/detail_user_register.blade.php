@include('template.component.header')
<div class="wrapper horizontal-layout-3">
    <div class="main-panel">
        <div class="container d-flex">
            <div class="row m-auto">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-tittle">Data Mahasiswa</h3>

                            <form action="{{ route('auth.generate') }}" method="POST" id="generate-form">
                                @csrf
                                <div class="row mt-3">
                                    <div class="mt-4 col-md-6">
                                        <label>NIM</label>
                                        <input type="hidden" name="nim" value="{{ $mahasiswa->nim }}">
                                        <input type="text" class="form-control" disabled
                                            value="{{ $mahasiswa->nim }}">
                                    </div>

                                    <div class="mt-4 col-md-6">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" disabled
                                            value="{{ $mahasiswa->mahasiswa->nama_mahasiswa }}">
                                    </div>

                                    <div class="mt-4 col-md-6">
                                        <label>Jenis Kelamin</label>
                                        <input type="text" class="form-control" disabled
                                            value="{{ $mahasiswa->mahasiswa->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}">
                                    </div>

                                    <div class="mt-4 col-md-6">
                                        <label>Taggal Lahir</label>
                                        <input type="text" class="form-control" disabled
                                            value="{{ $mahasiswa->mahasiswa->tanggal_lahir }}">
                                    </div>

                                    <div class="mt-4 col-md-6">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" disabled
                                            value="{{ $mahasiswa->mahasiswa->tempat_lahir }}">
                                    </div>

                                    <div class="mt-4 col-md-6">
                                        <label>RT/RW</label>
                                        <input type="text" class="form-control" disabled
                                            value="{{ $mahasiswa->mahasiswa->rt . '/' . $mahasiswa->mahasiswa->rw }}">
                                    </div>

                                    <div class="mt-4 col-md-6">
                                        <label>Ibu Kandung</label>
                                        <input type="text" class="form-control" disabled
                                            value="{{ $mahasiswa->mahasiswa->nama_ibu_kandung ? $mahasiswa->mahasiswa->nama_ibu_kandung : '-' }}">
                                    </div>

                                    <div class="mt-4 col-md-6">
                                        <label>Ayah Kandung</label>
                                        <input type="text" class="form-control" disabled
                                            value="{{ $mahasiswa->mahasiswa->nama_ayah ? $mahasiswa->mahasiswa->nama_ayah : '-' }}">
                                    </div>

                                </div>

                                <div class="text-center mt-5 mb-3">
                                    <button class="btn btn-success" type="submit">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.component.tag_script')

@include('template.component.footer')
