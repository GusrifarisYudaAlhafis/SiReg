<x-app-layout>
    <div id="app">
        @include('layouts.sidebar')
        <div id="main" class="layout-navbar">
            @include('layouts.header')
        </div>
        <div id="main">
            <div class="row">
                @forelse($info as $i)
                    <div class="col-xl-4 col-md-6 col-sm-6">
                        <div class="card">
                            <div class="card-content">
                                <img class="img-fluid w-100" src="{{ asset('storage/foto/'.$i->foto) }}" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $i->judul }}</h4>
                                </div>
                            </div>
                            <a href="{{ route('anggota.showinfo', $i->id) }}" class="stretched-link"></a>
                        </div>
                    </div>
                @empty
                    <h1 class="text-center">Tidak ada data</h1>
                @endforelse
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
    </div>
</x-app-layout>
