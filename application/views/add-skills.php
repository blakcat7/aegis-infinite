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
        <?php $this->load->view('navbar-e'); ?>
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
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>Basic Info</a ></li>
                        <li class="active"><a href="#"><i class="fa fa-fire fa-fw"></i>Skills</a ></li>  
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
                                    <h3 class="panel-title"><i class="fa fa-pencil"></i>Basic Info</h3>

                                </div>
                                <div class="panel-body">
                                    <a href="<?php echo site_url('employee/add_skills'); ?>" role="button" class="btn btn-add-e">Add Skills
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </a>

                                    <a href="<?php echo site_url('employee/edit_skills'); ?>" role="button" class="btn btn-add-e">Update Skills
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    
                                    <form action="<?php echo base_url('employee/add_skills'); ?>" method="post" class="form-horizontal">
                                        <input type="hidden" name="txt_hidden" value="<?php echo $blog->userID; ?>">

                                        <div class="form-group col-md-12">
                                            <?php echo $this->session->flashdata('msg'); ?>
                                        </div>
                                        <div class="form-group col-md-10">                                    
                                            <label>Skills</label>
                                            <select name="skill" class="form-control" style="width: 100%;">
                                                <?php for ($i = 0; $i < count($skills); $i++) { ?>
                                                    <option value="<?php echo $skills[$i]->skillsID ?>"><?php echo $skills[$i]->skillName ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">                                    
                                            <label>Percentage</label>
                                            <select name='percentage' class='form-control'>   
                                                <option value="100">100%</option>
                                                <option value="90">90%</option>
                                                <option value="80">80%</option>
                                                <option value="70">70%</option>
                                                <option value="60">60%</option>
                                                <option value="50">50%</option>
                                            </select>
                                        </div>                                    
                                        <?php
                                        foreach ($get_skills as $skill) {
                                            echo $skill->skillName . '<br/>';
                                        }
                                        ?>
                                        <div class="form-group col-md-10">
                                            <input type="submit" name="btnUpdate" class="join" value="Add">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!--/.col-md-6 -->
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF CONTENT -->
        <!-- FOOTER -->
<?php $this->load->view('footer'); ?>
        <!-- FOOTER -->


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
