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
        <style>
            #view-more{
                display: none;
            }
        </style>
    </head>
    <body>

        <!-- NAVBAR -->
        <?php $this->load->view('navbar-e'); ?>
        <!-- END OF NAVBAR -->

        <!-- CONTENT -->
        <div class="profile container">
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <div class="profile">
                            <div class="profile-header-container">                                   
                                <div class="profile-pic">
                                    <?php foreach ($pics as $pic) { ?>
                                        <img src="<?php echo base_url() . 'images/profilepics/' . $pic->picture ?>" class="crop <?php echo $availability; ?>">
                                    <?php } ?>
                                </div>
                            </div> 
                            <div class="name">
                                <h2><?php echo $fname . ' ' . $lname; ?><br/><small><?php echo $designation; ?></small></h2>
                                <small><?php echo $location; ?> <i class="fa fa-map-marker"></i></small>   
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="<?php echo base_url(); ?>employee/profile"><i class="fa fa-user fa-fw"></i>Profile</a ></li>
                        <li class="active"><a href="<?php echo base_url(); ?>employee/projects"><i class="fa fa-folder-open fa-fw"></i>Projects</a ></li>   
                        <li><a href="#"><i class="fa fa-calendar fa-fw"></i>Attendance</a></li>
                        <li><hr></li>
                        <li><a href="<?php echo base_url('employee/edit_info/' . $userID); ?>"><i class="fa fa-cogs fa-fw"></i>Settings</a></li>
                        <li><hr></li>
                    </ul>
                </div>
                <div class="profile-content col-md-9">
                    <!-- Skills -->
                    <div class="col-md-12">
                        <div class="panel panel-default"> 
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-folder-open"></i>Projects</h3>
                            </div>
                            <div class="panel-body">          
                                <ul class="nav nav-pills"> 
                                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>employee/projects">All Projects</a></li> 
                                    <li role="presentation"><a href="<?php echo base_url(); ?>employee/my_projects">My Projects</a></li>
                                </ul>
                                <ol class="breadcrumb" style="margin-top: 10px;">
                                    <li><a href="<?php echo base_url(); ?>employee/projects">Projects</a></li>
                                    <li class="active">All Projects</li>
                                </ol>

                                <?php foreach ($projects as $data) { ?>
                                    <hr>
                                        <div class ="proj">                                        
                                            <h4 style="font-weight: 700;"><?php echo $data['projectType']; ?></h4>
                                            <h4 style="font-weight: 700;">
                                                <?php echo $data['title']; ?>
                                                <label class='location'><span class="glyphicon glyphicon-map-marker"></span><?php echo $data['projLocation']; ?></label>
                                            </h4>
                                            <label class="date">                                        
                                                <?php echo date("F j, Y", strtotime($data['startDate'])); ?>
                                            </label>   

                                            <label class="date-title">-</label>
                                            <label class="date">
                                                <?php echo date("F j, Y", strtotime($data['endDate'])); ?> 
                                            </label>
                                            <hr>
                                            <label>About the project : </label>
                                            <p class="desc"><?php echo $data['description']; ?> </p>
                                            <hr>                                        
                                            <a href="" class="join clicked"><span class="glyphicon glyphicon-heart" style="margin-left: 0px;"></span>Interested </a>
                                            <a href="<?php echo base_url() . 'employee/view_projects/' . $data['projectID']; ?>" class="join clicked"><span class="glyphicon glyphicon-eye-open" style="margin-left: 0px;"></span>View </a>
                                        </div>
                                <?php } ?>
                            </div>  
                        </div>
                    </div><!--/.col-md-6 -->
                </div>
            </div>
        </div>
        <!-- END OF CONTENT -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>