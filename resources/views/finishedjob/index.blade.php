<x-app-layout>
    <div class="row justify-content-evenly">
        <div class="col-md-12 pt-5 pb-5">
            <p class="fw-bold fs-1 pageHeading">Finished Jobs List</p>
        </div>
        <div class="col-md-12 pt-5 pb-5">
            <div class="card contentCard">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Job Code</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Job Description</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Time Taken</th>
                                    <th scope="col">Assigned To</th>
                                    <th scope="col">Assigned By</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($finishedJobs as $finishedJob)
                                    <tr>
                                        <td class="fw-bold">[{{ $finishedJob->job_code }}]</td>
                                        <td class="fw-bold">{{ $finishedJob->service->name }}</td>
                                        <td>{{ $finishedJob->desc }}</td>
                                        <td>{{ $finishedJob->customer->name }}</td>
                                        <td>{{ $finishedJob->timespan }}</td>
                                        <td>{{ $finishedJob->assignedTo->name }}</td>
                                        <td>{{ $finishedJob->approvedBy->name }}</td>
                                        <td>
                                            <a href="{{ route('finishedjob.show', $finishedJob) }}" class="btn btn-primary text-white"><i class="bi bi-eye-fill"></i></a>
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
</x-app-layout>