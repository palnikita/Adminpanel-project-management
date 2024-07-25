<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Registration Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            height: calc(1.5em + 0.75rem + 2px);
        }
    </style>
</head>
<body>
    @include('layout.leftmenu')
    <div class="all-content-wrapper">
        @include('layout.rightmenu')
        <div class="container mt-5">
            <div class="form-container">
                <h2 class="mb-4 text-center">Task Registration Form</h2>
                <form action="{{ route('tasks.update' , ['id' => $data->id]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="employee" class="form-label">Employee</label>
                        <input type="text" class="form-control" id="employee" name="employee" value="{{ $data->employee }}" placeholder="Enter the employee's name" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}" placeholder="Enter the task title" required>
                    </div>
                    <div class="mb-3">
                        <label for="relatedto" class="form-label">Related To</label>
                        <input type="text" class="form-control" id="relatedto" name="relatedto" value="{{ $data->relatedto }}" placeholder="Enter related entity" required>
                    </div>
                    <div class="mb-3">
                        <label for="collaborator" class="form-label">Collaborator</label>
                        <input type="text" class="form-control" id="collaborator" name="collaborator" value="{{ $data->collaborator }}" placeholder="Enter collaborator's name" required>
                    </div>
                    <div class="mb-3">
                        <label for="labels" class="form-label">Labels</label>
                        <input type="text" class="form-control" id="labels" name="labels" value="{{ $data->labels }}" placeholder="Enter task labels" required>
                    </div>
                    <div class="mb-3">
                        <label for="startdate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="startdate" name="startdate" value="{{ $data->startdate }}" placeholder="Enter the start date" required>
                    </div>
                    <div class="mb-3">
                        <label for="enddate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="enddate" name="enddate" value="{{ $data->enddate }}" placeholder="Enter the end date" required>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">File</label>
                        <input type="text" class="form-control" id="file" name="file" value="{{ $data->file }}" placeholder="Enter file details" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ $data->status }}" placeholder="Enter the task status" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter the task description" required>{{ $data->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
