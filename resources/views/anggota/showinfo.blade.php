<x-app-layout>
    <div id="app">
        @include('layouts.sidebar')
        <div id="main" class="layout-navbar">
            @include('layouts.header')
        </div>
        <div id="main">
            <div class="card">
                <div class="card-content text-center">
                    <img class="card-img-top img-fluid" src="{{ asset('storage/foto/'.$info->foto) }}" style="width: 500px" alt="Card image cap"/>
                    <div class="card-body">
                        <h4 class="card-title d-flex justify-content-center">{{ $info->judul }}</h4>
                        <p class="card-text">{{ $info->konten }}</p>
                        <a href="{{ route('anggota.info') }}" class="btn btn-primary block">Kembali</a>
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
