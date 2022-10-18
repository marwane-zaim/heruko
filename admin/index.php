<?php include('dbcon.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/demo/favicon.png">
    <title>Login Administrateur</title>
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600" rel="stylesheet" type="text/css">
    <link href="assets/vendors/material-icons/material-icons.css" rel="stylesheet" type="text/css">
    <link href="assets/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet" type="text/css">
    <link href="assets/vendors/feather-icons/feather.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <script src="vendors/jGrowl/jquery.jgrowl.js"></script>
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <link href="vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
    <!-- Head Libs -->
</head>

<body id="login"  class="body-bg-full profile-page"   style="background-image: url(assets/img/back.jpg)">
    <div id="wrapper" class="row wrapper">
        <div class="container-min-full-height d-flex justify-content-center align-items-center">
            <div class="login-center">
                <div class="navbar-header text-center mt-2 mb-4">
                    <a href="index.php">
                        <img alt="" src="assets/img/aaa.png">
                    </a>
                </div>
                <!-- /.navbar-header -->
                <form  method="post" id="login_form"   >
                    <div class="form-group">
                        <label for="example-email">Identifiant</label>
                        <input type="text"  class="form-control form-control-line" id="usernmae" name="username" placeholder="Identifiant" required>
                    </div>
                    <div class="form-group">
                        <label for="example-password">Mot de Passe</label>
                        <input type="password" placeholder="Mot de passe" id="password" name="password"  required class="form-control form-control-line">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-lg btn-primary text-uppercase fs-12 fw-600" name="login" type="submit">Se Connecter </button>
                    </div>
                  
                    <!-- /.form-group -->
                </form>


        
           
        </div>
        <!-- /.d-flex -->
        <script>
            jQuery(document).ready(function(){
            jQuery("#login_form").submit(function(e){
                    e.preventDefault();
                    var formData = jQuery(this).serialize();
                    $.ajax({
                        type: "POST",
                        url: "login.php",
                        data: formData,
                        success: function(html){
                        if(html=='true')
                        {
                        $.jGrowl("Bonjour dans votre espace d'Administrateur", { header: ' ' });
                        var delay = 2000;
                            setTimeout(function(){ window.location = 'dashboard.php'  }, delay);  
                        }
                        else
                        {
                        $.jGrowl("Verifier votre username ou mot de passe", { header: ' ' });
                        }
                        }
                        
                    });
                    return false;
                });
            });
            </script>
    </div>


    <!-- /.body-container -->

    <?php include('script.php'); ?>
</body>

</html>