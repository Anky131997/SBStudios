<x-app-layout>
    <div class="row justify-content-evenly">
        @if (Auth::user()->role == 'worker')
            @if ($approvedjob->requestfinalize == false)
                <div class="col-md-12 pt-4 pb-3">
                    <p class="fw-bold fs-1 pageHeading"> {{ $approvedjob->requestedjob->job_code }} Daily Updates</p>
                    <p class="fw-lighter pageHeading">Add daily work details </p>
                </div>
                <div class="col-md-4 pt-5 pb-5">
                    <div class="card contentCard" style="width: 18rem;">
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
                </div>
                <div class="col-md-8 pt-5 pb-5">
                    <div class="card contentCard">
                        <div class="card-body p-md-5">
                            <form class="row g-4" method="POST" action="{{ route('dailyupdate.store') }}">
                                @csrf

                                <div class="col-md-12">
                                    <x-text-input id="jobid" type="hidden" name="jobid" :value="old('jobid')"
                                        required autofocus autocomplete="username" />
                                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                                </div>
                                <div class="col-md-12 mt-4">
                                    <x-input-label class="fw-bold" for="update" :value="__('Update Your Work')" />
                                    <textarea name="update" id="update" rows="3" class="form-control"></textarea>
                                    {{-- <x-input-error :messages="$errors->get('update')" class="mt-2" /> --}}
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <x-primary-button>
                                        {{ __('Add Update') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @elseif (Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager')
            <div class="col-md-12 pt-4 pb-4">
                <p class="fw-bold fs-1 pageHeading">{{ $approvedjob->requestedjob->job_code }} Worklog</p>
                <p class="fs-5 pageHeading">Assigned to: <b>{{ $approvedjob->assignedTo->name }}</b> by
                    <b>{{ $approvedjob->approvedBy->name }}</b>, <b>{{ $approvedjob->created_at->diffForHumans() }}</b>
                </p>
            </div>
            <div class="col-md-12 pb-4">
                <div class="card contentCard">
                    <div class="card-body">
                        <h3 class="card-title pb-3">Job Details</h3>
                        <p class="fs-5"><b>Client Remarks: </b> {{ $approvedjob->requestedjob->desc }} </p>
                        <p class="fs-5"><b>Manager Remarks: </b> {{ $approvedjob->remarks }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if ($approvedjob->requestfinalize == false)
            @if ($latestDeclineRequest)
                <div class="col-md-12 pt-3 pb-3">
                    <div class="card contentCard">
                        <div class="card-body p-md-5 text-center">
                            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager')
                                <p>The last Finalize Request was declined by
                                    <b>{{ $latestDeclineRequest->declinedBy->name }}</b>.
                                </p>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Added Remarks from {{ $latestDeclineRequest->declinedBy->name }}</h5>
                                        <p class="fw-bold pt-4">{{ $latestDeclineRequest->declineRemarks }} </p>
                                    </div>
                                </div>
                            @else
                                <p>Your last Finalize Request was declined by
                                    <b>{{ $latestDeclineRequest->declinedBy->name }}</b>.
                                </p>
                            @endif

                        </div>
                    </div>
                </div>
            @endif
        @endif

        @if ($approvedjob->requestfinalize == false)
            @if ($allDeclinedRequests->count() > 0)
                <div class="col-md-12 pt-3 pb-3">
                    <div class="card">
                        <div class="card-body p-md-5">
                            <h4 class="card-title fw-bold">Previous Finalize Requests</h4>
                            <div class="table-responsive pt-4">
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Employee Remarks</th>
                                            <th>Declined By</th>
                                            <th>Declined Remarks</th>
                                            <th>Declined At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allDeclinedRequests as $declinedRequest)
                                            <tr>
                                                <td>{{ $declinedRequest->remarks }} </td>
                                                <td>{{ $declinedRequest->declinedBy->name }}</td>
                                                <td>{{ $declinedRequest->declineRemarks }}</td>
                                                <td>{{ $declinedRequest->declined_at->diffForHumans() }}</td>
                                                <td>
                                                    <a href="{{ route('finalizerequest.show', $declinedRequest) }}" class="btn btn-sm btn-primary"><i class="bi bi-eye-fill"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif

        @if ($approvedjob->requestfinalize == false)
            @if ($updateCount > 0)
                <div class="col-md-12 pt-3 pb-5">
                    <div class="card contentCard">
                        <div class="card-body p-md-5">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Work Update</th>
                                            <th scope="col">Updated By</th>
                                            <th scope="col">Added</th>
                                            <th scope="col">Last Updated</th>
                                            @if (Auth::user()->role == 'worker')
                                                <th scope="col">Actions</th>
                                            @elseif (Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager')
                                                <th scope="col">Status</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dailyUpdates as $update)
                                            @if (Auth::user()->role == 'worker')
                                                @if ($update->status == 'current')
                                                    <tr>
                                                        <td class="fw-bold">{{ $update->update }}</td>
                                                        <td>{{ $update->approvedjob->assignedTo->name }}</td>
                                                        <td>{{ $update->created_at->diffForHumans() }}</td>
                                                        <td>{{ $update->updated_at->diffForHumans() }}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <a type="button" class="btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modal-{{ $update->id }}">
                                                                    <i
                                                                        class="bi
                                                bi-pencil-fill"></i>
                                                                </a>
                                                                <div class="modal fade" id="modal-{{ $update->id }}"
                                                                    tabindex="-1"
                                                                    aria-labelledby="modalLabel-{{ $update->id }}"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5"
                                                                                    id="modalLabel-{{ $update->id }}">
                                                                                    Edit your work update</h1>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <form
                                                                                action="{{ route('dailyupdate.update', $update) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="modal-body">
                                                                                    <textarea name="updateText" id="updateText" rows="3" class="form-control">{{ $update->update }} </textarea>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Save
                                                                                        changes</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deletemodal-{{ $update->id }}"><i
                                                                        class="bi bi-trash-fill"></i></button>
                                                                <div class="modal fade"
                                                                    id="deletemodal-{{ $update->id }}"
                                                                    tabindex="-1"
                                                                    aria-labelledby="deletemodalLabel-{{ $update->id }}"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5"
                                                                                    id="deletemodalLabel-{{ $update->id }}">
                                                                                    Delete your work update</h1>
                                                                                <button type="button"
                                                                                    class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <form
                                                                                action="{{ route('dailyupdate.delete', $update) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <div class="modal-body">
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger">Delete</button>
                                                                                </div>
                                                                                <div class="modal-footer">

                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- <a type="button" href={{ route('requestedjob.show', $requestedJob) }} class="btn btn-warning"><i class="bi bi-eye-fill"></i></a> --}}

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @elseif (Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager')
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
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if (Auth::user()->role == 'worker')
                                @if ($approvedjob->requestfinalize == false)
                                    <div class="finalizeRequest d-flex justify-start pt-3">
                                        <p class="pe-3">Want to finish the job?</p> <a href="#"
                                            class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#finalizeRequestModal">Initiate Finalize
                                            Request</a>
                                        <div class="modal fade" id="finalizeRequestModal" tabindex="-1"
                                            aria-labelledby="finalizeRequestModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="finalizeRequestModalLabel">
                                                            Initiate
                                                            Finalize Request</h1>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('finalizerequest.generate') }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="hidden" name="job_id"
                                                                value="{{ $approvedjob->id }}">
                                                            <div class="mb-3">
                                                                <label for="reportFile" class="form-label">Upload Job
                                                                    Report
                                                                    File</label>
                                                                <input class="form-control" type="file"
                                                                    id="reportFile" name="reportFile">
                                                            </div>
                                                            <div class="mt-4 mb-3">
                                                                <label for="remarks"
                                                                    class="form-label">Remarks</label>
                                                                <textarea class="form-control" rows="3" id="remarks" name="remarks"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        @elseif ($approvedjob->requestfinalize == true)
            <div class="col-md-12 pt-3 pb-3">
                <div class="card contentCard">
                    <div class="card-body p-md-5 text-center">
                        @foreach ($approvedjob->finalizerequest as $finalizerequest)
                            @if ($finalizerequest->status == 'pending')
                                @if (Auth::user()->role == 'worker')
                                    <p>You have requested for finalizing this job
                                        <b>{{ $finalizerequest->created_at->diffForHumans() }}</b>. Please wait for the
                                        manager to approve your request.
                                    </p>
                                @elseif (Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager')
                                    <p>{{ $approvedjob->assignedTo->name }} requested for finalizing this job
                                        <b>{{ $finalizerequest->created_at->diffForHumans() }}</b>. Please respond to
                                        the request.
                                    </p>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select the input field by its ID
            const inputField = document.getElementById('jobid');
            const data = {{ $approvedjob->id }}

            // Set a value for the input field
            inputField.value = data;
        });
    </script>
</x-app-layout>
