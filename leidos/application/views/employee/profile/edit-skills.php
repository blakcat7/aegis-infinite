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
        <link href="<?php echo base_url(); ?>css/chosen.css" rel="stylesheet">   
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
                <div class="col-md-3">
                    <div class="row">
                    </div>
                    <ul class="nav nav-pills nav-stacked">                        
                        <li style=""><a href="<?php echo base_url(); ?>employee/profile"><h5><i class="fa fa-arrow-left fa-fw"></i>Go Back To Profile</h5></a></li>
                        <h5><i class="fa fa-cogs fa-fw"></i> Settings</h5>   
                        <hr>
                        <li><a href="<?php echo base_url('employee/edit_info'); ?>"><i class="fa fa-user fa-fw"></i>Basic Info</a ></li>
                        <li class="active"><a href="<?php echo base_url('employee/edit_skills'); ?>"><i class="fa fa-fire fa-fw"></i>Skills</a ></li>  
                        <li><a href="#"><i class="fa fa-calendar fa-fw"></i>Attendance</a></li>
                        <li><hr></li>
                    </ul>
                </div>
                <div class="profile-content col-md-9">
                    <!-- Projects -->
                    <div class="col-md-12">
                        <div id="row-table" class="row">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-fire"></i>Skills</h3>

                                </div>
                                <div class="panel-body">
                                    <div class="form-group col-md-12">
                                        <a href="<?php echo site_url('employee/insert_skills'); ?>" role="button" class="btn btn-add-e">Add Skills
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </a>

                                        <a href="<?php echo site_url('employee/edit_skills'); ?>" role="button" class="btn btn-add-e">Update Skills
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <hr>
                                        <?php echo $this->session->flashdata('msg'); ?>
                                    </div>
                                    <input type="hidden" name="txt_hidden" value="<?php echo $blog->userID; ?>">
                                    <?php foreach ($get_skills as $skill) { ?>    
                                        <form action="<?php echo base_url('employee/update_skills'); ?>" method="post" class="form-horizontal">                                                                              
                                            <input type="hidden" class="form-control" name="userID" value="<?php echo $skill->userID ?>"><br/>
                                            <input type="hidden" class="form-control" name="skillsID" value="<?php echo $skill->skillsID ?>"><br/>
                                            <div class="form-group col-xs-8">
                                                <input type="text" disabled class="form-control" name="skills" value="<?php echo $skill->skillName ?>"><br/>
                                            </div>
                                            <div class="form-group col-xs-2">
                                                <select name='percentage' class='form-control'>
                                                    <option value="<?php echo $skill->percentage ?>"><?php echo $skill->percentage ?>%</option>
                                                    <option disabled></option>
                                                    <option value="100">100%</option>
                                                    <option value="90">90%</option>
                                                    <option value="80">80%</option>
                                                    <option value="70">70%</option>
                                                    <option value="60">60%</option>
                                                    <option value="50">50%</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-xs-1">
                                                <button type="submit" name="btnUpdate" class="btn btn-add-e">
                                                    <i class = "fa fa-refresh"></i>
                                                </button>
                                            </div>
                                        </form>
                                        <div class="form-group col-xs-1">                                            
                                            <a href="<?php echo base_url('employee/delete_skills/' . $skill->skillsID); ?>" class="btn btn-add-d">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    <?php } ?>  
                                </div>
                            </div>
                        </div><!--/.col-md-6 -->
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF CONTENT -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
