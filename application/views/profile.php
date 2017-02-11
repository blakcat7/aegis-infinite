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
        <link href="<?php echo base_url(); ?>css/profile.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/footer.css" rel="stylesheet">
    </head>
    <body>
        <!-- NAVBAR -->
        <?php $this->load->view('navbar-e');?>
        <!-- END OF NAVBAR -->

        <!-- CONTENT -->
        <div class="profile container">
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <div class="profile">
                            <div class="profile-header-container">   
                                
                                <div class="profile-pic">
                                    <img class="crop" src="<?php echo base_url(); ?>images/profile1.jpg" />
                                </div>
                            </div> 
                            <div class="name">
                                <h2><?php echo $fname . ' ' . $lname; ?><br/><small><?php echo $role; ?></small></h2>
                                <small><?php echo $location; ?> <i class="fa fa-map-marker"></i></small>   
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="<?php echo base_url(); ?>controller/profile"><i class="fa fa-user fa-fw"></i>Profile</a ></li>
                        <li><a href="<?php echo base_url(); ?>controller/projects"><i class="fa fa-folder-open fa-fw"></i>Projects</a ></li>  
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
                            <div class="panel-heading"><i class="fa fa-user"></i>Personal Details
                                <div class="pull-right">
                                    <i class="fa fa-pencil"></i>
                                </div>
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
                                <div class="col-sm-5"><i class  ="fa fa-tasks"></i>Designation</div>                                    
                                <div class="col-sm-7"><?php echo $role; ?></div>
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
                                    <span class="progress-type">HTML/CSS</span>
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
        <!-- FOOTER -->
        <?php $this->load->view('footer');?>
        <!-- FOOTER -->


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>