<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="author" content="">
    <title>headline</title>
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
                                        <h4 class="float-left">Headline List</h4>
                                        <div class="float-right">
                                            <a id="add_headline" class="btn btn-sm btn-primary"><i class="bx bx-plus"></i>Add Headline</a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="headline_list_table" class="table table-striped table-bordered w-100" style="width: 100%;">
                                                <thead>
                                                    <tr>

                                                        <th>Headline</th>
                                                        <th>Position</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
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

    <div class="modal fade" id="add_headline_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding: 0.6rem 1rem;">
                    <h4 class="modal-title" id="add_headline_modal_heading"></h4>
                    <button type="button" class="close close-headline-add-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container">
                    <div class="modal-body pb-0">
                        <form action="#" method="post" id="add_headline_form" style="margin-bottom: 50px;">
                            @csrf
                            <input type="hidden" id="headline_id" name="headline_id" />
                            <div class="row" style="width: 100%;"></div>
                            <div class="row">

                                <div class="col-md-12 col-12">
                                    <div class="form-group"><label for="nf-email" class="form-control-label mb-0">Headline<span class="text-danger"></span></label>
                                        <input type="text" id="headline_text" name="headline_text" placeholder="Post Category English" class="form-control" value="">

                                    </div>
                                </div>
                            </div>



                            <div class="row">

                                <div class="col-md-12 col-12">
                                    <div class="form-group"><label for="nf-email" class="form-control-label mb-0">Position<span class="text-danger"></span></label>
                                        <input type="text" id="position" name="position" placeholder="Enter Position" class="form-control">

                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-top:10px;">

                                <div class="col-md-6 col-6">
                                    <div class="form-group mb-0">
                                        <button class="btn btn-success add_headline_submit" type="button" style="width: 100%;">Save</button>
                                    </div>
                                </div>


                                <div class="col-md-6 col-6">
                                    <div class="form-group mb-2">
                                        <button class="btn btn-danger" id="cancel-btn" class="close" data-dismiss="modal" aria-label="Close" style="width: 100%;">Cancel</button>
                                    </div>
                                </div>

                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.layout.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    </body>
    <script>
        $(document).ready(function() {


            headlineTable();

            $("#add_headline").on("click", function(event) {
                event.preventDefault();
                $("#add_headline_modal_heading").text("Add Headline");
                $("#add_headline_modal").modal("show");
            });


            $(document).on("click", ".add_headline_submit", function() {

                let myForm = document.getElementById('add_headline_form');
                var formData = new FormData(myForm);

                formData.append('_token', '{{ csrf_token() }}');
                $(this).attr('disabled', true);

                $.ajax({
                    type: "POST",
                    url: "/add_headline",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('.close-headline-add-modal').trigger('click');

                        headlineTable();
                    }
                });
            });


            function headlineTable() {

                $('.headline_list_table').DataTable().clear().destroy();

                $(".headline_list_table").DataTable({

                    serverSide: true,
                    processing: true,
                    searching: true,
                    order: [],
                    ajax: {

                        url: "headline/headline_show",
                        type: "GET",

                    },

                    "columns": [

                        {
                            data: 'headline'
                        },
                        {
                            data: 'position'
                        },
                        {
                            data: 'status'
                        },

                        {
                            data: 'actions'

                        },
                    ]
                });

            }


            $(document).on("click", ".edit_btn", function() {
                $("#add_headline_modal_heading").text("Edit Headline");


                let id = $(this).data("id");

                $.get("/headline/edit_headline", {
                    id
                }, function(data) {
                    if (data != "") {
                        $("#headline_id").val(data.id);
                        $("#headline_text").val(data.headline);
                        $("#position").val(data.position);


                    }
                }, "json");

            });


            $(document).on("click", ".update_author", function() {


                let myForm = document.getElementById('add_headline_form');

                var formData = new FormData(myForm);
                formData.append('_token', '{{ csrf_token() }}');
                $(this).attr('disabled', true);


                $.ajax({
                    type: "post",
                    url: "/headline_update",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert(" Author updated successfully..!");
                    }
                });

            });


            $(document).on('click', '.deactivate-post-btn', function() {
                let id = $(this).data('id');

                $.confirm({
                    title: 'Confirm!',
                    type: 'red',
                    content: 'Are you sure want to deactivate this Detail ?',
                    buttons: {
                        yes: function() {
                            $.get("{{ url('headline/headline_deactivate') }}", {
                                id
                            }, function(data) {
                                if (data.error == false) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: data.message
                                    });
                                    $('.headline_list_table').DataTable().ajax.reload();
                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: data.message
                                    });
                                }
                            }, 'json');
                        },
                        no: function() {}
                    }
                });
            });


            $(document).on('click', '.activate-post-btn', function() {
                let id = $(this).data('id');

                $.confirm({
                    title: 'Confirm!',
                    type: 'red',
                    content: 'Are you sure want to activate this Detail ?',
                    buttons: {
                        yes: function() {
                            $.get("{{ url('headline/headline_activate') }}", {
                                id
                            }, function(data) {
                                if (data.error == false) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: data.message
                                    });
                                    $('.headline_list_table').DataTable().ajax.reload();
                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: data.message
                                    });
                                }
                            }, 'json');
                        },
                        no: function() {}
                    }
                });
            });



        });
    </script>

</html>