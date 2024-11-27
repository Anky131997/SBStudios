<x-app-layout>
    <div class="row justify-content-evenly">
        <div class="col-md-4 pt-5 pb-5">
            <p class="fw-bold fs-1 pageHeading">Employee <br>Registration <br>Form</p>
            <p class="fw-lighter pageHeading">Add new Employees using this registration form</p>
        </div>
        <div class="col-md-8 pt-5 pb-5">
            <div class="card contentCard">
                <div class="card-body p-md-5">
                    <form class="row g-4" method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="col-md-6 mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" type="text" name="name" :value="old('name')" required
                                autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="col-md-6 mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" type="email" name="email" :value="old('email')" required
                                autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="col-md-6 mt-4">
                            <x-input-label for="dob" :value="__('Date of Birth')" />
                            <x-text-input id="dob" type="date" name="dob" :value="old('dob')" required
                                autocomplete="username" />
                            <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                        </div>

                        <div class="col-md-6 mt-4">
                            <x-input-label for="number" :value="__('Number')" />
                            <x-text-input id="number" type="number" name="number" :value="old('number')" required
                                autocomplete="username" />
                            <x-input-error :messages="$errors->get('number')" class="mt-2" />
                        </div>

                        <div class="col-md-12 mt-4">
                            <x-input-label for="address" :value="__('Address')" />
                            <textarea name="address" id="address" rows="3" class="form-control"></textarea>
                            <x-input-error :messages="$errors->get('number')" class="mt-2" />
                        </div>

                        <div class="col-md-6 mt-4">
                            <x-input-label for="designation" :value="__('Designation')" />
                            <select id="designation" name="designation" class="form-select">
                                <option selected>--Select a Designation--</option>
                                <option value="3d_artist">3D Artist</option>
                                <option value="2d_artist">2D Artist</option>
                                <option value="developer">Developer</option>
                            </select>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>

                        <div class="col-md-6 mt-4">
                            <x-input-label for="role" :value="__('Role')" />
                            <select id="role" name="role" class="form-select">
                                <option selected>--Select a role--</option>
                                @if (Auth::user()->role == 'superadmin')
                                    <option value="superadmin">Super-Admin</option>
                                @endif
                                <option value="manager">Manager</option>
                                <option value="worker">Worker</option>
                            </select>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="col-md-6 mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" type="password" name="password" required
                                autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-md-6 mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                                required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <x-primary-button>
                                {{ __('Register') }}
                            </x-primary-button>

                            <a class="link-opacity-100-hover" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
