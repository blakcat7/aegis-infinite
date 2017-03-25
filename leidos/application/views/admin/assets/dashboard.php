<?php $this->load->view('admin/assets/header'); ?>
<?php $this->load->view('admin/assets/navbar'); ?>
<div class="container">
    <div class="row">
        <?php $this->load->view('admin/assets/sidebar'); ?>
        <div class="content col-md-9">
            <h3>Dashboard</h3>  
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>   
            <hr>
            <div class="row">            
                <div id="quick-start" style="padding-right: 5px;padding-left: 0px;" class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bookmark"></i> Quick Shortcuts:</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-6 col-md-6">                                    
                                    <a href="<?php echo base_url(); ?>admin/view_employees" class="btn btn-default btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/>Users</a>
                                    <a href="#" class="btn btn-default btn-lg" role="button"><span class="glyphicon glyphicon-calendar"></span> <br/>Calendar</a>
                                </div>
                                <div class="col-xs-6 col-md-6">                                    
                                    <a href="<?php echo base_url(); ?>admin/view_projects" class="btn btn-default btn-lg" role="button"><span class="glyphicon glyphicon-folder-open"></span> <br/>Projects</a>
                                    <a href="http://leidos.com" class="btn btn-default btn-lg" role="button"><span class="glyphicon glyphicon-globe"></span> <br/>Website</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="<?php echo base_url(); ?>admin/view_projects"><h3 class="panel-title"><i class="fa fa-folder"></i> Projects</h3>
                        </div>
                        <div class="panel-body"> 
                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <a href="<?php echo base_url() . 'admin/dashboard_projects/Ongoing' ?>" class="btn panel-yellow btn-lg text-right" role="button">                                   
                                        <h3 style="margin-top:0px;" class="text-left">
                                            <span class="text-right"><?php echo $count1 ?></span>
                                        </h3>
                                        <small class="text-right">
                                            <span class="text-left">Ongoing</span>
                                        </small>
                                        </h3>
                                    </a>
                                </div>
                                <div class="col-xs-6 col-md-6">
                                    <a href="<?php echo base_url() . 'admin/dashboard_projects/Completed' ?>" class="btn panel-green btn-lg text-right" role="button">                                   
                                        <h3 style="margin-top:0px;" class="text-left">
                                            <span class="text-right"><?php echo $count2 ?></span>
                                        </h3>
                                        <small class="text-right">
                                            <span class="text-left">Completed</span>
                                        </small>
                                        </h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="<?php echo base_url(); ?>admin/view_employees"><h3 class="panel-title"><i class="fa fa-users"></i> Employees</h3></a>
                        </div>
                        <div class="panel-body">                            
                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <a href="<?php echo base_url() . 'admin/view_employees/Available' ?>" class="btn panel-green btn-lg text-right" role="button">                                   
                                        <h3 style="margin-top:0px;" class="text-left">
                                            <span class="text-right"><?php echo $count3 ?></span>
                                        </h3>
                                        <small class="text-right">
                                            <span class="text-left">Available</span>
                                        </small>
                                        </h3>
                                    </a>
                                </div>
                                <div class="col-xs-6 col-md-6">
                                    <a href="<?php echo base_url() . 'admin/view_employees/Busy' ?>" class="btn panel-yellow btn-lg text-right" role="button">                                   
                                        <h3 style="margin-top:0px;" class="text-left">
                                            <span class="text-right"><?php echo $count5 ?></span>
                                        </h3>
                                        <small class="text-right">
                                            <span class="text-left">Busy</span>
                                        </small>
                                        </h3>
                                    </a>
                                </div>
                                <div class="col-xs-6 col-md-6">
                                    <a href="<?php echo base_url() . 'admin/view_employees/Unavailable' ?>" class="btn panel-red btn-lg text-right" role="button">                                   
                                        <h3 style="margin-top:0px;" class="text-left">
                                            <span class="text-right"><?php echo $count4 ?></span>
                                        </h3>
                                        <small class="text-right">
                                            <span class="text-left">Unavailable</span>
                                        </small>
                                        </h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding-right: 0px; padding-left: 5px;" class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bell"></i> Notifications </h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                    <span class="pull-right text-muted small"><em>11:13 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                    <span class="pull-right text-muted small"><em>10:57 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                    <span class="pull-right text-muted small"><em>9:49 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-money fa-fw"></i> Payment Received
                                    <span class="pull-right text-muted small"><em>Yesterday</em>
                                    </span>
                                </a>
                            </div>
                            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
<?php $this->load->view('admin/assets/footer'); ?>