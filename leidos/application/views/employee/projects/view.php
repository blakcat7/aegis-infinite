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
        <?php $this->load->view('employee/assets/navbar'); ?>
        <!-- END OF NAVBAR -->

        <!-- CONTENT -->
        <div class="profile container">
            <div class="row">
                <?php foreach ($viewUsers as $view): ?>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="profile">
                                <div class="profile-header-container">                                   
                                    <div class="profile-pic">
                                        <img src="<?php echo base_url() . 'images/profilepics/' . $view['picture']; ?>" class="<?php echo $view['availability']; ?> crop">
                                    </div>
                                </div> 
                                <div class="name">
                                    <h2><?php echo $view['fname'] . ' ' . $view['lname']; ?><br/><small><?php
                                            echo $view['designation'];
                                            ?></small></h2>
                                    <small><?php echo $view['location']; ?> <i class="fa fa-map-marker"></i></small>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-content col-md-9">
                        <!-- Personal Details -->
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-user"></i>Personal Details
                                </div>
                                <div class="panel-body">
                                    <div class="col-sm-5"><i class="fa fa-envelope-o"></i>Email</div>                                    
                                    <div class="col-sm-7"><?php echo $view['email']; ?></div>
                                    <div class="col-sm-12"><hr></div>
                                    <div class="col-sm-5"><i class="fa fa-user"></i>Designation</div>                                    
                                    <div class="col-sm-7"><?php echo $view['designation']; ?></div>                                
                                    <div class="col-sm-12"><hr></div>
                                    <div class="col-sm-5"><i class="fa fa-map-marker"></i>Location <span style="font-size: 9pt;">(Primary)</span></div>                                    
                                    <div class="col-sm-7"><?php echo $view['location']; ?></div>
                                </div>
                            </div>
                        </div><!--/.col-md-6 -->
                        <!-- Work Details -->
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-suitcase"></i>Work Details
                                </div>
                                <div class="panel-body">
                                    <div class="col-sm-5"><i class="fa fa-building-o"></i>Department</div>                                    
                                    <div class="col-sm-7"><?php echo $view['sector']; ?></div>       
                                    <div class="col-sm-12"><hr></div>
                                    <div class="col-sm-5"><i class  ="fa fa-tasks"></i>Role</div>                                    
                                    <div class="col-sm-7"><?php echo $view['role']; ?></div>                         
                                    <div class="col-sm-12"><hr></div>
                                    <div class="col-sm-5"><i class  ="fa fa-map-marker"></i>Location <span style="font-size: 9pt;">(Preferred)</span></div>                                    
                                    <div class="col-sm-7"><?php echo $view['location']; ?></div>
                                </div>
                            </div>
                        </div><!--/.col-md-6 --> 
                    <?php endforeach; ?>
                    <!-- Skills -->
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-fire"></i>Skills</h3>
                            </div>
                            <div class="panel-body">

                                Go to <span class="label label-add"><i class="fa fa-cogs"></i>Settings</span> to add or change skills.

                                <?php foreach ($viewSkills as $view_s): ?>
                                    <div class="progress">   
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $view_s['percentage']; ?>%;">
                                            <span class="sr-only"><?php echo $view_s['percentage']; ?>% Complete</span>
                                        </div>
                                        <span class="progress-type"><?php echo $view_s['skillName']; ?></span>
                                        <span class="progress-completed"><?php echo $view_s['percentage']; ?>%</span>
                                    </div>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div><!--/.col-md-12 -->
                    <!-- Projects -->
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-folder"></i>Projects</h3>
                            </div>
                            <div class="panel-body">     
                                <?php foreach ($viewProjects as $view_p): ?>
                                <h4> <?php echo $view_p['title']; ?> 
                                    <div class="pull-right">
                                        <label class="location"><span class="glyphicon glyphicon-map-marker"></span><?php echo $view_p['projLocation']; ?></label>
                                        <label class="date"><?php echo $view_p['projectType'] ?></label>
                                    </div>
                                </h4>
                                <p class="desc"><?php echo $view_p['description']; ?> </p>
                                <hr>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div><!--/.col-md-12 -->
                    <hr>
                </div>
            </div>
        </div>
        <!-- END OF CONTENT -->
        <!-- FOOTER -->
        <?php $this->load->view('footer'); ?>
        <!-- FOOTER -->


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>document.body.className += ' fade-out';</script>
    </body>
</html>