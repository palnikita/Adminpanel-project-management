<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">

    <title>Status Management</title>
    <style>
        .form-container {
            max-width: 600px;
            margin: 38px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            margin-bottom: 1rem;
            /* Adds space below the input field */
        }
    </style>
</head>

<body>
    @include('layout.leftmenu')
    <div class="all-content-wrapper">
        @include('layout.rightmenu')

        <div class="container mt-5">
            <div class="form-container">
                <h2 class="mb-4 text-center">Add Status</h2>
                <form action="{{ route('status') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control @error('status') is-invalid @enderror" id="status"
                            name="status" value="{{ old('status') }}">
                        @error('status')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-4">Submit</button>
                </form>
            </div>

            <h3 class="mt-5">Statuses</h3>
            <table id="table" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $status)
                        <tr>
                            <td>{{ $status->id }}</td>
                            <td>{{ $status->status }}</td>
                            <td>
                                <button type="button" class="btn btn-danger delete-btn" data-id="{{ $status->id }}">
                                    <i class="fa-solid fa-trash-can text-white"></i>
                                </button>
                                <button type="button" class="btn btn-success edit-btn ml-2" data-id="{{ $status->id }}"
                                    data-toggle="modal" data-target="#exampleModal_{{$status->id }}">
                                    <i class="fa-solid fa-pen-to-square text-white"></i>
                                </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal_{{$status->id }}" tabindex="-1" aria-labelledby="editStatusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStatusModalLabel">Edit Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="editStatusForm" data-id="{{$status->id }}">
                    <div class="modal-body">

                        <input type="hidden" id="edit-status-id">
                        <div class="mb-3">
                            <label for="edit-status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="edit-status_{{$status->id}}" value="{{ $status->status}}" name="status">
                        </div>
                        <!-- <button type="submit" class="btn btn-primary w-100 mt-4">Save Changes</button> -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="editStatusForm">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Status Modal -->
    
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
            // Delete status
            $('#table').on('click', '.delete-btn', function () {
                var id = $(this).attr("data-id");
                var $row = $(this).closest('tr');

                if (confirm('Are you sure you want to delete this record?')) {
                    $.ajax({
                        url: 'deletestatus/' + id,
                        type: 'DELETE',
                        success: function (result) {
                            if (result.success) {
                                $row.remove();
                                toastr.success(result.message); // Show success message
                            } else {
                                toastr.error(result.message); // Show error message
                            }
                        },
                        error: function (err) {
                            toastr.error('Error: ' + err.responseText);
                        }
                    });
                }
            });

            $('#table').on('click', '.edit-btn', function () {
                var id = $(this).data('id');
                console.log(id); // For debugging

                $.ajax({
                    url: 'editstatus/' + id,
                    type: 'GET',
                    success: function (data) {
                        console.log(data); // For debugging
                        $('#edit-status-id').val(data.id);
                        $('#edit-status').val(data.status);

                        // Show the modal
                        $('#exampleModal_' + id).modal('show');

                    },
                    error: function (err) {
                        toastr.error('Error: ' + err.responseText);
                    }
                });
            });


            // Submit edited status
            $('.editStatusForm').submit(function (e) {
                var id = $(this).attr("data-id");
                e.preventDefault();
                
                var status = $('#edit-status_' + id).val();

                $.ajax({
                    url: 'updatestatus/' + id,
                    type: 'PUT',
                    data: { status: status },
                    success: function (result) {
                        if (result.success) {
                            location.reload(); // Refresh the page to show updated status
                            toastr.success(result.message); // Show success message
                        } else {
                            toastr.error(result.message); // Show error message
                        }
                    },
                    error: function (err) {
                        toastr.error('Error: ' + err.responseText);
                    }
                });
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