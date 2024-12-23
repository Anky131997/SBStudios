<x-app-layout>
    <div class="row justify-content-evenly">
        <div class="col-md-12 pt-4 pb-3">
            <p class="fw-bold fs-1 pageHeading"> {{ $approvedjob->assignedTo->name }} requested for finalization of
                {{ $approvedjob->requestedjob->job_code }}</p>
            <p class="fw-lighter pageHeading"><b>{{ $finalizeRequest->created_at->diffForHumans() }} </b> </p>
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
                        <div class="card-body dailyUpdateTable p-md-2">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Work Update</th>
                                            <th scope="col">Updated By</th>
                                            <th scope="col">Added</th>
                                            <th scope="col">Last Updated</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dailyUpdates as $update)
                                            @if ($update->status == 'current')
                                                <tr class="table-success">
                                                    <td class="fw-bold">{{ $update->update }}</td>
                                                    <td>{{ $update->approvedjob->assignedTo->name }}</td>
                                                    <td>{{ $update->created_at->diffForHumans() }}</td>
                                                    <td>{{ $update->updated_at->diffForHumans() }}</td>
                                                    <td>{{ ucfirst($update->status) }}</td>
                                                </tr>
                                            @elseif ($update->status == 'edited')
                                                <tr class="table-warning">
                                                    <td class="fw-bold">{{ $update->update }}</td>
                                                    <td>{{ $update->approvedjob->assignedTo->name }}</td>
                                                    <td>{{ $update->created_at->diffForHumans() }}</td>
                                                    <td>{{ $update->updated_at->diffForHumans() }}</td>
                                                    <td>{{ ucfirst($update->status) }}</td>
                                                </tr>
                                            @elseif ($update->status == 'deleted')
                                                <tr class="table-danger">
                                                    <td class="fw-bold">{{ $update->update }}</td>
                                                    <td>{{ $update->approvedjob->assignedTo->name }}</td>
                                                    <td>{{ $update->created_at->diffForHumans() }}</td>
                                                    <td>{{ $update->updated_at->diffForHumans() }}</td>
                                                    <td>{{ ucfirst($update->status) }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
        <div class="col-md-12 pt-4 pb-3">
            <div class="card contentCard text-center d-flex flex-row" style="align-items: baseline;">
                <div class="card-body">
                    <p><b>Respond to the Request: </b></p>
                    <a href="#" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#finalizeTheJobRequestModal">Approve and Finalize the Job</a>
                    <div class="modal fade" id="finalizeTheJobRequestModal" tabindex="-1"
                        aria-labelledby="finalizeTheJobRequestModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="finalizeTheJobRequestModalLabel">
                                        Approve and Finalize the Job</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('finalizerequest.approve', $finalizeRequest) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <p class="float-start">Are you sure you want to finalize the job?</p>
                                        <textarea name="finalizeRemarks" id="finalizeRemarks" rows="3" class="form-control pt-3"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Yes, Finalize the Job</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-danger mt-3 mt-md-0"data-bs-toggle="modal"
                        data-bs-target="#declineTheJobRequestModal">Decline the Finalization Request</a>
                    <div class="modal fade" id="declineTheJobRequestModal" tabindex="-1"
                        aria-labelledby="declineTheJobRequestModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="declineTheJobRequestModalLabel">
                                        Decline the Finalization Request</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('finalizerequest.decline', $finalizeRequest) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <p class="float-start">Are you sure you want to decline this request?</p>
                                        <textarea name="declineRemarks" id="declineRemarks" rows="3" class="form-control pt-3"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Yes, Decline the
                                            Request</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
