<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Roles</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        table.table-bordered th,
        table.table-bordered td {
            padding: 1.5rem;
            font-size: 1.2rem;
        }

        .btnrole {
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    @include('layout.leftmenu')
    <div class="all-content-wrapper">
        @include('layout.rightmenu')

        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center btnrole">
                <h2>Roles</h2>
                <a href="{{ route('roles') }}" class="btn btn-primary ">
                    <i class="fas fa-plus"></i> Add Role
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered" id="table">
                <thead class="thead-dark">
                    <tr>
                        <th>S.No</th>
                        <th>Role Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $key => $role)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $role->rolename }}</td>
                            <td>
                            <a href="{{ route('viewroles', $role->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('editrole', $role->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger delete-btn" data-id="{{ $role->id }}">
                                    <i class="fa-solid fa-trash-can text-white"></i>
                                </button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            $('#table').on('click', '.delete-btn', function () {
                var id = $(this).attr("data-id");
                var $row = $(this).closest('tr');

                if (confirm('Are you sure you want to delete this record?')) {
                    $.ajax({
                        url: 'deleterole/' + id,
                        type: 'DELETE',
                        success: function (result) {
                            if (result.success) {
                                $row.remove();
                                toastr.success(result.message, 'Success', {
                                    closeButton: true,
                                    progressBar: true,
                                }); // Show success message
                            } else {
                                toastr.error(result.message, 'Error', {
                                    closeButton: true,
                                    progressBar: true,
                                }); // Show error message
                            }
                        },
                        error: function (err) {
                            toastr.error('An error occurred while deleting the role.', 'Error', {
                                closeButton: true,
                                progressBar: true,
                            });
                        }
                    });
                }
            });

            @if(Session::has('success'))
                toastr.success("{{ session('success') }}", 'Success', {
                    closeButton: true,
                    progressBar: true,
                });
            @endif
        });
    </script>

</body>
</html>
