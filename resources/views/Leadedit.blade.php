<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead Registration Form</title>
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
                <h2 class="mb-4 text-center">Lead Registration Form</h2>
                <form action="{{ route('updateLead' , ['id' => $data->id]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" placeholder="Enter the lead's name" required>
                    </div>
                    <div class="mb-3">
                        <label for="Leadtype" class="form-label">Lead Type</label>
                        <input type="text" class="form-control" id="Leadtype" name="Leadtype" value="{{ $data->Leadtype }}" placeholder="Enter the lead type" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{ $data->phone }}" placeholder="Enter the phone number" required>
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" class="form-control" id="website" name="website" value="{{ $data->website }}" placeholder="Enter the website" required>
                    </div>
                    <div class="mb-3">
    <label for="label" class="form-label">Label</label>
    <select class="form-control" id="label" name="label" required>
        <option value="inactive" {{ $data->label == 'inactive' ? 'selected' : '' }}>Inactive</option>
        <option value="active" {{ $data->label == 'active' ? 'selected' : '' }}>Active</option>
        <option value="satisfied" {{ $data->label == 'satisfied' ? 'selected' : '' }}>Satisfied</option>
        <option value="corporate" {{ $data->label == 'corporate' ? 'selected' : '' }}>Corporate</option>
        <option value="90_percent_probablity" {{ $data->label == '90_percent_probablity' ? 'selected' : '' }}>90% Probability</option>
        <option value="potential" {{ $data->label == 'potential' ? 'selected' : '' }}>Potential</option>
    </select>
</div>
<div class="mb-3">
                        <label for="Date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="Date" name="Date" value="{{ $data->Date }}" placeholder="Enter the date" required>
                    </div>
                    <div class="mb-3">
                        <label for="Owner" class="form-label">Owner</label>
                        <input type="text" class="form-control" id="Owner" name="Owner" value="{{ $data->Owner }}" placeholder="Enter the owner" required>
                    </div>
                    <div class="mb-3">
                        <label for="Status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="Status" name="Status" value="{{ $data->Status }}" placeholder="Enter the status" required>
                    </div>
                    <div class="mb-3">
                        <label for="source" class="form-label">Source</label>
                        <input type="text" class="form-control" id="source" name="source" value="{{ $data->source }}" placeholder="Enter the source" required>
                    </div>
                    <div class="mb-3">
                        <label for="Address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="Address" name="Address" value="{{ $data->Address }}" placeholder="Enter the address" required>
                    </div>
                    <div class="mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <textarea class="form-control" id="Description" name="Description" value="{{ $data->Description }}" rows="3" placeholder="Enter the description" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
