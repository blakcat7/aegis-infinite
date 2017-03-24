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
        <?php $this->load->view('employee/assets/navbar'); ?>
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

                                <?php foreach ($viewProjects as $view) { ?>
                                    <h3 class="panel-title" style="font-weight: 700;"><?php echo $view['title']; ?></h3>
                                <?php } ?>
                            </div>
                            <div class="panel-body">      
                                <?php foreach ($viewProjects as $view) { ?>
                                    <div class="form-group col-md-12"> 
                                        <label>Title:</label>
                                        <div type="text" value="" name="title" class="form-div">
                                            <?php echo $view['title']; ?>
                                        </div>
                                    </div>                             
                                    <div class="form-group col-md-12">                                        
                                        <label>Description:</label>   
                                        <div name="description" class="form-div"><?php echo $view['description']; ?></div>                                     
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Project Location:</label>
                                        <div type="text" value="" name="projLocation" class="form-div">
                                            <?php echo $view['projLocation']; ?>
                                        </div>
                                    </div>                             
                                    <div class="form-group col-md-6">
                                        <label>Project Type:</label>                                            
                                        <div type="text" value="" name="projLocation" class="form-div">
                                            <?php echo $view['projectType']; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Start Date:</label>
                                        <?php
                                        $sDate = $view['startDate'];
                                        $startDate = date("F j, Y", strtotime($sDate));
                                        ?>
                                        <div type="date" name="startDate" value="" class="form-div">
                                            <?php echo $sDate; ?>
                                        </div>
                                        <label class="date pull-right"><?php echo $startDate; ?></label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>End Date:</label>
                                        <?php
                                        $eDate = $view['endDate'];
                                        $endDate = date("F j, Y", strtotime($eDate));
                                        ?> 
                                        <div name="endDate" type="date" value="" class="form-div">
                                            <?php echo $eDate; ?>
                                        </div>
                                        <label class="date pull-right"><?php echo $endDate; ?></label>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Budget: (USD)</label>                                        
                                        <div type="number" value="" name="budget" class="form-div">  
                                            <?php echo $view['budget']; ?>
                                        </div>
                                    </div>
                                <?php } ?>           

                                <div class="form-group col-md-12">
                                    <label>Skills Required:</label>
                                    <?php foreach ($viewSkills as $view): ?>
                                        <div type="number" value="" name="budget" class="form-div">  
                                            <?php echo $view['skillName']; ?>
                                        </div>
                                        <br>
                                    <?php endforeach; ?>
                                </div>

                                <div class="form-group col-md-12">                                    
                                    <label>Project Manager:</label><br>
                                    <?php foreach ($viewManager as $view): ?>
                                        <div class="team" style="padding: 15px;">
                                            <label class="user">
                                                <a href="<?php echo base_url() . 'employee/view_users/' . $view['username']; ?>"><?php echo $view['username']; ?></a>
                                            </label>
                                            <span class="user"><?php echo $view['fname'] . ' ' . $view['lname']; ?></span>
                                            <span class="user"><?php echo $view['designation']; ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="form-group col-md-12"> 
                                    <label>Team Members:</label> <br>                                   
                                    <?php foreach ($viewEmployees as $view): ?>                                       
                                        <div class="team" style="padding: 15px;">
                                            <label class="user">
                                                <a href="<?php echo base_url() . 'employee/view_users/' . $view['username']; ?>"><?php echo $view['username']; ?></a>
                                            </label>
                                            <span class="user"><?php echo $view['fname'] . ' ' . $view['lname']; ?></span>
                                            <span class="user"><?php echo $view['designation']; ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>   
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