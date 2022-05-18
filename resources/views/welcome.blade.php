<x-login-layout>
    <x-auth-card>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div id="auth">

            <div class="row d-flex justify-content-center">
                <div class="col-5 ">
                    <div id="auth-left" style="padding: 50px !important">
                        <div class="auth-logo text-center" style="margin-bottom: 40px !important">
                            <a href="/"><img src="{{ asset('assets/images/logo/logoatios.png') }}" alt="Logo" class="w-50 h-50 "></a>
                        </div>
                        <h1 class="text-center mb-4">Sistem Registrasi Member ATIOS</h1>

                        <div class="text-center">
                            <div class="text-center m-4  text-lg fs-4 btn btn-primary">
                                <a href="{{ route('register') }}" style="color: white;">Daftar</a>
                            </div>
                            <div class="text-center m-4 text-lg fs-4 btn btn-primary">
                                <a href="{{ route('login') }}" style="color: white;">Masuk</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </x-auth-card>
</x-login-layout>
