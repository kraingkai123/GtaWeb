<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="./admin/apple-icon.png">
    <link rel="shortcut icon" href="./admin/favicon.ico">


    <link rel="stylesheet" href="./admin/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./admin/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./admin/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="./admin/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="./admin/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="./admin/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <img class="align-content" src="./admin/images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form id="FrmLogin" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Character name</label>
                            <input type="text" name="CharName" id="CharName" class="form-control" placeholder="Character name" aria-required="true" alert="Please enter character name" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password" aria-required="true" alert="Please enter password" required>
                        </div>

                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="./admin/vendors/jquery/dist/jquery.min.js"></script>
    <script src="./admin/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="./admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./admin/assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</body>

</html>
<script>
    $(document).ready(function() {
        $('#FrmLogin').on('submit', function(e) {
            e.preventDefault(); // Prevent the form from submitting the traditional way

            var formData = $('#FrmLogin').serialize();
            var error = 0;
            $(".form-control").each(function(index) {
                if ($(this).attr("aria-required") == "true") {
                    if ($(this).val() == "") {
                        Swal.fire({
                            title: $(this).attr('alert'),
                            text: "",
                            icon: "error",
                            confirmButtonText: "ok",
                        });
                        error++
                        return false;
                    }
                }
            });
            if (error == 0) {
                $.ajax({
                    type: "POST",
                    url: './admin/save/LoginProc.php',
                    data: formData,
                    //async: false,
                    /*  cache: false,
                     contentType: false,
                     processData: false, */
                    dataType: 'json',
                    beforeSend: function() {
                        showLoadingPage()
                    },
                    success: function(response) {
                        if (response.Status == true) {
                            swal.close();
                            location.href = response.url;
                           
                        } else {
                            Swal.fire({
                                title: "error",
                                text: response.Message,
                                confirmButtonText: "ok",
                                icon: "error"
                            });
                        }
                    }
                });

            }
        });
    });
       function showLoadingPage(showText = "") {
        let text = showText || "Loading...";
        Swal.fire({
            title: '',
            text: text,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading(); // Display loading spinner
            }
        });

    }
</script>