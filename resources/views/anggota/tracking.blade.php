<x-app-layout>
    <div id="app">
        @include('layouts.sidebar')
        <div id="main" class="layout-navbar">

            @include('layouts.header')
        </div>

        <div id="main">
            <div class="card">
                <div class="page-content p-3" style="text-align: center; ">

                    <h4>Lacak Tiket</h4>
                    <div class="card-body">

                        <form action="{{ route('anggota.tracking') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Masukkan Kode Tiket</label>
                                        <input type="text" name="kode" class="form-control" id="basicInput" autofocus>
                                    </div>

                                    <div class="form-actions d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Lacak</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        @if ($tiket == null)

                        @else

                        <div class="row">
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <h5>Kode Tiket Anda: {{ $tiket[0]->kode }}</h5>
                                </div>
                            </div>
                        </div>
                        <table class=" table table-striped w-50" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tiket as $ti)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ date_format($ti->updated_at, 'd-m-Y H:i:s') }} </td>
                                    <td>{{ $ti->status }}</td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">Silahkan masukkan kode tiket Anda</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        @endif

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
