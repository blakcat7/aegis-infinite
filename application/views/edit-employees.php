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

        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/navbar.css">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/admin.css">
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
                    <a class="navbar-brand" href="#"><img src="<?php echo base_url() ?>images/logo-w.png" class="brand"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="glyphicon glyphicon-search"></span></a>
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
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
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
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked">
                        <h5><i class="fa fa-home fa-fw"></i> Management</h5>   
                        <hr>
                        <li><a href="#"><span class="glyphicon glyphicon-dashboard fa-fw"></span>Dashboard</a></li>
                        <li><a href="<?php echo site_url('controller/add_employee'); ?>"><i class="fa fa-users fa-fw"></i>Employees</a></li>
                        <li><a href="<?php echo site_url('controller/add_project') ?>"><i class="fa fa-folder-open fa-fw"></i>Projects</a></li>
                        <h5><i class="fa fa-calendar fa-fw"></i> Calendar</h5>   
                        <hr>                        
                        <li><a href="#"><i class="fa fa-calendar fa-fw"></i>Attendance</a></li>
                        <li><a href="#"><i class="fa fa-rocket fa-fw"></i>Leave Applications</a></li>
                        <li><a href="#"><i class="fa fa-sun-o fa-fw"></i>Holidays</a></li>
                        <h5><i class="fa fa-wrench fa-fw"></i> Options</h5>   
                        <hr>
                        <li><a href="#"><i class="fa fa-cogs fa-fw"></i>Settings</a></li>
                        <hr>
                    </ul>
                </div>
                <div class="content col-md-9">
                    <h3>Employees</h3>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#">Employees</a></li>
                        <li class="active">Edit Employee</li>
                    </ol>                        
                    <a href="<?php echo site_url('controller/view_employees'); ?>" role="button" class="btn btn-add-e">View Employees
                        <span class="glyphicon glyphicon-user"></span>
                    </a>

                    <a href="<?php echo site_url('controller/add_employee'); ?>" role="button" class="btn btn-add-e">Add New Employee
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>

                    <a href="<?php echo site_url('controller/edit_employee'); ?>" role="button" class="btn btn-add-e"> Edit Employee
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>

                    <hr>

                    <?php echo $this->session->flashdata('msg'); ?>

                    <div id="row-table" class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Edit Employee
                            </div>
                            <div class="panel-body">
                                <?php foreach ($editUsers as $update){ ?>

                                    <form method="post" action="<?php echo base_url() . "controller/update_user_data" ?>">
                                        <div class="form-group col-lg-6">                                    
                                            <label>First Name</label>
                                            <input type="text" name="fname" value="<?php echo $update->fname; ?>">
                                        </div>
                                        <div class="form-group col-lg-6">                                    
                                            <label>Last Name</label>
                                            <input type="text" name="lname" value="<?php echo $update->lname; ?>">
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label>Email</label>
                                            <input type="text" name="email" value="<?php echo $update->email; ?>">
                                            <?php echo form_error('email'); ?>
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label>Username</label>
                                            <input type="text" name="username" value="<?php echo $update->username; ?>">
                                            <?php echo form_error('username'); ?>
                                        </div>

                                        <div class="form-group col-md-6" style="margin-bottom: 0px;">
                                            <label>Password</label>
                                            <input type="text" name="password" value="<?php echo $update->password; ?>">

                                        </div>
                                        <div class="form-group col-md-6" style="margin-bottom: 0px;">
                                            <label>Repeat Password</label>
                                            <input type="password" name="passconf" class="form-control" placeholder="Repeat Password" id="" value="">                                        
                                        </div> 
                                        <div class="col-md-12" style="margin-bottom: 20px;"> 
                                            <?php echo form_error('password'); ?>
                                        </div>
                                        <!--        
                                        <div class="form-group col-lg-12">
                                            <label>Designation</label>
                                            <?php
                                            $role = array(
                                                'Employee' => 'Employee',
                                                'Project Manager' => 'Project Manager',
                                                'Admin' => 'Admin',
                                            );

                                            echo form_dropdown('role', $role, 'employee', 'class = "form-control"');
                                            ?>
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label>Department</label>
                                            <?php
                                            $sector = array(
                                                'Civil' => 'Civil',
                                                'Defense' => 'Defense',
                                                'Intelligence & Homeland Security' => 'Intelligence & Homeland Security',
                                                'Health' => 'Health',
                                                'Advance Solutions' => 'Advance Solutions',
                                            );

                                            echo form_dropdown('sector', $sector, 'civil', 'class = "form-control"');
                                            ?>
                                            <?php echo form_error('role'); ?>
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label>Location</label>
                                            <?php
                                            $location = array(
                                                'United Arab Emirates' => 'United Arab Emirates',
                                                'United Kingdom' => 'United Kingdom',
                                                'South Korea' => 'South Korea',
                                                'Spain' => 'Spain',
                                                'Canada' => 'Canada',
                                                'United States' => 'United States',
                                            );

                                            echo form_dropdown('location', $location, 'United Arab Emirates', 'class = "form-control"');
                                            ?>
                                        </div> -->

                                </div>
                                <div class="panel-footer">
                                    <?php echo form_submit(array('id' => 'success-btn', 'value' => 'Update', 'class' => 'btn')); ?>
                                </div>
                                </form>
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF CONTENT -->

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
