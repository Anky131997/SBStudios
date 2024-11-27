<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="row justify-content-evenly">
        <div class="col-md-4 pt-5 pb-5">
            <p class="fw-bold fs-1 pageHeading">Login <br>Form</p>
        </div>
        <div class="col-md-8 pt-5 pb-5">
            <div class="card">
                <div class="card-body p-md-5">
                    <form id="submitForm" method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" type="password" name="password"
                                required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class=""
                                    name="remember">
                                <span
                                    class="">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-primary-button class="ms-3">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
