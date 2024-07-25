<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Ticket</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">
    <style>
        .form-label {
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>

@include('layout.leftmenu')
<div class="all-content-wrapper">
    @include('layout.rightmenu')

    <div class="container mt-5">
        <h2 class="mb-4">Create Ticket</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="assign_to" class="form-label">Assign To</label>
                        <select name="assign_to" id="assign_to" class="form-control" required>
                            <option value="" disabled selected>Select Staff</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->name }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone number" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="project" class="form-label">Project</label>
                        <input type="text" name="project" id="project" class="form-control" placeholder="Enter project name" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter subject" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="priority" class="form-label">Priority</label>
                        <select name="priority" id="priority" class="form-control" required>
                            <option value="" disabled selected>Select priority</option>
                            <option value="Low">Low</option>
                            <option value="High">High</option>
                            <option value="Average">Average</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="attachment" class="form-label">Attachment</label>
                        <input type="file" name="attachment" id="attachment" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" id="message" class="form-control summernote" required></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200,
            placeholder: 'Enter your message',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
</body>
</html>
