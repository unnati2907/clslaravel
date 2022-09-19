<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="author" content="">
    <title>Legal Awareness and News</title>
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
                                        <h4 class="float-left">Legal awareness and News List</h4>
                                        <div class="float-right">
                                            <a id="add_legal" class="btn btn-sm btn-primary"><i class="bx bx-plus"></i>Add News</a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="legal_list_table" class="table table-striped table-bordered w-100" style="width: 100%;">
                                                <thead>
                                                    <tr>

                                                        <th>Content</th>

                                                        <th>Position</th>
                                                        <th>Subject</th>
                                                        <th>status</th>


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
    </div> -->
    </div>
    </div>
    <!-- <div class="buy-now" style="right: 60px;"><button type="button" class="btn btn-danger" id="add_Country_detail">+</button></div> -->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- Earning Swiper Starts -->

    <div class="modal fade" id="add_legal_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding: 0.6rem 1rem;">
                    <h4 class="modal-title" id="add_legal_modal_heading"></h4>
                    <button type="button" class="close close-legal-add-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container">
                    <div class="modal-body pb-0">
                        <form id="add_legal_form" enctype="multipart/form-data" style="margin-bottom: 50px;">
                            @csrf
                            <input type="hidden" id="legal_id" name="legal_id" />
                            <div class="row" style="width: 100%;"></div>
                            <div class="row">

                                <div class="col-md-12 col-12">
                                    <div class="form-group"><label for="nf-email" class="form-control-label mb-0">Content<span class="text-danger"></span></label>
                                        <input type="text" id="content_text" name="content_text" placeholder="Post Content" class="form-control" value="">

                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12 col-12">
                                    <div class="form-group"><label for="nf-email" class="form-control-label mb-0">Position<span class="text-danger"></span></label>
                                        <input type="text" id="position" name="position" placeholder="Enter Position" class="form-control" value="">

                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12 col-12">
                                    <select class="form-group" aria-label="Default select example" id="subject" name="subject">
                                        <option selected>Open this select menu</option>
                                        <option id="1">Legal Awareness</option>
                                        <option id="2">News</option>

                                    </select>



                                </div>
                            </div>



                            <div class="row" style="margin-top:10px;">

                                <div class="col-md-6 col-6">
                                    <div class="form-group mb-0">
                                        <button class="btn btn-success add_legal_submit" type="button" style="width: 100%;">Save</button>
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




            $("#add_legal").on("click", function(event) {
                event.preventDefault();

                $("#add_legal_modal_heading").text("Add Legal awareness and News");
                $("#add_legal_modal").modal("show");

            });


            $(document).on("click", ".add_legal_submit", function() {

                let myForm = document.getElementById('add_legal_form');
                var formData = new FormData(myForm);

                formData.append('_token', '{{ csrf_token() }}');
                $(this).attr('disabled', true);

                $.ajax({
                    type: "POST",
                    url: "/add_legal",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('.close-legal-add-modal').trigger('click');
                        legalTable();
                        window.location.href = "{{url('/legal')}}";
                        document.getElementById("#add_legal_form").reset();


                    }
                });
            });

            legalTable();

            function legalTable() {

                $('.legal_list_table').DataTable().clear().destroy();

                $(".legal_list_table").DataTable({

                    serverSide: true,
                    processing: true,
                    searching: true,
                    order: [],
                    ajax: {

                        url: "legal/legal_show",
                        type: "GET",

                    },

                    "columns": [

                        {
                            data: 'content'
                        },
                        {
                            data: 'position'
                        },
                        {
                            data: 'subject'
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
                $("#add_legal_modal_heading").text("Update Legal");


                let id = $(this).data("id");

                $.get("/legal/edit_legal", {
                    id
                }, function(data) {
                    if (data != "") {
                        $("#legal_id").val(data.id);

                        $("#content_text").val(data.content);
                        $("#position").val(data.position);
                        $("#subject").val(data.subject);

                    }
                }, "json");



            });


            $(document).on('click', '.deactivate-post-btn', function() {
                let id = $(this).data('id');

                $.confirm({
                    title: 'Confirm!',
                    type: 'red',
                    content: 'Are you sure want to deactivate this Detail ?',
                    buttons: {
                        yes: function() {
                            $.get("{{ url('legal/legal_deactivate') }}", {
                                id
                            }, function(data) {
                                if (data.error == false) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: data.message
                                    });
                                    $('.legal_list_table').DataTable().ajax.reload();
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
                            $.get("{{ url('legal/legal_activate') }}", {
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