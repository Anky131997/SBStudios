<x-app-layout>
    <div class="row justify-content-evenly">
        <div class="col-md-4 pt-5 pb-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h3 class="card-title">{{ $user->name }}</h3>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $user->designation }}</h6>
                    <p><b>Joined :</b> {{ $user->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8 pt-5 pb-5">
            <div class="card">
                <div class="card-body p-md-5">
                    <div class="row justify-content-evenly">
                        <div class="col-md-12 pb-5">
                            <p class="fw-bold fs-4">Approved Jobs List</p>
                        </div>
                        <div class="col-md-12 pb-5">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Service</th>
                                            <th scope="col">Job Description</th>
                                            <th scope="col">Assigned To</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Approved By</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->assignedJobs as $approvedjob)
                                            <tr>
                                                <td class="fw-bold">
                                                    {{ $approvedjob->requestedjob->service->name }}</td>
                                                <td>{{ $approvedjob->requestedjob->desc }}</td>
                                                <td>{{ $approvedjob->assignedTo->name }}</td>
                                                <td>{{ $approvedjob->requestedjob->customer->name }}</td>
                                                <td>{{ $approvedjob->approvedBy->name }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a type="button"
                                                            href={{ route('approvedjobs.show', $approvedjob) }}
                                                            class="btn btn-primary text-white"><i
                                                                class="bi bi-calendar-plus-fill"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
