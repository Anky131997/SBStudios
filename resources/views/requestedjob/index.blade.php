<x-app-layout>
    <div class="row justify-content-evenly">
        <div class="col-md-12 pt-5 pb-5">
            <p class="fw-bold fs-1 pageHeading">Requested Jobs List</p>
        </div>
        <div class="col-md-12 pt-5 pb-5">
            <div class="card contentCard jobCard">
                <div class="card-body p-md-5">
                    <div class="row justify-content-between">
                        <div class="col-md-3 mb-4">
                            <button id="filterButton" type="button" class="btn btn-dark"><i class="bi bi-filter"></i>
                                Filter</button>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search by Job Code"
                                    aria-label="Example text with button addon" id="searchInput" aria-describedby="searchInput">
                                <button class="btn btn-dark" type="button" id="searchButton"
                                    onclick="searchTableForRecord()">Search</button>
                            </div>
                        </div>
                    </div>
                    <div id="filterArea" class="row justify-content-between filterArea">
                        <div class="col-md-3 mb-4">
                            <select id="serviceFilter" onchange="filterTable()" class="form-select"
                                aria-label="Default select example">
                                <option value="" selected>All Services</option>
                                @foreach ($requestedServices as $requestedService)
                                    <option value="{{ $requestedService->name }}">{{ $requestedService->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-4">
                            <select id="customerFilter" onchange="filterTable()" class="form-select"
                                aria-label="Default select example">
                                <option value="" selected>All Customers</option>
                                @foreach ($requestedCustomers as $requestedCustomer)
                                    <option value="{{ $requestedCustomer->name }}">{{ $requestedCustomer->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-4">
                            <select id="statusFilter" onchange="filterTable()" class="form-select"
                                aria-label="Default select example">
                                <option value="" selected>All Statuses</option>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="canceled">Canceled</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Job Code</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Job Description</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Customer Email</th>
                                    <th scope="col">Customer Number</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requestedJobs as $requestedJob)
                                    <tr>
                                        <td class="fw-bold">[{{ $requestedJob->job_code }}]</td>
                                        <td class="fw-bold">{{ $requestedJob->service->name }}</td>
                                        <td>{{ $requestedJob->desc }}</td>
                                        <td>{{ $requestedJob->customer->name }}</td>
                                        <td>{{ $requestedJob->customer->email }}</td>
                                        <td>{{ $requestedJob->customer->number }}</td>
                                        <td>{{ $requestedJob->status }}</td>
                                        <td>
                                            @if ($requestedJob->status == 'pending')
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-toggle="modal" data-bs-target="#modal-{{ $requestedJob->id }}"
                                                        >
                                                        <i class="bi bi-plus"></i>
                                                    </button>
                                                    <div class="modal fade" id="modal-{{ $requestedJob->id }}" tabindex="-1"
                                                        aria-labelledby="modalLabel-{{ $requestedJob->id }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="modalLabel-{{ $requestedJob->id }}">
                                                                        Approve and Assign the job</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form action="{{ route('approvedjobs.store') }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="col-md-12 mb-4">
                                                                            <p class="fs-5">Job Description</p>
                                                                            <p class="fw-light">
                                                                                {{ $requestedJob->desc }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-12 mb-4">
                                                                            <input type="hidden" id="requestedJob" name='requestedJob' value={{$requestedJob->id}}>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <x-input-label for="user"
                                                                                :value="__('Select an Employee')" />
                                                                            <select id="user" name="user"
                                                                                class="form-select">
                                                                                <option value="" selected>
                                                                                    --Select
                                                                                    an
                                                                                    Employee--
                                                                                </option>
                                                                                @foreach ($users as $user)
                                                                                    <option value={{ $user->id }}>
                                                                                        {{ $user->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            {{-- <x-input-error :messages="$errors->get('role')" class="mt-2" /> --}}
                                                                        </div>
                                                                        <div class="col-md-12 mt-4">
                                                                            <x-input-label for="remarks"
                                                                                :value="__('Remarks')" />
                                                                            <textarea name="remarks" id="remarks" rows="3" class="form-control"></textarea>
                                                                            {{-- <x-input-error :messages="$errors->get('description')" class="mt-2" /> --}}
                                                                        </div>
                                                                    </div>
                                                                    <x-primary-button class="ms-3 mt-1 mb-3">
                                                                        {{ __('Approve and Assign') }}
                                                                    </x-primary-button>
                                                                    <button type="button"
                                                                        class="btn btn-secondary mt-1 mb-3"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <a type="button" href={{ route('requestedjob.show', $requestedJob) }} class="btn btn-warning"><i class="bi bi-eye-fill"></i></a> --}}
                                                    <button type="button"
                                                        class="btn btn-danger"data-bs-toggle="modal"
                                                        data-bs-target="#cancelmodal-{{ $requestedJob->id }}"
                                                        ><i
                                                            class="bi bi-trash-fill"></i></button>
                                                    <div class="modal fade" id="cancelmodal-{{ $requestedJob->id }}" tabindex="-1"
                                                        aria-labelledby="cancelmodalLabel-{{ $requestedJob->id }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5"
                                                                        id="cancelmodalLabel-{{ $requestedJob->id }}">
                                                                        Cancel the job</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form action="{{ route('canceledjobs.store') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="col-md-12 mb-4">
                                                                            <p class="fs-5">Job Description</p>
                                                                            <p class="fw-light">
                                                                                {{ $requestedJob->desc }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-12 mb-4">
                                                                            <input type="hidden" id="requestedJobCancel" name='requestedJobCancel' value={{$requestedJob->id}}>
                                                                            
                                                                            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                                                                        </div>
                                                                        <div class="col-md-12 mt-4">
                                                                            <x-input-label for="remarks"
                                                                                :value="__('Remarks')" />
                                                                            <textarea name="remarks" id="remarks" rows="3" class="form-control"></textarea>
                                                                            {{-- <x-input-error :messages="$errors->get('description')" class="mt-2" /> --}}
                                                                        </div>
                                                                    </div>
                                                                    <x-primary-button class="ms-3 mt-1 mb-3">
                                                                        {{ __('Cancel the Job') }}
                                                                    </x-primary-button>
                                                                    <button type="button"
                                                                        class="btn btn-secondary mt-1 mb-3"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif ($requestedJob->status == 'approved')
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a type="button"
                                                        href={{ route('approvedjobs.show', $requestedJob->approvedjob) }}
                                                        class="btn btn-primary text-white"><i
                                                            class="bi bi-calendar-plus-fill"></i></a>
                                                </div>
                                            @elseif ($requestedJob->status == 'canceled')
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#modal-{{ $requestedJob->id }}">
                                                    <i class="bi bi-arrow-clockwise"></i>
                                                </button>
                                                <div class="modal fade" id="modal-{{ $requestedJob->id }}" tabindex="-1"
                                                    aria-labelledby="modalLabel-{{ $requestedJob->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="modalLabel-{{ $requestedJob->id }}">
                                                                    Restore the Job</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <form
                                                                action="{{ route('canceledjob.delete', $requestedJob->canceledjob) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="modal-body">
                                                                    <div class="col-md-12 mb-4">
                                                                        <p class="fs-5">Job Description</p>
                                                                        <p class="fw-light">
                                                                            {{ $requestedJob->desc }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-12 mb-4">
                                                                        <input type="hidden" id="requestedJob" name='requestedJob' value={{$requestedJob->id}}>

                                                                        {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                                                                    </div>
                                                                </div>
                                                                <x-primary-button class="ms-3 mt-1 mb-3">
                                                                    {{ __('Restore the Job') }}
                                                                </x-primary-button>
                                                                <button type="button"
                                                                    class="btn btn-secondary mt-1 mb-3"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$requestedJobs->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>
    </div>

    <script>
        function filterTable() {
            // Get filter values
            const serviceFilter = document
                .getElementById("serviceFilter")
                .value.toLowerCase();
            const customerFilter = document.getElementById("customerFilter").value.toLowerCase();
            const statusFilter = document
                .getElementById("statusFilter")
                .value.toLowerCase();
            const table = document.getElementById("datatable");
            const rows = table.getElementsByTagName("tr");

            // Loop through rows (skip header row)
            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName("td");
                const service = cells[1]?.textContent.toLowerCase();
                const customer = cells[3]?.textContent.toLowerCase();
                const status = cells[6]?.textContent.toLowerCase();

                // Check if row matches all filters
                const matchesService = serviceFilter === "" || service === serviceFilter;
                const matchesCustomer = customerFilter === "" || customer === customerFilter;
                const matchesStatus = statusFilter === "" || status === statusFilter;

                // Show or hide row
                rows[i].style.display = (matchesService && matchesCustomer && matchesStatus) ? "" : "none";
            }
        }

        function searchTableForRecord() {
            const search = document.getElementById('searchInput').value.toLowerCase();
            const searchInput = '['+search+']';
            console.log(searchInput);
            
            const table = document.getElementById("datatable");
            const rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName("td");
                const jobRole = cells[0]?.textContent.toLowerCase();

                // Check if row matches all filters
                const matchesJobRole = searchInput === "" || jobRole === searchInput;

                // Show or hide row
                rows[i].style.display = matchesJobRole ? "" : "none";
            }
        }


        const toggleButton = document.getElementById("filterButton");
        const mySection = document.getElementById("filterArea");
        const serviceFilter = document.getElementById("serviceFilter");
        const customerFilter = document.getElementById("customerFilter");
        const statusFilter = document.getElementById("statusFilter");
        const table = document.getElementById("datatable");
        const rows = table.getElementsByTagName("tr");

        // Add a click event listener to the button
        toggleButton.addEventListener("click", function() {
            // Toggle the display of the section
            mySection.classList.toggle("filterArea");
            serviceFilter.value = "";
            customerFilter.value = "";
            statusFilter.value = "";

            for (let i = 1; i < rows.length; i++) {
                rows[i].style.display = "";
            }
        });
    </script>

</x-app-layout>
