<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tickets</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .view-ticket-btn {
            border: 1px solid black;
            color: #007bff;
            background-color: transparent;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
        }
        .action-btn {
            border: none;
            background: none;
            color: red;
            cursor: pointer;
        }
        .status-label {
            padding: 2px 6px;
            border-radius: 4px;
            color: white;
        }
        .status-pending {
            background-color: #ffcc00;
        }
        .status-in-progress {
            background-color: #00bfff;
        }
        .status-closed {
            background-color: #32cd32;
        }
    </style>
</head>
<body>

@include('layout.leftmenu')
<div class="all-content-wrapper">
    @include('layout.rightmenu')

    <div class="container mt-5">
    <a href="{{route('tickets')}}">
        <button type="button">Add ticket</button>
    </a>
                                    
        <h2 class="mb-4">Tickets List</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>View Ticket</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Created</th>
                    <th>Change Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>
                            <a href="{{ route('show', $ticket->id) }}" class="view-ticket-btn">View Ticket</a>
                        </td>
                        <td>{{ $ticket->subject }}</td>
                        <td>
                            <span class="status-label 
                                @if($ticket->status == 'Pending') status-pending 
                                @elseif($ticket->status == 'In Progress') status-in-progress 
                                @elseif($ticket->status == 'Closeticket') status-closed
                                @endif">
                                {{ $ticket->status }}
                            </span>
                        </td>
                        <td>{{ $ticket->created_at->format('Y-m-d') }}</td>
                        <td>{{ $ticket->created_at->diffForHumans() }}</td>
                        <td>
                            <select class="form-select status-select" data-ticket-id="{{ $ticket->id }}">
                                <option value="Pending" {{ $ticket->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="In Progress" {{ $ticket->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="Closeticket" {{ $ticket->status == 'Closeticket' ? 'selected' : '' }}>Closeticket</option>
                            </select>
                        </td>
                        <td>
                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('#table').on('change', '.status-select', function() {
            var status = $(this).val();
            var ticketId = $(this).data('data-ticket-id');

            $.ajax({
                url: '/tickets/' + ticketId + '/status',
                method: 'PATCH',
                data: {
                    status: status
                },
                success: function(response) {
                    if (response.success) {
                        location.reload(); // Reload the page to reflect the changes
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Log the error response
                    alert('An error occurred while updating the status.');
                }
            });
        });
    });
</script>
</body>
</html>
