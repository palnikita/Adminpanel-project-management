<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
        .toast-top-right {
            top: 50px !important; /* Adjust this value to move the toastr down */
        }
        .field-icon {
            position: absolute;
            right: 10px;
            top: -19px;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .password-container {
            position: relative;
        }
    </style>
</head>
<body>
@include('layout.leftmenu')
    <div class="all-content-wrapper">
        @include('layout.rightmenu')
   
    <div class="container mt-5">
        <div class="form-container">
            <h2 class="mb-4 text-center">Registration Form</h2>

            <form action="{{ route('addmember') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Enter your address" value="{{ old('address') }}">
                    @error('address')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter your phone number" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                    @error('gender')
                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="job-title" class="form-label">Job Title</label>
                    <input type="text" class="form-control @error('job_title') is-invalid @enderror" id="job-title" name="job_title" placeholder="Enter your job title" value="{{ old('job_title') }}">
                    @error('job_title')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                        <option value="">Select a role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role }}" {{ old('role') == $role ? 'selected' : '' }}>{{ $role }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                         
                <div class="mb-3">
                    <label for="salary" class="form-label">Salary</label>
                    <input type="number" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" placeholder="Enter your salary" value="{{ old('salary') }}">
                    @error('salary')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="salterm" class="form-label">Salary Term</label>
                    <input type="text" class="form-control @error('salterm') is-invalid @enderror" id="salterm" name="salterm" placeholder="Enter your salary term" value="{{ old('salterm') }}">
                    @error('salterm')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 password-container">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password">
                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    @error('password')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 password-container">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password">
                    <span toggle="#password_confirmation" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    @error('password_confirmation')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
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

        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
</body>
</html>
