<x-app-layout>
    <div id="app">
        @include('layouts.sidebaradmin')
        <div id="main" class="layout-navbar">
            @include('layouts.header')
        </div>

        <div id="main">
            <div class="page-content">
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <a href="" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Data Informasi</a>
                            <h3>Daftar Informasi</h3>
                        </div>
                        <div class=" card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bidang</th>
                                        <th>Judul</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($informasi as $i)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->bidang->nama }}</td>
                                        <td>{{ $i->judul }}</td>
                                        <td>
                                            <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{ $i->id }}"><i class=" bi bi-pen"></i></a>
                                            <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus{{ $i->id }}"><i class="bi bi-trash"></i></a>

                                            <!-- Modal Edit -->
                                            <div class="modal fade text-left" id="edit{{ $i->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="edit">Edit Data Informasi </h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form class="form form-vertical" action="{{ route('admin.updateinfo', $i->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="judul">Judul</label>
                                                                        <input type="text" class="form-control" placeholder="Judul" id="judul" name="judul" value="{{ $i->judul }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="bidang">Bidang</label>
                                                                        <select class="form-select" aria-label="Default select example" name="bidang_id" required>
                                                                            <option value="{{ $i->bidang_id }}" selected>{{ $i->bidang->nama }}</option>
                                                                            @foreach ($bidang as $b)
                                                                            <option value="{{ $b->id }}">{{ $b->nama }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="konten">Keterangan</label>
                                                                        <input type="text" class="form-control" placeholder="Keterangan" id="konten" name="konten" value="{{ $i->konten }}">
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
                                                                <button type="submit" class="btn btn-primary ml-1">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Simpan</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Hapus -->
                                            <div class="modal fade text-left" id="hapus{{ $i->id }}" tabindex="-1" role="dialog" aria-labelledby="hapus" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="hapus">Hapus Data Informasi </h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form class="form form-vertical" action="{{ route('admin.hapusinfo', $i->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                            <p class="p-2">Yakin ingin Mengahapus data?</p>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <button type="submit" class="btn btn-danger ml-1">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Hapus</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">Tidak Ada Data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <!-- Modal Tambah -->
                <div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="tambah">Tambah Data Informasi </h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form class="form form-vertical" action="{{ route('admin.tambahinfo') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="judul">Judul</label>
                                            <input type="text" class="form-control" placeholder="Judul" id="judul" name="judul" value="{{ old('judul') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="bidang">Bidang</label>
                                            <select class="form-select" aria-label="Default select example" name="bidang_id" required>
                                                <option selected>Pilih bidang</option>
                                                @foreach ($bidang as $b)
                                                <option value="{{ $b->id }}">{{ $b->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="konten">Keterangan</label>
                                            <input type="text" class="form-control" placeholder="Keterangan" id="konten" name="konten" value="{{ old('konten') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <div class="position-relative">
                                                <input type="file" class="form-control" id="foto" name="foto" value="{{ old('foto') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary ml-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Simpan</span>
                                    </button>
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