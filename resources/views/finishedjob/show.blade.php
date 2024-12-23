<x-app-layout>
    <div class="row justify-content-evenly">
        <div class="col-md-12 pt-5 pb-5">
            <p class="fw-bold fs-1 pageHeading">{{ $finishedJob->job_code }} Finalized Details </p>
        </div>
        <div class="col-md-12 pt-3 pb-3">
            <div class="card contentCard">
                <div class="card-body p-md-5 text-center">
                    <h5 class="card-title">Added Remarks from {{ $finishedJob->declinedBy->name }}
                    </h5>
                    <p class="fw-bold pt-4">{{ $finishedJob->remarks }} </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 pt-5 pb-5">
            <div class="d-flex flex-column">
                <div class="card contentCard">
                    <div class="card-body">
                        <h3 class="card-title">Job Details</h3>
                        <h6 class="card-subtitle mt-4 mb-2 text-body-secondary">
                            {{ $finishedJob->service->name }}
                        </h6>
                        <h5 class="card-subtitle mb-2 fw-bold text-black">{{ $finishedJob->desc }}
                        </h5>
                        <p><b>Finished :</b> {{ $finishedJob->created_at->diffForHumans() }} <b>By</b>
                            {{ $finishedJob->assignedTo->name }}</p>
                    </div>
                </div>
                <div class="card cardContent mt-5">
                    <div class="card-body">
                        <iframe style="height: 100vh; width:100%; border-radius:10px;"
                            src="{{ url((string) $finishedJob->job_updates) }}" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 pt-5 pb-5">
            <div class="d-flex flex-column">
                <div class="card contentCard">
                    <div class="card-body">
                        <h3 class="card-title">Client Details</h3>
                        <h3 class="card-subtitle mt-4 mb-2 text-body-secondary">
                            {{ $finishedJob->customer->name }}
                        </h3>
                        <h5 class="card-subtitle mb-2 fw-bold text-black">{{ $finishedJob->customer->number }}
                        </h5>
                        <p><b>{{ $finishedJob->customer->email }}</b></p>
                    </div>
                </div>
                <div class="card cardContent mt-5">
                    <div class="card-body">
                        <iframe style="height: 100vh; width:100%; border-radius:10px;"
                            src="{{ url('images/reportFiles/' . $finishedJob->job_report) }}" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
