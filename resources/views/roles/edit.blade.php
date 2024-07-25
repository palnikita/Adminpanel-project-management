<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Role</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        table.table-bordered th,
        table.table-bordered td {
            border: none;
        }

        .form-check {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    @include('layout.leftmenu')
    <div class="all-content-wrapper">
        @include('layout.rightmenu')
        <div class="container mt-5">
            <h1>Edit Role</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('updaterole', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="rolename">Role Name</label>
                    <input type="text" name="rolename" id="rolename" class="form-control" value="{{ $role->rolename }}" required>
                </div>

                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Permission</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Leads</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="view_leads" id="view_leads" {{ $role->view_leads == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="view_leads">View Leads</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="add_leads" id="add_leads" {{ $role->add_leads == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="add_leads">Add Leads</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="delete_leads" id="delete_leads" {{ $role->delete_leads == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="delete_leads">Delete Leads</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="edit_leads" id="edit_leads" {{ $role->edit_leads == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="edit_leads">Edit Leads</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Team</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="view_team" id="view_team" {{ $role->view_team == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="view_team">View Team</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="add_team" id="add_team" {{ $role->add_team == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="add_team">Add Team</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="delete_team" id="delete_team" {{ $role->delete_team == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="delete_team">Delete Team</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="edit_team" id="edit_team" {{ $role->edit_team == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="edit_team">Edit Team</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Roles</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="view_roles" id="view_roles" {{ $role->view_roles == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="view_roles">View Roles</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="add_roles" id="add_roles" {{ $role->add_roles == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="add_roles">Add Roles</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="delete_roles" id="delete_roles" {{ $role->delete_roles == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="delete_roles">Delete Roles</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="edit_roles" id="edit_roles" {{ $role->edit_roles == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="edit_roles">Edit Roles</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Task</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="view_task" id="view_task" {{ $role->view_task == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="view_task">View Task</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="add_task" id="add_task" {{ $role->add_task == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="add_task">Add Task</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="delete_task" id="delete_task" {{ $role->delete_task == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="delete_task">Delete Task</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="edit_task" id="edit_task" {{ $role->edit_task == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="edit_task">Edit Task</label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <button type="submit" class="btn btn-primary mt-3">Update Role</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            @if (Session::has('success'))
                toastr.success("{{ session('success') }}", 'Success', {
                    closeButton: true,
                    progressBar: true,
                });
            @endif
        });
    </script>
</body>

</html>
