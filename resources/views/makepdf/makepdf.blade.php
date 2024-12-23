<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            mx: auto;
            align-items: center;
            background-color: #f5f5f5;
        }
        @font-face {
        font-family: "Parkinsans", serif;
        font-optical-sizing: auto;
        font-weight: <weight>;
        font-style: normal;
        }
        .table-hover {
            font-family: "Parkinsans" !important;
        }
        .table-success{
            background-color: #a5d6a7 !important;
        }
        .table-warning{
            background-color: #fff59d  !important;
        }
        .table-danger{
            background-color: #ef9a9a  !important;
        }
        .table-dark{
            background-color: black !important;
            color: white !important;
        }
    </style>
</head>

<body>
    <div class="row justify-content-evenly">
        <div class="col-md-10 pt-5 pb-5">
            <div class="card">
                <div class="card-body p-md-5">
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
                            @foreach ($dailyUpdates['dailyupdates'] as $update)
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
</body>

</html>
