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
        .page-list{
            display: inline !important;
        }




        
        .badge1 {
    display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    border-radius: 60px;
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

        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Projects <span class="table-project-n">Data</span> Table</h1>
                                    <div>
                                    <a href="{{route('addLead')}}">
                                        <button type="button">Add Leads</button>
                                    </a>
                                    <a>
                                    <button type="button" >Manage label</button>

                                    </a>
                                    </div>

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
                                                <th data-field="name" data-editable="true">Name</th>
                                                <th data-field="Leadtype" data-editable="true">Lead type</th>
                                                <th data-field="phone" data-editable="true">Phone</th>
                                                <th data-field="website" data-editable="true">website</th>
                                                <th data-field="Lable" data-editable="true">Lable</th></th>
                                                <th data-field="Date" data-editable="true">Date</th>
                                                <th data-field="Owner" data-editable="true">Owner</th>
                                                <th data-field="Status" data-editable="true">Status</th>
                                                <th data-field="source" data-editable="true">source</th>
                                                <th data-field="Address" data-editable="true">Address</th>
                                                <th data-field="Description" data-editable="true">Description</th>


                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $Lead)

                                                <tr>
                                                    <td></td>
                                                    <td>{{ $Lead->id }}</td>
                                                    <td>{{ $Lead->name }}</td>
                                                    <td>{{ $Lead->Leadtype }}</td>
                                                    <td>{{ $Lead->phone }}</td>
                                                    <td>{{ $Lead->website }}</td>




                                                    <td>
    @if ($Lead->label == 'inactive')
        <span class="badge1" style="width: 100px; font-size: 14px; background-color: grey;">Inactive</span>
    @elseif ($Lead->label == 'active')
        <span class="badge1 " style="width: 100px; font-size: 14px; background-color: #eb1717de;">Active</span>
    @elseif ($Lead->label == 'satisfied')
        <span class="badge1 " style="width: 100px; font-size: 14px; background-color: #65b12d;">Satisfied</span>
    @elseif ($Lead->label == 'corporate')
        <span class="badge1 " style="width: 100px; font-size: 14px; background-color: #db6cdb;">Corporate</span>
    @elseif ($Lead->label == '90_percent_probablity')
        <span class="badge1" style="width: 100px; font-size: 13px; background-color: #ed960a;">90% Probability</span>
    @elseif ($Lead->label == 'potential')
        <span class="badge1" style="width: 100px; font-size: 14px; background-color: blue;">Potential</span>
    @else
        <span class="badge1" style="width: 100px; font-size: 14px; background-color: grey;">{{ $Lead->label }}</span>
    @endif
</td>


                                                    <td>{{ $Lead->Date }}</td>
                                                    <td>{{ $Lead->Owner }}</td>
                                                    <td>{{ $Lead->Status }}</td>
                                                    <td>{{ $Lead->source }}</td>
                                                    <td>{{ $Lead->Address }}</td>

                                                    <td>{{ $Lead->Description }}</td>

                                                    <td class="design">
                                                        <button type="button" class="btn btn-danger delete-btn"
                                                            data-id="{{ $Lead->id }}">
                                                            <i class="fa-solid fa-trash-can text-white"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-success"
                                                            style="margin-left:8px">
                                                            <a href="{{ route('Leadedit', ['id' => $Lead->id]) }}"
                                                                style="color:white">
                                                                <i class="fa-solid fa-pen-to-square text-white"></i>
                                                            </a>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
                        url: 'deleteLead/' + id,
                        type: 'DELETE',
                        success: function (result) {
                            if (result.success) {
                                $row.remove();
                                toastr.success(result.message); // Show success message

                            } else {
                                toastr.error(result.message); // Show error message
                            }
                        },
                        error: function (err) {
                            alert('Error: ' + err.responseText);
                        }
                    });
                }
            });
        });
    </script>
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