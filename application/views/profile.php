<?php
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $fname = ($this->session->userdata['logged_in']['fname']);
    $lname = ($this->session->userdata['logged_in']['lname']);    
    $sector = ($this->session->userdata['logged_in']['sector']);    
    $location = ($this->session->userdata['logged_in']['location']);
} else {
    header("location: login");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../brand.ico">

        <title>Aegis Infinite</title>

        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>css/navbar.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/admin.css" rel="stylesheet">
        <style>
            .footer {
                position: absolute;
                bottom: 0;
                width: 100%;
                /* Set the fixed height of the footer here */
                height: auto;
                background-color: #f5f5f5;
            }

            .profile-pic{
                width: 100%;
                height: 300px;
                overflow: hidden;
                display: block;
                margin: auto;
                position: relative;
            }

            .crop {
                position: absolute;
                margin: auto; 
                min-height: 100%;
                min-width: 100%;

                /* For the following settings we set 100%, but it can be higher if needed 
                See the answer's update */
                left: -100%;
                right: -100%;
                top: -100%;
                bottom: -100%;
            }

            .profile{
                margin-bottom: 20px;
                padding-left: 20px;
                padding-right: 20px;
            }

            .name{
                text-align: center;
            }

            .profile-content .fa{
                margin-right: 10px;
            }

            .profile-content .panel{
                border-radius: 0px;
            }

            .progress {
                position: relative;
                height: 25px;
                margin-bottom: 15px;
                margin-top: 15px;
            }
            .progress > .progress-type {
                position: absolute;
                left: 0px;
                font-weight: 800;
                padding: 3px 30px 2px 10px;
                color: rgb(255, 255, 255);
                background-color: rgba(25, 25, 25, 0.2);
            }
            .progress > .progress-completed {
                position: absolute;
                right: 0px;
                font-weight: 800;
                padding: 3px 10px 2px;
            }

            .profile .col-md-9{
                padding-right: 0px;
                padding-left: 0px;
            }

            .pull-right .fa{
                margin-left: 0px;
            }

            .label .glyphicon{
                margin-right: 5px;
                margin-left: 5px;
            }
        </style>

    </head>
    <body>
        <!-- NAVBAR -->
        <nav class="navbar" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>images/logo-w.png" class="brand"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span>Dashboard</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-calendar"></span>Calendar</a></li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="glyphicon glyphicon-search"></span>Search <b class="caret"></b></a>
                            <ul class="dropdown-menu" style="min-width: 300px;">
                                <li>
                                    <div class="col-md-12">
                                        <form class="navbar-form navbar-left" role="search">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search" />
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="glyphicon glyphicon-folder-open"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="label label-warning">7:00 AM</span>Hi :)</a></li>
                                <li><a href="#"><span class="label label-warning">8:00 AM</span>How are you?</a></li>
                                <li><a href="#"><span class="label label-warning">9:00 AM</span>What are you doing?</a></li>
                                <li class="divider"></li>
                                <li><a href="#" class="text-center">View All</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="glyphicon glyphicon-globe"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="label label-warning">4:00 AM</span>Favourites Snippet</a></li>
                                <li><a href="#"><span class="label label-warning">4:30 AM</span>Email marketing</a></li>
                                <li><a href="#"><span class="label label-warning">5:00 AM</span>Subscriber focused email
                                        design</a></li>
                                <li class="divider"></li>
                                <li><a href="#" class="text-center">View All</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $fname .' '. $lname; ?></a></li>
                                <li class="divider"></li>
                                <li><a href="#"><span class="glyphicon glyphicon-pencil"></span>Edit Profile</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <!-- END OF NAVBAR -->

        <!-- CONTENT -->
        <div class="profile container">
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <div class="profile">
                            <div class="profile-header-container">   
                                <div class="profile-pic">
                                    <img class="crop" src="../profile1.jpg" />
                                </div>
                            </div> 
                            <div class="name">
                                <h2><?php echo $fname .' '.$lname; ?><br/><small>Graphic Designer</small></h2>
                                <small><?php echo $location; ?> <i class="fa fa-map-marker"></i></small>   
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#"><i class="fa fa-user fa-fw"></i>Profile</a ></li>
                        <li><a href="#"><i class="fa fa-folder-open fa-fw"></i>Projects</a ></li>  
                        <li><a href="#"><i class="fa fa-calendar fa-fw"></i>Attendance</a></li>
                        <li><hr></li>
                        <li><a href="#"><i class="fa fa-cogs fa-fw"></i>Settings</a></li>
                        <li><hr></li>
                    </ul>
                </div>
                <div class="profile-content col-md-9">
                    <!-- Personal Details -->
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-user"></i>Personal Details</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-sm-5"><i class="fa fa-envelope-o"></i>Email</div>                                    
                                <div class="col-sm-7"><?php echo $email; ?></div>
                                <div class="col-sm-12"><hr></div>
                                <div class="col-sm-5"><i class="fa fa-map-marker"></i>Location</div>                                    
                                <div class="col-sm-7"><?php echo $location; ?></div>
                                <div class="col-sm-12"><hr></div>
                                <div class="col-md-5"><i class="fa fa-phone"></i>Phone</div>                                    
                                <div class="col-md-7">+971 55 503 4384</div>
                                <div class="col-sm-12"><hr></div>
                                <div class="col-md-5"><i class="fa fa-envelope"></i>Phone</div>                                    
                                <div class="col-md-7">+971 55 503 4384</div>
                            </div>
                        </div>
                    </div><!--/.col-md-6 -->
                    <!-- Work Details -->
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-suitcase"></i>Work Details
                                <div class="pull-right">
                                    <i class="fa fa-pencil"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-sm-5"><i class="fa fa-building-o"></i>Department</div>                                    
                                <div class="col-sm-7"><?php echo $sector; ?></div>
                                <div class="col-sm-12"><hr></div>
                                <div class="col-sm-5"><i class="fa fa-tasks"></i>Designation</div>                                    
                                <div class="col-sm-7">Graphic Designer</div>
                                <div class="col-sm-12"><hr></div>
                                <div class="col-md-5"><i class="fa fa-phone"></i>Phone</div>                                    
                                <div class="col-md-7">+971 55 503 4384</div>
                                <div class="col-sm-12"><hr></div>
                                <div class="col-md-5"><i class="fa fa-envelope"></i>Phone</div>                                    
                                <div class="col-md-7">+971 55 503 4384</div>
                            </div>
                        </div>
                    </div><!--/.col-md-6 --> 
                    <!-- Skills -->
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-fire"></i>Skills</h3>
                            </div>
                            <div class="panel-body">          
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                    <span class="progress-type">HTML / HTML5</span>
                                    <span class="progress-completed">60%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                    <span class="progress-type">ASP.Net</span>
                                    <span class="progress-completed">40%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20% Complete (info)</span>
                                    </div>
                                    <span class="progress-type">Java</span>
                                    <span class="progress-completed">20%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (warning)</span>
                                    </div>
                                    <span class="progress-type">JavaScript / jQuery</span>
                                    <span class="progress-completed">60%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                    <span class="progress-type">CSS / CSS3</span>
                                    <span class="progress-completed">80%</span>
                                </div>
                            </div>
                        </div>
                    </div><!--/.col-md-6 -->

                    <hr>
                </div>
            </div>
        </div>
        <!-- END OF CONTENT -->


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
=======
<html>

    <head>
        <title>Admin Page</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="profile">
            <?php
            echo "Hello <b id='welcome'><i>" . $username . "</i> !</b>";
            echo "<br/>";
            echo "<br/>";
            echo "Welcome to Admin Page";
            echo "<br/>";
            echo "<br/>";
            echo "Your Username is " . $username;
            echo "<br/>";
            echo "Your Email is " . $email;
            echo "<br/>";
            echo "Your Name is " .$fname;
            ?>
            <b id="logout"><a href="logout">Logout</a></b>
        </div>
        <br/>
    </body>
</html>