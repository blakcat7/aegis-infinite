<nav class="navbar" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                    class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>images/logo-w.png" class="brand"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span>Dashboard</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-calendar"></span>Calendar</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                            class="glyphicon glyphicon-search"></span>Search <b class="caret"></b></a>
                    <ul class="dropdown-menu" style="min-width: 300px;">
                        <li>
                            <div class="col-md-12">
                                <form class="navbar-form navbar-left" role="search" action="employee/search">
                                    <div class="input-group">
                                        <input type="text" name='keyword' class="form-control" placeholder="Search" />
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
                        <?php foreach ($notif as $notifs) { ?>
                            <li><a href="#"><span class="label label-warning"><?php echo $notifs->datetime ?></span><?php echo $notifs->title; ?></a>
                            </li>
                            <div class="pull-right">
                                <span class="label label-success"><a href = "<?php echo base_url('employee/insert_row/' . $notifs->projectID . '/' . $notifs->userID); ?>">Accept</a></span>                                
                                <span class="label label-danger"><a href = "<?php echo base_url('employee/delete_row/' . $notifs->projectID . '/' . $notifs->userID); ?>">Decline</a></span>
                            </div>
                            <div class="divider"></div>
                        <?php } ?>
                </li>
                <li><a href="#" class="text-center">View All</a></li>
            </ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                        class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>employee/profile"><span class="glyphicon glyphicon-user"></span><?php echo $fname . ' ' . $lname; ?></a></li>
                    <li class="divider"></li>
                    <li><a href="#"><span class="glyphicon glyphicon-pencil"></span>Edit Profile</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>employee/logout"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
                </ul>
            </li>
            </ul>
        </div>
    </div>
    <!-- /.navbar-collapse -->
</nav>