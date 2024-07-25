<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Data Table | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/owl.theme.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/owl.transitions.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/animate.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/normalize.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/main.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/educate-custon-icon.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/morrisjs/morris.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/metisMenu/metisMenu-vertical.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/calendar/fullcalendar.print.min.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/editor/select2.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/editor/datetimepicker.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/editor/x-editor-style.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/responsive.css">
    <script src="{{ asset('public/')}}/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        .fixed-table-footer .fixed-table-pagination .pull-right {
            display: inline !important;
        }

        .design {
            display: flex;
        }
        .page-list {
            display: inline !important;
        }
    </style>
</head>

<body>
    @include('layout.leftmenu')
    <div class="all-content-wrapper">
        @include('layout.rightmenu')

        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Tasks <span class="table-project-n">Data</span> Table</h1>
                                    <a href="{{ route('gettask') }}">
                                        <button type="button">Add New Task</button>
                                    </a>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                            <option value="">Export Basic</option>
                                            <option value="all">Export All</option>
                                            <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                        data-show-columns="true" data-show-pagination-switch="true"
                                        data-show-refresh="true" data-key-events="true" data-show-toggle="true"
                                        data-resizable="true" data-cookie="true" data-cookie-id-table="saveId"
                                        data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id">ID</th>
                                                <th data-field="employee">Employee</th>
                                                <th data-field="title">Title</th>
                                                <th data-field="relatedto">Related To</th>
                                                <th data-field="collaborator">Collaborator</th>
                                                <th data-field="labels">Labels</th>
                                                <th data-field="startdate">Start Date</th>
                                                <th data-field="enddate">End Date</th>
                                                <th data-field="file">File</th>
                                                <th data-field="status">Status</th>
                                                <th data-field="description">Description</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $task)
                                                <tr>
                                                    <td></td>
                                                    <td>{{ $task->id }}</td>
                                                    <td>{{ $task->employee }}</td>
                                                    <td>{{ $task->title }}</td>
                                                    <td>{{ $task->relatedto }}</td>
                                                    <td>{{ $task->collaborator }}</td>
                                                    <td>{{ $task->labels }}</td>
                                                    <td>{{ $task->startdate }}</td>
                                                    <td>{{ $task->enddate }}</td>
                                                    <td>{{ $task->file }}</td>
                                                    <td>{{ $task->status }}</td>
                                                    <td>{{ $task->description }}</td>
                                                    <td class="design">
                                                        <button type="button" class="btn btn-danger delete-btn"
                                                            data-id="{{ $task->id }}">
                                                            <i class="fa-solid fa-trash-can text-white"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-success"
                                                            style="margin-left:8px">
                                                            <a href="{{ route('tasks.edit', ['id' => $task->id]) }}"
                                                                style="color:white">
                                                                <i class="fa-solid fa-pen-to-square text-white"></i>
                                                            </a>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- Pagination links -->
                                    <div class="pagination">
                                        {{ $data->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. Template by <a
                                    href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('public/')}}/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('public/')}}/assets/js/wow.min.js"></script>
    <script src="{{ asset('public/')}}/assets/js/jquery-price-slider.js"></script>
    <script src="{{ asset('public/')}}/assets/js/jquery.meanmenu.js"></script>
    <script src="{{ asset('public/')}}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('public/')}}/assets/js/jquery.sticky.js"></script>
    <script src="{{ asset('public/')}}/assets/js/metisMenu/metisMenu.min.js"></script>
    <script src="{{ asset('public/')}}/assets/js/metisMenu/metisMenu-active.js"></script>
    <script src="{{ asset('public/')}}/assets/js/data-table/bootstrap-table.js"></script>
    <script src="{{ asset('public/')}}/assets/js/data-table/tableExport.js"></script>
    <script src="{{ asset('public/')}}/assets/js/data-table/data-table-active.js"></script>
    <script src="{{ asset('public/')}}/assets/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="{{ asset('public/')}}/assets/js/data-table/colResizable-1.5.source.js"></script>
    <script src="{{ asset('public/')}}/assets/js/data-table/bootstrap-table-export.js"></script>
    <script src="{{ asset('public/')}}/assets/js/editable/jquery.mockjax.js"></script>
    <script src="{{ asset('public/')}}/assets/js/editable/mock-active.js"></script>
    <script src="{{ asset('public/')}}/assets/js/editable/select2.js"></script>
    <script src="{{ asset('public/')}}/assets/js/editable/moment.min.js"></script>
    <script src="{{ asset('public/')}}/assets/js/editable/bootstrap-datetimepicker.js"></script>
    <script src="{{ asset('public/')}}/assets/js/editable/xediable-active.js"></script>
    <script src="{{ asset('public/')}}/assets/js/chart/jquery.peity.min.js"></script>
    <script src="{{ asset('public/')}}/assets/js/peity/peity-active.js"></script>
    <script src="{{ asset('public/')}}/assets/js/tab.js"></script>
    <script src="{{ asset('public/')}}/assets/js/plugins.js"></script>
    <script src="{{ asset('public/')}}/assets/js/tawk-chat.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            $('#table').on('click', '.delete-btn', function () {
                var id = $(this).attr("data-id");
                var $row = $(this).closest('tr');

                if (confirm('Are you sure you want to delete this record?')) {
                    $.ajax({
                        url: 'delete/' + id,
                        type: 'DELETE',
                        success: function (result) {
                            if (result.success) {
                                $row.remove();
                                toastr.success(result.message); // Show success message

                            } else {
                                toastr.error(result.message); // Show success message
                            }
                        },
                        error: function (err) {
                            alert('Error: ' + err.responseText);
                        }
                    });
                }
            });
        });

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
