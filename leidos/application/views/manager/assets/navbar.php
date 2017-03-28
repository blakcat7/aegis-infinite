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
                                <form class="navbar-form navbar-left" role="search" action="manager/search">
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
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-inbox"></span>
                        <?php echo $count_request; ?>
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($request as $notifs) { ?>      
                            <h5>Project Join Requests</h5>
                            <li>
                                <a href="<?php echo base_url(); ?>manager/view_profile/<?php echo $notifs->username; ?>" class="no-block">
                                    <span class="label label-primary"><?php echo $notifs->datetime ?></span>
                                    <?php echo $notifs->fname . $notifs->lname; ?></a> requested to join
                                <a href="<?php echo base_url(); ?>manager/edit_projects/<?php echo $notifs->projectID; ?>" class="no-block"><span class="label label-warning"></span><?php echo $notifs->title; ?></a>
                            </li>
                            <div class="pull-right">
                                <span class="label btn-add-e"><a href = "<?php echo base_url(); ?>manager/accept_request/<?php echo $notifs->projectID . '/' . $notifs->userID ?>">Accept</a></span>                                
                                <span class="label btn-add-r"><a href = "<?php echo base_url('manager/delete_request/' . $notifs->projectID . '/' . $notifs->userID); ?>">Decline</a></span>
                            </div>
                            <div class="divider"></div>
                        <?php } ?>
                        <li><a href="<?php echo base_url(); ?>manager/view_notifications" class="text-center" style="display: block;">View All</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-globe"></span>
                        <?php echo $count_notif; ?>
                    </a>                    
                    <ul class="dropdown-menu">                        
                        <h5>Project Join Requests</h5>
                        <?php foreach ($notif as $notifs) { ?>
                            <li>                               
                                <span class="label label-primary"><?php echo $notifs->datetime ?></span>
                                You are invited to join                 
                                <a href="<?php echo base_url(); ?>manager/view_projects/<?php echo $notifs->projectID; ?>" class="no-block">
                                    <span class="label label-warning"></span><?php echo $notifs->title; ?>
                                </a>
                            </li>
                            <div class="pull-right">
                                <span class="label btn-add-e"><a href = "<?php echo base_url(); ?>manager/insert_row/<?php echo $notifs->projectID . '/' . $notifs->pmID ?>">Accept</a></span>                                
                                <span class="label btn-add-d"><a href = "<?php echo base_url('manager/delete_row/' . $notifs->projectID . '/' . $notifs->userID); ?>">Decline</a></span>
                            </div>
                            <div class="divider"></div>
                        <?php } ?>
                        <li><a href="<?php echo base_url(); ?>manager/view_notifications" class="text-center" style="display: block;">View All</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                            class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
                    <ul class="account dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>manager/profile"><span class="glyphicon glyphicon-user"></span><?php echo $fname . ' ' . $lname; ?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>manager/edit_info"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>controller/logout"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>