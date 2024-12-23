<x-app-layout>
    <div class="row justify-content-evenly">
        <div class="col-md-12 pt-4 pb-3">
            <p class="fw-bold fs-1 pageHeading">{{ $approvedjob->requestedjob->job_code }} declined Finalize Request </p>
            <p class="fw-lighter pageHeading"><b>Declined {{ $finalizeRequest->created_at->diffForHumans() }} </b> by
                <b>{{ $finalizeRequest->declinedBy->name }}</b> </p>
        </div>
        <div class="col-md-12 pt-4 pb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Added Remarks from {{ $finalizeRequest->declinedBy->name }}</h5>
                    <p class="fw-bold pt-4">{{ $finalizeRequest->declineRemarks }} </p>
                </div>
            </div>
        </div>
        <div class="col-md-5 pt-4 pb-3">
            <div class="d-flex flex-column">
                <div class="card contentCard">
                    <div class="card-body">
                        <h3 class="card-title">Job Details</h3>
                        <h6 class="card-subtitle mt-4 mb-2 text-body-secondary">
                            {{ $approvedjob->requestedjob->service->name }}
                        </h6>
                        <h5 class="card-subtitle mb-2 fw-bold text-black">{{ $approvedjob->requestedjob->desc }}
                        </h5>
                        <p><b>Assigned :</b> {{ $approvedjob->created_at->diffForHumans() }} <b>By</b>
                            {{ $approvedjob->approvedBy->name }}</p>
                    </div>
                </div>
                <div class="card contentCard mt-5">
                    <div class="card-body">
                        <h3 class="card-title p-md-2">Daily Updates</h3>
                        <div class="card-body p-md-2">
                            <iframe style="height: 100vh; width:100%; border-radius:10px;"
                                src="{{ url($finalizeRequest->daily_updates) }}" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7 pt-4 pb-3">
            <div class="d-flex flex-column">
                <div class="card contentCard">
                    <div class="card-body">
                        <h3 class="card-title">Remarks</h3>
                        <p><b>{{ $finalizeRequest->remarks }}</b> </p>
                    </div>
                </div>
                <div class="card contentCard mt-5">
                    <div class="card-body">
                        <iframe style="height: 100vh; width:100%; border-radius:10px;"
                            src="{{ url('images/reportFiles/' . $finalizeRequest->job_report) }}"
                            frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
