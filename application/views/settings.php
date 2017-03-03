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
        <?php $this->load->view('navbar-e'); ?>
        <!-- END OF NAVBAR -->

        <!-- CONTENT -->
        <div class="profile container">
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                    </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="<?php echo base_url(); ?>employee/profile"><i class="fa fa-user fa-fw"></i>Profile</a ></li>
                        <li><a href="<?php echo base_url(); ?>employee/projects"><i class="fa fa-folder-open fa-fw"></i>Projects</a ></li>  
                        <li><a href="#"><i class="fa fa-calendar fa-fw"></i>Attendance</a></li>
                        <li><hr></li>
                        <li class="active"><a href="#"><i class="fa fa-cogs fa-fw"></i>Settings</a></li>
                        <li><hr></li>
                    </ul>
                </div>
                <div class="profile-content col-md-9">
                    <!-- Projects -->
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-pencil"></i>Edit Profile</h3>
                            </div>
                            <div class="panel-body">
                                <?php foreach ($users as $user): ?>
                                    <p>Edit Detail & Click Update Button</p>
                                    <form method="post" action="<?php echo base_url() . "index.php/update_ctrl/update_student_id1" ?>">
                                        <label id="hide">Id :</label>
                                        <input type="text" id="hide" name="did" value="<?php echo $student->student_id; ?>">
                                        <label>Name :</label>
                                        <input type="text" name="dname" value="<?php echo $student->student_name; ?>">
                                        <label>Email :</label>
                                        <input type="text" name="demail" value="<?php echo $student->student_email; ?>">
                                        <label>Mobile :</label>
                                        <input type="text" name="dmobile" value="<?php echo $student->student_mobile; ?>">
                                        <label>Address :</label>
                                        <input type="text" name="daddress" value="<?php echo $student->student_address; ?>">
                                        <input type="submit" id="submit" name="dsubmit" value="Update">
                                    </form>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div><!--/.col-md-6 -->
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
