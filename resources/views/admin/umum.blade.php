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

                            <h3>Daftar Anggota Umum</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($anggota as $a)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $a->tiket->kode }}</td>
                                        <td>{{ $a->nama }}</td>
                                        <td>
                                            @if($a->tiket->status == 'Diproses')
                                                <span class="badge bg-warning">{{ $a->tiket->status }}</span>
                                            @elseif($a->tiket->status == 'Lulus')
                                                <span class="badge bg-success">{{ $a->tiket->status }}</span>
                                            @elseif($a->tiket->status == 'Tidak Lulus')
                                                <span class="badge bg-danger">{{ $a->tiket->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#lihat{{ $a->id }}"><i class=" bi bi-person"></i></a>
                                            <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{ $a->id }}"><i class=" bi bi-pen"></i></a>
                                            <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus{{ $a->id }}"><i class="bi bi-trash"></i></a>

                                            <!-- Modal Lihat -->
                                            <div class="modal fade text-left" id="lihat{{ $a->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content text-center">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="edit">Data Anggota</h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-12">
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <img src="{{ asset('storage/foto/'.$a->foto) }}" alt="profil" class="rounded-circle" width="100" height="100">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group has-icon-left">
                                                                    <label>Kode</label>
                                                                    <div class="position-relative">
                                                                        <p>{{ $a->tiket->kode }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group has-icon-left">
                                                                    <label>Nama</label>
                                                                    <div class="position-relative">
                                                                        <p>{{ $a->nama }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group has-icon-left">
                                                                    <label>Bidang</label>
                                                                    <div class="position-relative">
                                                                        <p>{{ $a->bidang->nama }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group has-icon-left">
                                                                    <label>Email</label>
                                                                    <div class="position-relative">
                                                                        <p>{{ $a->email }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group has-icon-left">
                                                                    <label>Tempat/tanggal lahir</label>
                                                                    <div class="position-relative">
                                                                        <p>{{ $a->ttl }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group has-icon-left">
                                                                    <label>Jenis Kelamin</label>
                                                                    <div class="position-relative">
                                                                        <p>{{ $a->jenis_kelamin }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group has-icon-left">
                                                                    <label>Alamat</label>
                                                                    <div class="position-relative">
                                                                        <p>{{ $a->alamat }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group has-icon-left">
                                                                    <label>Nomor HP</label>
                                                                    <div class="position-relative">
                                                                        <p>{{ $a->hp }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group has-icon-left">
                                                                    <label>KTP/KTM</label>
                                                                    <div class="position-relative">
                                                                        <a type="button" class="btn btn-primary" href="{{ asset('storage/kartu_identitas/'.$a->kartu_identitas) }}" download>Unduh</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group has-icon-left">
                                                                    <label>Berkas Kesediaan Anggota</label>
                                                                    <div class="position-relative">
                                                                        <a type="button" class="btn btn-primary" href="{{ asset('storage/kesediaan/'.$a->kesediaan) }}" download>Unduh</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Close</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Edit -->
                                            <div class="modal fade text-left" id="edit{{ $a->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="edit">Edit Data Anggota </h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form class="form form-vertical" action="{{ route('admin.updateumum', $a->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="col-12">
                                                                    <div class="form-group has-icon-left">
                                                                        <label for="status">Status</label>
                                                                        <div class="position-relative">
                                                                            <fieldset class="form-group pr-3">
                                                                                <select class="form-select" id="status" name="status">
                                                                                    <option selected value="{{ $a->tiket->status }}">{{ $a->tiket->status }}</option>
                                                                                    <option value="Lulus">Lulus</option>
                                                                                    <option value="Tidak Lulus">Tidak Lulus</option>
                                                                                </select>
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Close</span>
                                                                </button>
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
                                            <div class="modal fade text-left" id="hapus{{ $a->id }}" tabindex="-1" role="dialog" aria-labelledby="hapus" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="hapus">Hapus Data Anggota </h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form class="form form-vertical" action="{{ route('admin.hapusumum', $a->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('delete')
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
                                        <td colspan="5">Tidak ada data</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
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
