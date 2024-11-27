<x-app-layout>
    <div class="row justify-content-evenly">
        <div class="col-md-4 pt-5 pb-5">
            <p class="fw-bold fs-1">Edit <br>Work <br>Update</p>
            <p class="fw-lighter">Edit your work update</p>
        </div>
        <div class="col-md-8 pt-5 pb-5">
            <div class="card">
                <div class="card-body p-md-5">
                    <form class="row g-4" method="POST" action="{{ route('dailyupdate.update', $dailyupdate) }}">
                        @csrf
                        @method('PUT')

                        <div class="col-md-12 mt-4">
                            <x-input-label for="update" :value="__('Edit Work Update')" />
                            <textarea name="update" id="update" rows="3" class="form-control">{{ $dailyupdate->update }}</textarea>
                            <x-input-error :messages="$errors->get('number')" class="mt-2" />
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <x-primary-button>
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
