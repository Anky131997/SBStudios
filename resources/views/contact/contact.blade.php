<x-guest-layout>
    <div class="row justify-content-evenly">
        <div class="col-md-4 pt-5 pb-5">
            <p class="fw-bold fs-1 pageHeading">Contact <br>Form</p>
        </div>
        <div class="col-md-8 pt-5 pb-5">
            <div class="card">
                <div class="card-body p-md-5">
                    <form id="submitForm" class="row g-4" method="POST" action="{{ route('requestedjob.store') }}">
                        @csrf

                        <div class="col-md-4 mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" type="text" name="name" :value="old('name')" required
                                autofocus autocomplete="username" />
                            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                        </div>
                        <!-- Email Address -->
                        <div class="col-md-4 mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" type="email" name="email" :value="old('email')" required
                                autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="col-md-4 mt-4">
                            <x-input-label for="number" :value="__('Number')" />
                            <x-text-input id="number" type="number" name="number" :value="old('number')" required
                                autofocus autocomplete="username" />
                            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                        </div>

                        <!-- Password -->
                        <div class="col-md-12 mt-4">
                            <x-input-label for="service" :value="__('Service')" />
                            <select id="service" name="service" class="form-select">
                                <option selected>--Select a Service--</option>
                                @foreach ($services as $service)
                                    <option value={{ $service->id }}>{{ $service->name }}</option>
                                @endforeach
                            </select>
                            {{-- <x-input-error :messages="$errors->get('role')" class="mt-2" /> --}}
                        </div>

                        <!-- Remember Me -->
                        <div class="col-md-12 mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                            {{-- <x-input-error :messages="$errors->get('description')" class="mt-2" /> --}}
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <x-primary-button class="ms-3">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-guest-layout>
