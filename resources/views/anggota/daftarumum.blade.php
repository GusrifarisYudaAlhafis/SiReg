<x-app-layout>
    <div id="app">
        @include('layouts.sidebar')
        <div id="main" class="layout-navbar">
            @include('layouts.header')
        </div>

        <div id="main">
            <!-- Basic Vertical form layout section start -->
            <section id="basic-vertical-layouts">
                <div class="row match-height d-flex justify-content-center">
                    <div class="col-md-9 col-12">
                        <div class="card">
                            <div class="card-header" style="padding-bottom: 10px !important">
                                <h4 class=" card-title text-center"> Form Daftar Anggota Umum</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body" style="padding-top: 0px !important">
                                    <form class="form form-vertical" action="{{ route('anggota.simpanumum') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="nama">Nama</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama" value="{{ old ('nama') }}">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-person"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="email">Email</label>
                                                        <div class="position-relative">
                                                            <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{ old('email') }}">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-envelope"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="tempat_lahir">Tempat Lahir</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="Tempat Lahir" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-geo-alt"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                                        <div class="position-relative">
                                                            <input style="width: 200px;" type="date" class="form-control" placeholder="Tanggal Lahir" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                                        <div class="position-relative">
                                                            <fieldset class="form-group pr-3">
                                                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                                                    <option value="Pilih Jenis Kelamin" selected>Pilih Jenis Kelamin</option>
                                                                    <option value="Perempuan">Perempuan</option>
                                                                    <option value="Laki-laki">Laki-Laki</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="bidang_id">Bidang</label>
                                                        <div class="position-relative">
                                                            <fieldset class="form-group pr-3">
                                                                <select class="form-select" id="bidang_id" name="bidang_id">
                                                                    <option value="Pilih Bidang" selected>Pilih Bidang</option>
                                                                    @foreach ($bidang as $bd)
                                                                    <option value="{{ $bd->id }}">{{ $bd->nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="alamat">Alamat</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="Alamat" id="alamat" name="alamat" value="{{ old('alamat') }}">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-house"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="hp">No Hp</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="No Hp" id="hp" name="hp" value="{{ old('hp') }}">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-phone"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="foto">Foto</label>
                                                        <div class="position-relative">
                                                            <input type="file" class="form-control" id="foto" name="foto" value="{{ old('foto') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="kartu_identitas">KTP/KTM</label>
                                                        <div class="position-relative">
                                                            <input type="file" class="form-control" id="kartu_identitas" name="kartu_identitas" value="{{ old('kartu_identitas') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="kesediaan">Kesediaan</label>
                                                        <div class="position-relative">
                                                            <input type="file" class="form-control" id="kesediaan" name="kesediaan" value="{{ old('kesediaan') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Daftar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>{{ date('Y') }} &copy; ATIOS</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="https://atios.id/">ATIOS</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</x-app-layout>
