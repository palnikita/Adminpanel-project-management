<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead Registration Form</title>
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
            color:red;
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
                <h2 class="mb-4 text-center">Lead Registration Form</h2>
                <form action="{{ route('addLead') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter the lead's name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Leadtype" class="form-label">Lead Type</label>
                        <input type="text" class="form-control @error('Leadtype') is-invalid @enderror" id="Leadtype" name="Leadtype" placeholder="Enter the lead type" value="{{ old('Leadtype') }}" required>
                        @error('Leadtype')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter the phone number" value="{{ old('phone') }}" required>
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website" placeholder="Enter the website" value="{{ old('website') }}" required>
                        @error('website')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="label" class="form-label">Label</label>
                        <select class="form-control @error('label') is-invalid @enderror" id="label" name="label">
                            <option value="">Select a label</option>
                            <option value="inactive" {{ old('label') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="active" {{ old('label') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="satisfied" {{ old('label') == 'satisfied' ? 'selected' : '' }}>Satisfied</option>
                            <option value="corporate" {{ old('label') == 'corporate' ? 'selected' : '' }}>Corporate</option>
                            <option value="90_percent_probablity" {{ old('label') == '90_percent_probablity' ? 'selected' : '' }}>90% Probability</option>
                            <option value="potential" {{ old('label') == 'potential' ? 'selected' : '' }}>Potential</option>
                        </select>
                        @error('label')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Date" class="form-label">Date</label>
                        <input type="date" class="form-control @error('Date') is-invalid @enderror" id="Date" name="Date" placeholder="Enter the date" value="{{ old('Date') }}" required>
                        @error('Date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Owner" class="form-label">Owner</label>
                        <input type="text" class="form-control @error('Owner') is-invalid @enderror" id="Owner" name="Owner" placeholder="Enter the owner" value="{{ old('Owner') }}" required>
                        @error('Owner')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Status" class="form-label">Status</label>
                        <input type="text" class="form-control @error('Status') is-invalid @enderror" id="Status" name="Status" placeholder="Enter the status" value="{{ old('Status') }}" required>
                        @error('Status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="source" class="form-label">Source</label>
                        <input type="text" class="form-control @error('source') is-invalid @enderror" id="source" name="source" placeholder="Enter the source" value="{{ old('source') }}" required>
                        @error('source')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Address" class="form-label">Address</label>
                        <input type="text" class="form-control @error('Address') is-invalid @enderror" id="Address" name="Address" placeholder="Enter the address" value="{{ old('Address') }}" required>
                        @error('Address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <textarea class="form-control @error('Description') is-invalid @enderror" id="Description" name="Description" rows="3" placeholder="Enter the description" required>{{ old('Description') }}</textarea>
                        @error('Description')
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
