<?php include('dbcon.php'); ?>
<?php include('session.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/pace.css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Matiére</title>
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600" rel="stylesheet" type="text/css">
    <link href="assets/vendors/material-icons/material-icons.css" rel="stylesheet" type="text/css">
    <link href="assets/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet" type="text/css">
    <link href="assets/vendors/feather-icons/feather.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jqvmap.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    <!-- Head Libs -->
    <script src="assets/js/modernizr.min.js"></script>
    <script data-pace-options='{ "ajax": false, "selectors": [ "img" ]}' src="assets/js/pace.min.js"></script>



</head>

<body class="sidebar-light sidebar-expand navbar-brand-dark">
    <div id="wrapper" class="wrapper">
        <!-- HEADER & TOP NAVIGATION -->
        <nav class="navbar">
            <div class="container-fluid px-0 align-items-stretch">
                <!-- Logo Area -->
                <div class="navbar-header">
                    <a href="dashboard.php" class="navbar-brand">
                        <img class="logo-expand" alt="" src="assets/img/sss.png">
                        <img class="logo-collapse" alt="" src="assets/img/logo-collapse.png">
                    </a>
                </div>
                <!-- /.navbar-header -->
                <!-- Left Menu & Sidebar Toggle -->
                
                <!-- /.navbar-left -->
                <!-- Search Form -->
                
                
                <!-- /.navbar-right -->
                <!-- User Image with Dropdown -->
                <ul class="nav navbar-nav">
                    <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle dropdown-toggle-user ripple" data-toggle="dropdown"><span class="avatar thumb-xs2"><img src="assets/demo/users/user.png" class="rounded-circle" alt=""> <i class="material-icons list-icon">expand_more</i></span></a>
                         <div
                        class="dropdown-menu  dropdown-card dropdown-card-profile animated flipInY">
                            <div class="card">
                                <header class="card-header d-flex mb-0">
                                    <a
                                    href="logout.php" class="col-md-4 text-center"><i class="material-icons md-24 align-middle">power_settings_new</i>
                                        </a>
                                </header>
                              
                            </div>
                            <!-- /.card -->
            </div>
            <!-- /.dropdown-card-profile -->
            </li>
            <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-nav -->
    </div>
    <!-- /.container-fluid -->
    </nav>
    <!-- /.navbar -->
    <div class="content-wrapper">
        <!-- SIDEBAR -->
        <aside class="site-sidebar scrollbar-enabled" data-suppress-scroll-x="true">
            <!-- User Details -->
            <div class="side-user">
                <figure class="side-user-bg" style="background-image: url(assets/demo/user-image-cropped.jpg)">
                    <img src="assets/demo/user-image-cropped.jpg" alt="" class="d-none">
                </figure>
                <div class="col-sm-12 text-center p-0 clearfix">
                    
                    <!-- /.d-inline-block -->
                    <div class="lh-14 mr-t-5 sidebar-collapse-hidden">
                         <?php $query= mysqli_query($conn,"select * from users where user_id = '$session_id'")or die(mysqli_error());
                                $row = mysqli_fetch_array($query);
                        ?>
                        <h6 class="hide-menu side-user-heading"</i><?php echo $row['firstname']." ".$row['lastname'];  ?></h6>
                    </div>
                </div>
                <!-- /.col-sm-12 -->
            </div>
            <!-- /.side-user -->
            <!-- Sidebar Menu -->
            <nav class="sidebar-nav">
                <ul class="nav in side-menu">
                    <li class="menu-item-has-children current-page"><a href="index.html"><i class="list-icon material-icons">home</i> <span class="hide-menu">Dashboard</span></a>
                        <ul class="list-unstyled sub-menu">
                            <li><a href="subjects.php">Matiere
                            </a>
                            </li>
                            </li>
                            <li><a href="class.php">Niveaux</a>
                            </li>
                            <li><a href="admin_user.php">Admins</a>
                            </li>
                            <li><a href="department.php">Departement</a>
                            </li>
                            <li><a href="student.php">Etudiants</a>
                            </li>
                            <li><a href="teachers.php">Enseignants</a>
                            </li>
                            <li><a href="downloadable.php">Cours chargés</a>
                            </li>
                            <li><a href="assignment.php">Exercice chargés</a>
                            </li>
                            <li><a href="content.php">Contenue</a>
                            </li>
                            <li><a href="user_log.php">Historique d'utilisation</a>
                            </li>
                            <li><a href="activity_log.php">Historique d'Activité</a>
                            </li>
                            <li><a href="school_year.php">Année scolaire</a>
                            </li>
                            <li><a href="calendar_of_events.php">Calendrier</a>
                            </li>
                        </ul>
                    </li>
                   
                  
                        </ul>
                    </li>
                </ul>
                <!-- /.side-menu -->
            </nav>
            <!-- /.sidebar-nav -->
        </aside>
        <!-- /.site-sidebar -->
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="container-fluid">
                <div class="row page-title clearfix">
                    
                    <!-- /.page-title-left -->
                    <div class="page-title-right d-none d-sm-inline-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div>
                    <!-- /.page-title-right -->
                </div>
                <!-- /.page-title -->
            </div>

            <form method="post">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="l0">Id de matiére</label>
                                            <div class="col-md-9">
                                                <input class="form-control"  name="subject_code" id="inputEmail" placeholder="Id de matiére" type="text">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="l0">Nom de matiére</label>
                                            <div class="col-md-9">
                                                <input class="form-control" class="span8" name="title" id="inputPassword" placeholder="Nom de matiére" type="text">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="l0">Nombre d'unité</label>
                                            <div class="col-md-9">
                                                <input class="form-control" class="span1" name="unit" id="inputPassword" placeholder="Nombre d'unité" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="inputPassword">Semestre</label>
                                            <div class="col-md-9">
                                            <select class="form-control" data-toggle="select2" data-plugin-options='{"minimumResultsForSearch": -1}'>
                                                <option>1</option>
                                                <option>2</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="l15">Description</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" name="description" id="ckeditor_full">
                                                   
                                                </textarea>
                                            </div>
                                        </div>


                                  
                                        <center>
                                            <div class="col-lg-3 col-sm-6 col-12 mr-b-20">
                                            <button name="save" type="submit"  class="btn btn-block btn-primary ripple">Ajouter matiére</button>
                                        </div>
                                        </center>



            </form>
            <?php
                                        if (isset($_POST['save'])){
                                        $subject_code = $_POST['subject_code'];
                                        $title = $_POST['title'];
                                        $unit = $_POST['unit'];
                                        $description = $_POST['description'];
                                        $semester = $_POST['semester'];
                                        
                                        
                                        $query = mysqli_query($conn,"select * from subject where subject_code = '$subject_code' ")or die(mysqli_error());
                                        $count = mysqli_num_rows($query);

                                        if ($count > 0){ ?>
                                        <script>
                                        alert('Data Already Exist');
                                        </script>
                                        <?php
                                        }else{
                                        mysqli_query($conn,"insert into subject (subject_code,subject_title,description,unit,semester) values('$subject_code','$title','$description','$unit','$semester')")or die(mysqli_error());
                                        
                                        
                                        mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Ajouter Matiere $subject_code')")or die(mysqli_error());
                                        
                                        
                                        ?>
                                        <script>
                                        window.location = "subjects.php";
                                        </script>
                                        <?php
                                        }
                                        }
                                        
                                        ?>
<?php include('script.php'); ?>
           
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script>
                CKEDITOR.replace('aaa')    ;

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.9/metisMenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.9.2/countUp.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jquery.vmap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/maps/jquery.vmap.usa.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/custom.js"></script>
<script src="ckeditor/ckeditor.js"></script>
    <script>
                CKEDITOR.replace('description')    ;

    </script>
</body>
</html>