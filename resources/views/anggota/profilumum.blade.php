<x-app-layout>
    <div id="app">
        @include('layouts.sidebar')
        <div id="main" class="layout-navbar">
            @include('layouts.header')
        </div>
        <div id="main">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <h5 class="card-title">Profil</h5>
                </div>
                <div class="card-body">
                    <div class="col-lg-3 mb-2 text-center" style="margin: auto;">
                        @foreach ($profil as $p)
                        @endforeach
                        <a href="#">
                            @if($p->foto == null)
                                <img class="rounded-circle" width="250" height="250" src="{{ asset('assets/images/faces/1.jpg') }}" alt="profil">
                            @else
                                <img class="rounded-circle" width="250" height="250" src="{{ asset('storage/foto/'.$p->foto) }}" alt="profil">
                            @endif
                        </a>
                    </div>
                    <div class="card">
                        <div class="col-lg-8 mb-2 mt-4" style="margin: auto;">
                            <form action="{{ route('anggota.updateprofilumum', $p->id) }}" class=" form form-vertical" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group has-icon-left">
                                                <label for="nama"><b>Nama</b></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama" value="{{ $p->nama }}">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group has-icon-left">
                                                <label for="tempat_lahir"><b>Tempat Lahir</b></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Tempat Lahir" id="tempat_lahir" name="tempat_lahir" value="{{ $p->tempat_lahir }}">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-geo-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group has-icon-left">
                                                <label for="tanggal_lahir"><b>Tanggal Lahir</b></label>
                                                <div class="position-relative">
                                                    <input type="date" class="form-control" placeholder="Tanggal Lahir" id="tanggal_lahir" name="tanggal_lahir" value="{{ $p->tanggal_lahir }}">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group has-icon-left">
                                                <label for="jenis_kelamin"><b>Jenis Kelamin</b></label>
                                                <div class="position-relative">
                                                    <fieldset class="form-group pr-3">
                                                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                                            <option selected value="{{ $p->jenis_kelamin }}">{{ $p->jenis_kelamin }}</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                            <option value="Laki-laki">Laki-Laki</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="alamat"><b>Alamat</b></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Alamat" id="alamat" name="alamat" value="{{ $p->alamat }}">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-house"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="hp"><b>No Hp</b></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="No Hp" id="hp" name="hp" value="{{ $p->hp }}">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="identitas"><b>KTP/KTM</b></label>
                                                <div class="position-relative">
                                                    <a type="button" class="btn btn-primary" href="{{ asset('storage/kartu_identitas/'.$p->kartu_identitas) }}" download>Unduh</a>
                                                    <input type="file" class="form-control" id="identitas" name="kartu_identitas" value="{{ old('kartu_identitas') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="foto"><b>Foto</b></label>
                                                <div class="position-relative">
                                                    <input type="file" class="form-control" id="foto" name="foto" value="{{ old('foto') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
