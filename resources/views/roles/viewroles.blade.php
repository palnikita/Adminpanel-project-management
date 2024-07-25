<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Role</title>
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

        .form-check-input:disabled ~ .form-check-label {
            color: #6c757d;
        }

        .form-check-input:checked + .form-check-label {
            color: #000;
        }
    </style>
</head>

<body>

    @include('layout.leftmenu')
    <div class="all-content-wrapper">
        @include('layout.rightmenu')
        <div class="container mt-5">
            <h1>View Role</h1>

                <div class="mb-4">
                <h3>Role Name: {{ $role->rolename }}</h3>
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
                                        <input class="form-check-input" type="checkbox" id="view_leads_{{ $role->id }}" {{ $role->view_leads == 2 ? 'checked' : ($role->view_leads == 1 ? '' : 'disabled') }} disabled>
                                        <label class="form-check-label" for="view_leads_{{ $role->id }}">View Leads</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="add_leads_{{ $role->id }}" {{ $role->add_leads == 2 ? 'checked' : ($role->add_leads == 1 ? '' : 'disabled') }} disabled>
                                        <label class="form-check-label" for="add_leads_{{ $role->id }}">Add Leads</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="delete_leads_{{ $role->id }}" {{ $role->delete_leads == 2 ? 'checked' : ($role->delete_leads == 1 ? '' : 'disabled') }} disabled>
                                        <label class="form-check-label" for="delete_leads_{{ $role->id }}">Delete Leads</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="edit_leads_{{ $role->id }}" {{ $role->edit_leads == 2 ? 'checked' : ($role->edit_leads == 1 ? '' : 'disabled') }} disabled>
                                        <label class="form-check-label" for="edit_leads_{{ $role->id }}">Edit Leads</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Team</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="view_team_{{ $role->id }}" {{ $role->view_team == 2 ? 'checked' : ($role->view_team == 1 ? '' : 'disabled') }} disabled>
                                        <label class="form-check-label" for="view_team_{{ $role->id }}">View Team</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="add_team_{{ $role->id }}" {{ $role->add_team == 2 ? 'checked' : ($role->add_team == 1 ? '' : 'disabled') }} disabled>
                                        <label class="form-check-label" for="add_team_{{ $role->id }}">Add Team</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="delete_team_{{ $role->id }}" {{ $role->delete_team == 2 ? 'checked' : ($role->delete_team == 1 ? '' : 'disabled') }} disabled>
                                        <label class="form-check-label" for="delete_team_{{ $role->id }}">Delete Team</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="edit_team_{{ $role->id }}" {{ $role->edit_team == 2 ? 'checked' : ($role->edit_team == 2 ? '' : 'disabled') }} disabled>
                                        <label class="form-check-label" for="edit_team_{{ $role->id }}">Edit Team</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Roles</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="view_roles_{{ $role->id }}" {{ $role->view_roles == 2 ? 'checked' : ($role->view_roles == 2 ? '' : 'disabled') }} disabled>
                                        <label class="form-check-label" for="view_roles_{{ $role->id }}">View Roles</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="add_roles_{{ $role->id }}" {{ $role->add_roles == 2 ? 'checked' : ($role->add_roles == 2 ? '' : 'disabled') }} disabled>
                                        <label class="form-check-label" for="add_roles_{{ $role->id }}">Add Roles</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="delete_roles_{{ $role->id }}" {{ $role->delete_roles == 2 ? 'checked' : ($role->delete_roles == 2 ? '' : 'disabled') }} disabled>
                                        <label class="form-check-label" for="delete_roles_{{ $role->id }}">Delete Roles</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="edit_roles_{{ $role->id }}" {{ $role->edit_roles == 2 ? 'checked' : ($role->edit_roles == 2 ? '' : 'disabled') }} disabled>
                                        <label class="form-check-label" for="edit_roles_{{ $role->id }}">Edit Roles</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Task</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="view_task_{{ $role->id }}" {{ $role->view_task == 2 ? 'checked' : ($role->view_task == 2 ? '' : 'disabled') }} disabled>
                                        <label class="form-check-label" for="view_task_{{ $role->id }}">View Task</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="add_task_{{ $role->id }}" {{ $role->add_task == 2 ? 'checked' : ($role->add_task == 2 ? '' : 'disabled') }} disabled>
                                        <label class="form-check-label" for="add_task_{{ $role->id }}">Add Task</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="delete_task_{{ $role->id }}" {{ $role->delete_task == 2 ? 'checked' : ($role->delete_task == 2 ? '' : 'disabled') }} disabled>
                                        <label class="form-check-label" for="delete_task_{{ $role->id }}">Delete Task</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="edit_task_{{ $role->id }}" {{ $role->edit_task == 2 ? 'checked' : ($role->edit_task == 2 ? '' : 'disabled') }} disabled>
                                        <label class="form-check-label" for="edit_task_{{ $role->id }}">Edit Task</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js
