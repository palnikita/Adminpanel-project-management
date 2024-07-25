<!-- resources/views/tickets/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ticket Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .ticket-box {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            background: #f9f9f9;
        }
        .feedback-box {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            background: #fff;
            margin-top: 20px;
        }
        .form-control {
            font-size: 1.1rem;
        }
    </style>
</head>
<body>

@include('layout.leftmenu')
<div class="all-content-wrapper">
    @include('layout.rightmenu')

    <div class="container mt-5">
        <div class="ticket-box">
            <h2>Ticket Details</h2>
            <div class="row mb-3">
                <div class="col-md-6"><strong>Ticket Status:</strong> {{ $ticket->status }}</div>
                <div class="col-md-6"><strong>Create Date:</strong> {{ $ticket->created_at->format('Y-m-d') }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6"><strong>Subject:</strong> {{ $ticket->subject }}</div>
                <div class="col-md-6"><strong>Name:</strong> {{ $ticket->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6"><strong>Closed By:</strong> {{ $ticket->closed_by }}</div>
                <div class="col-md-6"><strong>Email:</strong> {{ $ticket->email }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6"><strong>Handled By:</strong> {{ $ticket->handled_by }}</div>
                <div class="col-md-6"><strong>Priority:</strong> {{ $ticket->priority }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6"><strong>Phone:</strong> {{ $ticket->phone }}</div>
            </div>
        </div>

        <div class="feedback-box">
            <h3>Feedback</h3>
            <form action="{{ route('tickets.storeFeedback', $ticket->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="feedback" class="form-label">Your Feedback</label>
                    <textarea id="feedback" name="feedback" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post Reply</button>
            </form>
            <div class="mt-4">
                <h4>Previous Feedbacks:</h4>
                @foreach($feedbacks as $feedback)
                    <div class="mb-2 p-2 border rounded">
                        {{ $feedback->feedback }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>
