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
                        <h1 class="text-center mb-4">Silahkan Login </h1>

                        <form method="post" action="{{ route('login') }}">

                            @csrf

                            <div class="form-floating mb-4">
                                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{old ('email') }}">
                                <label for="email">Email address</label>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                <label for="password">Password</label required>
                            </div>

                            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>


    </x-auth-card>
</x-login-layout>
