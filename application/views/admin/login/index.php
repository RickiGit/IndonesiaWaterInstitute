<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IWI - Admin</title>
    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url()?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url()?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/summernote/summernote-bs4.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/admin/css/mystyle.css" rel="stylesheet">
</head>
<body style="background:#4e73df">
    <div class="container">
        <div class="row">
            <div class="col offset-md-4 col-md-4" style="margin-top:10%">
                <center>
                    <img src="<?php echo base_url()?>assets/images/background/logo2.png" style="width:80%">
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col offset-md-3 col-md-6">
                <form enctype="multipart/form-data" id="loginform">
                    <div class="card" style="padding: 20px; margin-top: 15%;">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control m-bottom10">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control m-bottom10">
                        <input type="submit" class="btn btn-primary" value="Login"/>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url()?>assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/js/function.js"></script>
</body>
</html>