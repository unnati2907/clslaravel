<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="author" content="">
    <title>Contact Report</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <style type="text/css">
        table th {
            font-size: 13px !important;
            padding: 10px !important;
        }

        table tbody td {
            font-size: 14px !important;
            padding: 10px !important;
        }

        .dt-buttons {
            float: left !important;
            padding-bottom: 10px;
        }

        .dataTables_filter,
        .dataTables_length {
            display: inline-block;
            margin-left: 1em;
        }
    </style>

    @include('admin.layout.header')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">



            </div>

            <section class="list-group-navigation">
                <div class="row mt-0">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-1">
                                        <h4 class="float-left">Contact Report</h4>

                                    </div>
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="contact_list_table" class="table table-striped table-bordered w-100" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>

                                                        <th>Contact Subject</th>
                                                        <th>file</th>
                                                        <th>Description</th>
                                                        <th>Date</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>

                                            </table>
                                            <!-- datatable ends -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- users list ends -->
    </div>
    </div>
    </div>
    <!-- <div class="buy-now" style="right: 60px;"><button type="button" class="btn btn-danger" id="add_Country_detail">+</button></div> -->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- Earning Swiper Starts -->


    @include('admin.layout.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    </body>
    <script>
        $(document).ready(function() {


            contactTable();

            function contactTable() {

                $('.contact_list_table').DataTable().clear().destroy();

                $(".contact_list_table").DataTable({

                    serverSide: true,
                    processing: true,
                    searching: true,
                    order: [],
                    ajax: {

                        url: "/contact_show",
                        type: "GET",

                    },

                    "columns": [{
                            data: 'id'
                        },
                        {
                            data: 'name'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: 'phone'
                        },

                        {
                            data: 'contact_sub'

                        },
                        {
                            data: 'file'

                        },
                        {
                            data: 'description'

                        },
                        {
                            data: 'created_at'

                        },

                    ]
                });

            }
        });
    </script>

</html>