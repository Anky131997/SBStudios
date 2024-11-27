<x-app-layout>
    <div class="row justify-content-evenly">
        <div class="col-md-12 pt-5 pb-5">
            <p class="fw-bold fs-1 pageHeading">Approved Jobs List</p>
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
                            <select id="assignedtoFilter" onchange="filterTable()" class="form-select"
                                aria-label="Default select example">
                                <option value="" selected>All Workers</option>
                                @foreach ($requestedassignedtos as $requestedassignedto)
                                    <option value="{{ $requestedassignedto->name }}">{{ $requestedassignedto->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-4">
                            <select id="approvedbyFilter" onchange="filterTable()" class="form-select"
                                aria-label="Default select example">
                                <option value="" selected>All Manager</option>
                                @foreach ($requestedapprovedbys as $requestedapprovedby)
                                    <option value="{{ $requestedapprovedby->name }}">{{ $requestedapprovedby->name }}
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
                                    <th scope="col">Assigned To</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Approved By</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($approvedjobs as $approvedjob)
                                    <tr>
                                        <td class="fw-bold">[{{ $approvedjob->requestedjob->job_code }}]</td>
                                        <td class="fw-bold">{{ $approvedjob->requestedjob->service->name }}</td>
                                        <td>{{ $approvedjob->requestedjob->desc }}</td>
                                        <td>{{ $approvedjob->assignedTo->name }}</td>
                                        <td>{{ $approvedjob->requestedjob->customer->name }}</td>
                                        <td>{{ $approvedjob->approvedBy->name }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" href={{ route('approvedjobs.show', $approvedjob) }}
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
            const assignedtoFilter = document
                .getElementById("assignedtoFilter")
                .value.toLowerCase();
            const approvedbyFilter = document
                .getElementById("approvedbyFilter")
                .value.toLowerCase();
            const table = document.getElementById("datatable");
            const rows = table.getElementsByTagName("tr");

            // Loop through rows (skip header row)
            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName("td");
                const service = cells[1]?.textContent.toLowerCase();
                const assignedto = cells[3]?.textContent.toLowerCase();
                const customer = cells[4]?.textContent.toLowerCase();
                const approvedby = cells[5]?.textContent.toLowerCase();

                // Check if row matches all filters
                const matchesService = serviceFilter === "" || service === serviceFilter;
                const matchesCustomer = customerFilter === "" || customer === customerFilter;
                const matchesAssignedTo = assignedtoFilter === "" || assignedto === assignedtoFilter;
                const matchesApprovedBy = approvedbyFilter === "" || approvedby === approvedbyFilter;

                // Show or hide row
                rows[i].style.display = (matchesService && matchesCustomer && matchesAssignedTo && matchesApprovedBy) ? "" :
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
        const assignedtoFilter = document.getElementById("assignedtoFilter");
        const approvedbyFilter = document.getElementById("approvedbyFilter");
        const table = document.getElementById("datatable");
        const rows = table.getElementsByTagName("tr");

        // Add a click event listener to the button
        toggleButton.addEventListener("click", function() {
            // Toggle the display of the section
            mySection.classList.toggle("filterArea");
            serviceFilter.value = "";
            customerFilter.value = "";
            assignedtoFilter.value = "";
            approvedbyFilter.value = "";

            for (let i = 1; i < rows.length; i++) {
                rows[i].style.display = "";
            }
        });
    </script>

</x-app-layout>
