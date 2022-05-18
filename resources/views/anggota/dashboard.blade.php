<x-app-layout>
    <div id="app">
        @include('layouts.sidebar')
        <div id="main" class="layout-navbar">

            @include('layouts.header')
        </div>

        <div id="main">
            <div class="card">
                <div class="page-heading text-center pt-4 pb-3" style="background-color: #435ebe;">
                    <h3 style="color: white; border-radius:0.5">Selamat Datang di Sistem Registrasi Member ATIOS</h3>
                </div>
                <div class="page-content" style="text-align: center; ">

                    <h4>Silahkan Daftarkan Diri Anda</h4>

                    <div class="row pt-3 pb-5">
                        <div class="button">
                            <a href="{{ route('anggota.daftarumum') }}" class="btn btn-primary">Umum</a>
                            <a href="{{ route('anggota.daftarasc') }}" class="btn btn-primary">ASC</a>
                            <a href="{{ asset('storage/kesediaan/LAMPIRAN LAPORAN KESEDIAAN ANGGOTA.docx') }}" class="btn btn-info" download>Download kesediaan anggota</a>
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
