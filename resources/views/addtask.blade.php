<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Registration Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

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
        .text-danger {
            color: red;
        }
        .toast-top-right {
            top: 50px !important; /* Adjust this value to move the toastr down */
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
                <form action="{{ route('addtask') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="employee" class="form-label">Employee</label>
                        <input type="text" class="form-control @error('employee') is-invalid @enderror" id="employee" name="employee" placeholder="Enter the employee name" value="{{ old('employee') }}" required>
                        @error('employee')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter the task title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="relatedto" class="form-label">Related To</label>
                        <input type="text" class="form-control @error('relatedto') is-invalid @enderror" id="relatedto" name="relatedto" placeholder="Enter what the task is related to" value="{{ old('relatedto') }}" required>
                        @error('relatedto')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="collaborator" class="form-label">Collaborator</label>
                        <input type="text" class="form-control @error('collaborator') is-invalid @enderror" id="collaborator" name="collaborator" placeholder="Enter the collaborator's name" value="{{ old('collaborator') }}" required>
                        @error('collaborator')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="labels" class="form-label">Labels</label>
                        <input type="text" class="form-control @error('labels') is-invalid @enderror" id="labels" name="labels" placeholder="Enter labels" value="{{ old('labels') }}" required>
                        @error('labels')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="startdate" class="form-label">Start Date</label>
                        <input type="date" class="form-control @error('startdate') is-invalid @enderror" id="startdate" name="startdate" value="{{ old('startdate') }}" required>
                        @error('startdate')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="enddate" class="form-label">End Date</label>
                        <input type="date" class="form-control @error('enddate') is-invalid @enderror" id="enddate" name="enddate" value="{{ old('enddate') }}" required>
                        @error('enddate')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">File</label>
                        <input type="text" class="form-control @error('file') is-invalid @enderror" id="file" name="file" placeholder="Enter the file path or URL" value="{{ old('file') }}" required>
                        @error('file')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" placeholder="Enter the task status" value="{{ old('status') }}" required>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Enter the task description" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
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
