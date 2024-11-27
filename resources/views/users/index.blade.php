<x-app-layout>
    <div class="row justify-content-evenly">
        <div class="col-md-12 pt-5 pb-5">
            <p class="fw-bold fs-1 pageHeading">Employee List</p>
        </div>
        <div class="col-md-12 pt-5 pb-5">
            <div class="card contentCard">
                <div class="card-body p-md-5">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Date of Birth</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->dob }}</td>
                                        <td>{{ $user->number }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->designation }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" href={{ route('user.show', $user) }} class="btn btn-warning text-white"><i class="bi bi-eye-fill"></i></a>
                                                <button type="button" class="btn btn-danger"><i
                                                        class="bi bi-trash-fill"></i></button>
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

</x-app-layout>
