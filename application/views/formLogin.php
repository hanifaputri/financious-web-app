<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gray-200">

    <div class="d-flex flex-column align-items-center ">

        <!-- Outer Row -->
        <div class="row ">
            <div class="mt-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="row mb-4">
                                        <div class="col-xs-4 mr-4">
                                            <span><img style="height:100px;" class="mr-2" src="<?php echo base_url('assets/img/favicon.png')?>"/></span>
                                        </div>
                                        <div class="col-xs-8 align-self-center">
                                            <h1 class="h4 text-gray-900 mb-2"><?php echo $title ?></h1>
                                            <span class="font-weight-bold">SM Entertainment Company</span>
                                        </div>
                                    </div>
                                    
                                    <hr class="mb-4">

                                    <!-- Error Message -->
                                    <?php echo $this->session->flashdata('pesan') ?>
                                    <form method="POST" class="user">
                                        <div class="form-group">
                                            <input name="username" type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username">
                                            <?php echo form_error('username','<small class="text-danger">','</small>'); ?>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                            <?php echo form_error('password','<small class="text-danger">','</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column align-items-center justify-content-center" href="<?php echo base_url('pegawai/dashboard')?>">
                    <small class="text-center">Powered by</small>
                    <h3 class="sidebar-brand-text mx-3 text-secondary font-weight-bold">
                    <i class="fas fa-piggy-bank mr-3"></i>
                    Financious
                    </h3>
                    <div class="copyright text-center my-auto">
                        <small>Alizza Iman Raddin - Ghina Zahirah - Hanifa Putri Rahima.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>