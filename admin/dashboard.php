<?php include('dbcon.php'); ?>
<?php  include('session.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/pace.css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dashboard</title>
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
                        
                    </a>
                </div>
                <!-- /.navbar-header -->
                <!-- Left Menu & Sidebar Toggle -->
                <ul class="nav navbar-nav">
                    
                </ul>
                <!-- /.navbar-left -->
                <!-- Search Form -->
               
                <!-- /.navbar-search -->
                <div class="spacer"></div>
                <!-- Right Menu -->
               
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
                    <li class="menu-item-has-children current-page"><a href="dashboard.php"><i class="list-icon material-icons">home</i> <span class="hide-menu">Dashboard</span></a>
                        <ul class="list-unstyled sub-menu">
                            <li><a href="subjects.php">Matiere
                            </a>
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
        <div class="container-fluid">
                <div class="widget-list">
                    <div class="row">
                        <div class="col-md-12 widget-holder">
                            <div class="widget-bg">
                                <div class="widget-body clearfix">
                                    <h1 class="box-title mr-b-0">Statistiques</h1>
                                    <br><br><br><br><br><br>
                                    <div class="row text-center">
                                            
                                
                                       
                                     <?php 
                                $query_student = mysqli_query($conn,"select * from student")or die(mysqli_error());
                                $count_student = mysqli_num_rows($query_student);
                                ?>   
                                           <div class="col-md-3 col-sm-6 mr-b-40">
                                            <input data-plugin="knob" data-width="150" data-height="150" data-min="-20000" data-displayprevious="true" data-readonly="true" data-max="20000" data-step="2000" value="<?php echo $count_student ?>" data-fgcolor="#03a9f3">
                                            <h6 class="text-muted mr-t-10">Etudiants</h6>
                                        </div>
                                        

                                <?php 
                                $query_teacher = mysqli_query($conn,"select * from teacher")or die(mysqli_error());
                                $count_teacher = mysqli_num_rows($query_teacher);
                                ?>       <div class="col-md-3 col-sm-6 mr-b-40">
                                            <input data-plugin="knob" data-width="150" data-height="150" data-min="-20000" data-displayprevious="true" data-readonly="true" data-max="20000" data-step="2000" value="<?php echo $count_teacher ?>" data-fgcolor="#03a9f3">
                                            <h6 class="text-muted mr-t-10">Enseignants</h6>
                                        </div>


                                    <?php 
                                $query_class = mysqli_query($conn,"select * from class")or die(mysqli_error());
                                $count_class = mysqli_num_rows($query_class);
                                ?>
                                         <div class="col-md-3 col-sm-6 mr-b-40">
                                            <input data-plugin="knob" data-width="150" data-height="150" data-min="-20000" data-displayprevious="true" data-readonly="true" data-max="20000" data-step="2000" value="<?php echo $count_class; ?>" data-fgcolor="#03a9f3">
                                            <h6 class="text-muted mr-t-10">Classe</h6>
                                        </div>


                                        <?php 
                                $query_file = mysqli_query($conn,"select * from files")or die(mysqli_error());
                                $count_file = mysqli_num_rows($query_file);
                                ?>

                                           <div class="col-md-3 col-sm-6 mr-b-40">
                                            <input data-plugin="knob" data-width="150" data-height="150" data-min="-20000" data-displayprevious="true" data-readonly="true" data-max="20000" data-step="2000" value="<?php echo $count_file; ?>" data-fgcolor="#03a9f3">
                                            <h6 class="text-muted mr-t-10">Cours chargés</h6>
                                        </div>


                                 <?php 
                                $query_subject = mysqli_query($conn,"select * from subject")or die(mysqli_error());
                                $count_subject = mysqli_num_rows($query_subject);
                                ?>

                                            <div class="col-md-3 col-sm-6 mr-b-40">
                                            <input data-plugin="knob" data-width="150" data-height="150" data-min="-20000" data-displayprevious="true" data-readonly="true" data-max="20000" data-step="2000" value="<?php echo $count_subject; ?>" data-fgcolor="#03a9f3">
                                            <h6 class="text-muted mr-t-10">Matiéres</h6>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.widget-body -->
                            </div>
                            <!-- /.widget-bg -->
                        </div>
                        <!-- /.widget-holder -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.widget-list -->
            </div>
</main>
       
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.9/metisMenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.9.2/countUp.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
     <script src="assets/vendors/charts/excanvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jquery.vmap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/maps/jquery.vmap.usa.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.11/jquery.knob.min.js"></script>s
    <script src="assets/js/template.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>