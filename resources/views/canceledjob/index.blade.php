<x-app-layout>
    <div class="row justify-content-evenly">
        <div class="col-md-12 pt-5 pb-5">
            <p class="fw-bold fs-1 pageHeading">Canceled Jobs List</p>
        </div>
        <div class="col-md-12 pt-5 pb-5">
            <div class="card contentCard">
                <div class="card-body p-md-5">
                    <div class="row justify-content-between">
                        <div class="col-md-3 mb-4">
                            <button id="filterButton" type="button" class="btn btn-dark"><i class="bi bi-filter"></i>
                                Filter</button>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search by Job Code"
                                    aria-label="Example text with button addon" id="searchInput"
                                    aria-describedby="searchInput">
                                <button class="btn btn-dark" type="button" id="searchButton"
                                    onclick="searchTableForRecord()">Search</button>
                            </div>
                        </div>
                    </div>
                    <div id="filterArea" class="row filterArea justify-content-between">
                        <div class="col-md-3 mb-4">
                            <select id="serviceFilter" onchange="filterTable()" class="form-select"
                                aria-label="Default select example">
                                <option value="" selected>All Services</option>
                                @foreach ($requestedservices as $requestedservice)
                                    <option value="{{ $requestedservice->name }}">{{ $requestedservice->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-4">
                            <select id="customerFilter" onchange="filterTable()" class="form-select"
                                aria-label="Default select example">
                                <option value="" selected>All Customers</option>
                                @foreach ($requestedcustomers as $requestedcustomer)
                                    <option value="{{ $requestedcustomer->name }}">{{ $requestedcustomer->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-4">
                            <select id="canceledbyFilter" onchange="filterTable()" class="form-select"
                                aria-label="Default select example">
                                <option value="" selected>All Managers</option>
                                @foreach ($requestedcanceledbys as $requestedcanceledby)
                                    <option value="{{ $requestedcanceledby->name }}">{{ $requestedcanceledby->name }}
                                    </option>
                                @endforeach
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
                                    <th scope="col">Canceled By</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($canceledjobs as $canceledjob)
                                    <tr>
                                        <td class="fw-bold">[{{ $canceledjob->requestedjob->job_code }}]</td>
                                        <td class="fw-bold">{{ $canceledjob->requestedjob->service->name }}</td>
                                        <td>{{ $canceledjob->requestedjob->desc }}</td>
                                        <td>{{ $canceledjob->requestedjob->customer->name }}</td>
                                        <td>{{ $canceledjob->canceledBy->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"
                                                onclick="sendDataToInput({{ $canceledjob->id }})">
                                                <i class="bi bi-arrow-clockwise"></i>
                                            </button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Approve and Assign the job</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('canceledjob.delete', $canceledjob) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-body">
                                                                <div class="col-md-12 mb-4">
                                                                    <p class="fs-5">Job Description</p>
                                                                    <p class="fw-light">{{ $canceledjob->desc }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-12 mb-4">
                                                                    <x-text-input id="requestedJob" type="hidden"
                                                                        name="requestedJob" :value="old('number')" required
                                                                        autofocus autocomplete="username" />
                                                                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                                                                </div>
                                                            </div>
                                                            <x-primary-button class="ms-3 mt-1 mb-3">
                                                                {{ __('Restore the Job') }}
                                                            </x-primary-button>
                                                            <button type="button" class="btn btn-secondary mt-1 mb-3"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </form>
                                                    </div>
                                                </div>
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

    <script>
        function sendDataToInput(data) {
            document.getElementById('requestedJob').value = data;
        }

        function filterTable() {
            // Get filter values
            const serviceFilter = document
                .getElementById("serviceFilter")
                .value.toLowerCase();
            const customerFilter = document.getElementById("customerFilter").value.toLowerCase();
            const canceledbyFilter = document
                .getElementById("canceledbyFilter")
                .value.toLowerCase();
            const table = document.getElementById("datatable");
            const rows = table.getElementsByTagName("tr");

            // Loop through rows (skip header row)
            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName("td");
                const service = cells[1]?.textContent.toLowerCase();
                const canceledby = cells[4]?.textContent.toLowerCase();
                const customer = cells[3]?.textContent.toLowerCase();

                // Check if row matches all filters
                const matchesService = serviceFilter === "" || service === serviceFilter;
                const matchesCustomer = customerFilter === "" || customer === customerFilter;
                const matchesCanceledBy = canceledbyFilter === "" || canceledby === canceledbyFilter;

                // Show or hide row
                rows[i].style.display = (matchesService && matchesCustomer && matchesCanceledBy) ? "" :
                    "none";
            }
        }

        function searchTableForRecord() {
            const search = document.getElementById('searchInput').value.toLowerCase();
            const searchInput = '[' + search + ']';
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
        const canceledbyFilter = document.getElementById("canceledbyFilter");
        const table = document.getElementById("datatable");
        const rows = table.getElementsByTagName("tr");

        // Add a click event listener to the button
        toggleButton.addEventListener("click", function() {
            // Toggle the display of the section
            mySection.classList.toggle("filterArea");
            serviceFilter.value = "";
            customerFilter.value = "";
            canceledbyFilter.value = "";

            for (let i = 1; i < rows.length; i++) {
                rows[i].style.display = "";
            }
        });
    </script>

</x-app-layout>
