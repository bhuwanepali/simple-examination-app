<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .notify.notification {
            width: 300px;
            background-color: green;
            color: #fff;
            margin-top: 10px;
            margin-left: 1050px;
        }

        .notify.notification_error {
            background-color: #ff0000;
            width: 300px;
            color: #fff;
            margin-top: 10px;
            margin-left: 1050px;
        }
    </style>
    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="notify notification"></div>
    <div class="notify notification_error"></div>
    <div id="app">
        @yield('content')
    </div>

    <script src="https://kit.fontawesome.com/fd6715f3ee.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.slim.min.js"
        integrity="sha512-5NqgLBAYtvRsyAzAvEBWhaW+NoB+vARl6QiA02AFMhCWvPpi7RWResDcTGYvQtzsHVCfiUhwvsijP+3ixUk1xw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        //modal
        $(document).off("click", ".view");
        $(document).on("click", ".view", function() {
            var id = $(this).data("id");
            var url = $(this).data("url");
            var modtype = $(this).data("modaltype");

            axios
                .post(url, {
                    id: id
                })
                .then((response) => {
                    if (response.data.status == "success") {
                        setTimeout(function() {
                            $("#myView").modal("show");
                            $("#modal_head").html(response.data.title);
                            $("#modal_body").html(response.data.template);
                        }, 100);
                    } else {
                        setTimeout(function() {
                            $("#modal_head").html(response.data.status);
                            $("#modal_body").html(response.data.message);
                        }, 100);
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        });

        // Save and Update
        $(document).off("click", ".save");
        $(document).on("click", ".save", function(e) {
            e.preventDefault();
            var formid = $(this)
                .closest("form")
                .attr("id");

            var action = $("#" + formid).attr("action");
            var data = new FormData($("form#" + formid)[0]);
            var is_table_refresh = $(this).data("is_table_refresh");
            var isdismiss = $(this).data("isdismiss");

            let url = action;
            axios
                .post(url, data)
                .then((response) => {
                    if (response.data.status == "success") {
                        $(".notification").html(
                            response.data.message + "&nbsp;<i class='fa fa-times '></i>"
                        );
                        $(".notification").addClass("alert");

                        if (isdismiss == "Y") {
                            $("body").removeClass("modal-open");
                            $(`#myView`).css("display", "none");
                            $(`#myView`)
                                .find(".formdiv")
                                .html("");
                        }
                        if (is_table_refresh == "Y") {
                            location.reload();
                        }

                    } else {
                        $(".notification_error").html(
                            response.data.message + "&nbsp;<i class='fa fa-times '></i>"
                        );
                        $(".notification_error").addClass("alert");
                    }
                    setTimeout(function() {
                        $(".notification ").html("");
                        $(".notification").removeClass("alert");
                        $(".notification_error ").html("");
                        $(".notification_error").removeClass("alert");
                    }, 3000);
                })
                .catch((error) => {
                    console.log(error);
                });
        });

        // For Delete From List
        $(document).off("click", ".btnDelete");
        $(document).on("click", ".btnDelete", function() {
            var conf = confirm("Are Your Want to Sure to delete?");
            if (conf) {
                var deleteurl = $(this).data("url");
                var tableid = $(this).data("tableid");
                var refresh = $(this).data("is_refresh");
                var id = $(this).data("id");
                axios
                    .post(deleteurl, {
                        id: id
                    })
                    .then((response) => {
                        var resp = response.data;
                        if (resp.status == "success") {
                            $(".notification").html(
                                response.data.message + "&nbsp;<i class='fa fa-times '></i>"
                            );
                            $(".notification").addClass("alert");

                            if (refresh == "Y") {
                                location.reload();
                            }
                        } else {
                            alert(response.data.message);
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        });

        $(document).off("click", ".btn_send_mail");
        $(document).on("click", ".btn_send_mail", function(e) {
            e.preventDefault();

            var href = $(this).data("href");
            var id = $(this).data("id");
            var url = href;
            axios
                .post(url, {
                    id: id
                })
                .then((response) => {
                    if (response.data.status == "success") {
                        $(".notification").html(
                            response.data.message + "&nbsp;<i class='fa fa-times '></i>"
                        );
                        $(".notification").addClass("alert");
                        location.reload();
                    } else {
                        $(".notification_error").html(
                            response.data.message + "&nbsp;<i class='fa fa-times '></i>"
                        );
                        $(".notification_error").addClass("alert");
                    }
                    setTimeout(function() {
                        $(".notification ").html("");
                        $(".notification").removeClass("alert");
                        $(".notification_error ").html("");
                        $(".notification_error").removeClass("alert");
                    }, 3000);
                })
                .catch((error) => {
                    console.log(error);
                });
        });

        $(document).off('click', '.checkbox');
        $(document).on('click', '.checkbox', function() {
            // Uncheck all checkboxes with the 'checkbox' class except for the one that was clicked
            $('.checkbox').not(this).prop('checked', false);
        });
    </script>
    <!-- Modal -->
    <div class="modal fade" id="myView" tabIndex="-1" role="dialog" aria-labelledby="smallModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_head"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal_body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
