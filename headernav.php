
<div id="wrapper" class="wrapper">
        <!-- HEADER & TOP NAVIGATION -->
        <nav class="navbar">
            <div class="container-fluid px-0 align-items-stretch">
                <!-- Logo Area -->
                <div class="navbar-header">
                    <a href="" class="navbar-brand">
                        <img class="logo-expand" alt="" src="#">
                        <img class="logo-collapse" alt="" src="#">
                    </a>
                </div>
                <!-- /.navbar-header -->
                <!-- Left Menu & Sidebar Toggle -->
                
                <!-- /.navbar-search -->
                <div class="spacer"></div>
                <!-- Right Menu -->
            
                <!-- /.navbar-right -->
                <!-- User Image with Dropdown -->
                <ul class="nav navbar-nav">
								<?php $query= mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
							?>
                    <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle dropdown-toggle-user ripple" data-toggle="dropdown"><span class="avatar thumb-xs2"><img src="admin/<?php echo $row['location']; ?>" class="rounded-circle" alt=""> <i class="material-icons list-icon">expand_more</i></span></a>
                        <div
                        class="dropdown-menu dropdown-left dropdown-card dropdown-card-profile animated flipInY">
                            <div class="card">
                             
                                <ul class="list-unstyled card-body">
                                    <li><a href="#"><span><span class="align-middle text-primary"> <?php echo $row['firstname']." ".$row['lastname'];  ?></span></span></a>
                                    </li>
                                    <li><a href="change_password_student.php"><span><span class="align-middle">Changer Mot de passe</span></span></a>
                                    </li>
                                    <li><a href="#myModal_student" data-toggle="modal"><span><span class="align-middle">Changer Photo profile</span></span></a>
                                    </li>
                                    <li><a href="logout.php"><span><span class="align-middle"><i class="icon-signout"></i>Se déconnecter</span></span></a>
                                    </li>
                                </ul>
                                <!-- /.card-body -->
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
                <figure class="side-user-bg" style="background-image: url(student/assets/demo/user-image-cropped.jpg)">
                    <img src="student/assets/demo/user-image-cropped.jpg" alt="" class="d-none">
                </figure>
                <div class="col-sm-12 text-center p-0 clearfix">
                   
                        <figure class="avatar-img thumb-sm mr-b-0 d-none">
                            <img src="student/assets/demo/users/user1.jpg" class="rounded-circle" alt="">
                        </figure>
                    
                    <!-- /.d-inline-block -->
                    <div class="lh-14 mr-t-5 sidebar-collapse-hidden">
                        <h6 class="hide-menu side-user-heading"><?php echo $row['firstname']." ".$row['lastname'];  ?></h6>
                    </div>
                </div>
                <!-- /.col-sm-12 -->
            </div>
            <!-- /.side-user -->
            <!-- Sidebar Menu -->
            <nav class="sidebar-nav">
			<?php include('count.php'); ?>
                <ul class="nav in side-menu">
				<li class="menu-item-has-children active"><a href="student_notification.php"><i class="list-icon material-icons"><span class="material-icons">
notifications
</span></i> <span class="hide-menu"> Notifications


	</span></a>
                        
                    </li>
                    <li class="menu-item-has-children current-page"><a href="dashboard_student.php"><i class="list-icon material-icons">group</i> <span class="hide-menu">Mes Classes</span></a>
                     
                    </li>


					<?php
			$message_query = mysqli_query($conn,"select * from message where reciever_id = '$session_id' and message_status != 'read' ")or die(mysqli_error());
			$count_message = mysqli_num_rows($message_query);
			?>
                   
                    <li class="menu-item-has-children"><a href="student_message.php"><i class="list-icon material-icons">email</i>
					 <span class="hide-menu">Mes messages
				
					</span></a>
                   
                    </li>
          
  
                </ul>
                <!-- /.side-menu -->
            </nav>
            <!-- /.sidebar-nav -->
        </aside>
        <!-- /.site-sidebar -->