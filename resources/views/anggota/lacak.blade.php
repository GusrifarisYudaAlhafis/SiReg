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

                        <form action="{{ route('anggota.tracking') }}" method="post" enctype="multipart/form-data">
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
