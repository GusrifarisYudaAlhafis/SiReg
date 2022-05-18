<x-app-layout>
    <div id="app">
        @include('layouts.sidebar')
        <div id="main" class="layout-navbar">
            @include('layouts.header')
        </div>
        <div id="main">
            <div class="card text-center" id="card">
                <img src="{{ asset('assets/images/logo/1.png') }}" class="card-img " alt="..." style="height: 300px; width:500px; margin:auto;">
                <div class="card-img-overlay" style="background-color: transparent !important">
                    @foreach ($profil as $pf)
                    @endforeach
                    <img src="storage/foto/{{$pf->foto}}" class="card-img " alt="..." style="height: 150px; width:150px; margin-top:23px;">
                    <h5 class=" card-title" style="padding-top:10px !important">{{ $pf->nama }}</h5>
                    <h5 class="card-text" style="color: white !important ">{{ $pf->bidang->nama }}</h5>
                </div>
            </div>
            <button class="btn btn-primary mb-5" type="button" onclick="cetak()">Cetak</button>
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

    @section('scripts')
        <script>
            function cetak() {
                var element = document.getElementById('card');
                html2pdf(element);
            }
        </script>
    @endsection
</x-app-layout>
