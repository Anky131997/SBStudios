<x-app-layout>
    <div class="row justify-content-evenly">
        <div class="col-md-4 pt-5 pb-5">
            <p class="fw-bold fs-1 pageHeading">Service <br>Image <br>Upload</p>
            <p class="fw-lighter pageHeading">Add new Images for certain Services</p>
        </div>
        <div class="col-md-8 pt-5 pb-5">
            <div class="card contentCard">
                <div class="card-body p-md-5">
                    <form class="row g-4" method="POST" enctype="multipart/form-data" action="{{ route('service.store') }}">
                        @csrf

                        <!-- Name -->
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

                        <div class="mt-4 mb-3">
                            <label for="formFile" class="form-label">Upload Image</label>
                            <input class="form-control" type="file" id="formFile" name="image">
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <x-primary-button>
                                {{ __('Upload') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
