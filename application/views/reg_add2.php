<!DOCTYPE html>
<html lang="en">
<?php echo form_open('reg_controller/add_employee');?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../brand.ico">

        <title>Aegis Infinite | Dashboard</title>

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="../index.css" rel="stylesheet">
        <link href="css/simple-sidebar.css" rel="stylesheet">
        <link href="css/search.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">

        <style>
            body{
                font-family: 'Source Sans Pro', sans-serif;
            }

            #page-content-wrapper {
                position: relative;
            }

            input[type=text]{
                width:100%;
            }

            #success-add{
                display: none;
            }

            .editable{
                display: block;
                width: 100%;
                padding: 6px 12px;
                color: #555;
                border: 1px solid #ccc;
                border-radius: 4px;
                cursor: default;
            }

            .editable:focus {
                border-color: #ccc;
                box-shadow: inset 0 0 0 rgba(0,0,0,.075),0 0 0 rgba(102,175,233,.6);
                outline: 0px solid transparent; 
        </style>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../index.js"></script>

        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
    </head>
    <body>
        <div id="wrapper">

            <div id="sidebar-wrapper">
                <div class="sidebar-nav">
                    <div class="sidenav">
                        <div class="side-info">
                            <ul class="profile-info" style="margin: 0px">
                                <li>
                                    <div class="profile-image">
                                        <img class="img-profile" src="../admin.png"/>
                                    </div>
                                    <div class="profile-label img-info">
                                        <label id="name">Freddie Wood</label><button id="more-info"class="btndd"><span id="name" class="caret"></span></button>
                                        <label id="role">Admin</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="address">
                            <span class="glyphicon glyphicon-map-marker"></span> <label>ADDRESS</label>
                            <p>Dubai, United Arab Emirates</p>
                            <br>
                            <span class="glyphicon glyphicon-earphone"></span><label>CONTACT</label>
                            <p>
                                <label>Email</label>
                                <label style="float: right">aaronjackson@leidos.com</label>
                            </p>
                            <hr>
                            <p>
                                <label>Phone</label>
                                <label style="float: right">+971 50 222 1234</label>
                            </p>
                            <hr> 
                            <p class="social">
                                <label>Social</label>
                                <label style="float: right"><i class="fa fa-facebook"></i><i class="fa fa-twitter"></i><i class="fa fa-google-plus"></i>  </label>
                            </p> 
                            <br>
                            <span class="glyphicon glyphicon-map-marker"></span> <label>ABOUT ME</label>
                            <p>Lorem Ipsum is my main thing so whatever guys. I'm the Admin, and I'm awesome.</p>                
                        </div> 

                        <!-- MENU -->
                        <p class="mini-title">MENU</p>
                        <div id="mail" class="profile">
                            <span class="glyphicon glyphicon-envelope"></span><label id="skills">EMAILS</label>
                            <span id="badge" class="badge">21</span>
                        </div>
                        <div  class="profile">
                            <a href="index.html"><span class="glyphicon glyphicon-modal-window"></span><label id="skills">DASHBOARD</label></a>
                            <span id="badge" class="badge"></span>
                        </div>
                        <div id="proj" class="profile">
                            <a href="employees.html"><span class="glyphicon glyphicon-user"></span><label id="skills">EMPLOYEES</label></a>
                            <span id="badge" class="badge"></span>
                        </div>
                        <div class="profile">
                            <a href="projects.html"><span class="glyphicon glyphicon-book"></span><label id="skills">PROJECTS</label></a>
                            <span id="badge" class="badge"></span>
                        </div>     

                        <!-- SKILLS PROFILE --> 
                    </div>
                </div>
            </div><!-- side bar wrapper-->


            <!-- page content wrapper -->
            <div id="page-content-wrapper">
                <div class="navigation">
                    <ul class="left">
                        <div id="menu-toggle"><i class="fa fa-bars"></i></div>
                    </ul>
                    <ul class="right">
                        <img src="../brand.png"/>
                    </ul>
                </div>
                <div class="row">
                    <div class="row" style="margin: 0px 5px;">
                        <div style="float: left;">
                            <ul class="nav nav-pills">
                                <li><a href="employees.html">All Employees</a></li>
                                <li class="active"><a href="#">Add Employees</a></li>
                                <li><a href="#">Edit Employees</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="row-table" class="row" style="margin: 0px 5px;">
                        <div class="container" style="margin: 0px 10px;">
                                <div  class="row">
                                <div id="success-add" class="alert alert-success">
                                  <strong>Success!</strong> New employee has been added.
                                </div>
                                </div>

                                <form role="form">
                                    <div class="form-group col-lg-6">                                    
                                        <label>First Name</label>
                                        <?php 
                                        $data = array('id'=>'fname',
                                        		'name'=>'fname',
                                        		'class'=>'form-control'
                                        );
                                        
                                        echo form_input($data); ?>
                                    </div>
                                    <div class="form-group col-lg-6">                                    
                                        <label>Last Name</label>
                                        <?php echo form_input(array('id'=>'lname','name'=>'lname')); ?>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label>Email</label>
                                        <?php echo form_input(array('id'=>'email','name'=>'email')); ?>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label>Username</label>
                                        <?php echo form_input(array('id'=>'username','name'=>'username')); ?>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label>Password</label>
                                        <?php echo form_password(array('id'=>'password','name'=>'password')); ?>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label>Repeat Password</label>
                                        <input type="password" name="" class="form-control" placeholder="Repeat Password" id="" value="defaultpassword">
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label>Job Role</label>
                                        <?php $role = array(
		'employee'         => 'Employee',
		'project manager'  => 'Project Manager',
		'admin'            => 'Admin',
);

echo form_dropdown('role', $role, 'employee');?>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label>Job Title</label>
                                        <?php echo form_input(array('id'=>'jobTitle','name'=>'jobTitle')); ?>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label>Location</label>
                                                   <?php $location = array(
		'United Arab Emirates'         => 'United Arab Emirates',
		'United Kingdom'  => 'United Kingdom',
		'South Korea'            => 'South Korea',
        'Spain'            => 'Spain',
        'Canada'            => 'Canada',
        'United States'            => 'United States',                             
);

echo form_dropdown('location', $location, 'United Arab Emirates');?>
                          
                                    </div>
                                </form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php echo form_submit(array('id'=>'submit','value'=>'Register'));
echo form_close(); ?>
                                        </div>
                                    </div>
                            </div>
                    </div>
                </div><!-- page content wrapper -->
            </div><!-- wrapper -->
            <script src="../js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="../js/bootstrap.min.js"></script>

            <!-- Menu Toggle Script -->
    </body> 
</html>