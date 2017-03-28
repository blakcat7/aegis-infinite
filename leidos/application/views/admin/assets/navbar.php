<nav class="navbar" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                    class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>images/leidos-logo.png" class="brand"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-search"></span></a>
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
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                            class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
                    <ul class="dropdown-menu account">
                        <li><a href="<?php echo base_url() . 'admin/view_profile/' . $username; ?>"><span class="glyphicon glyphicon-user"></span><?php echo $fname . ' ' . $lname; ?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>admin/settings"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>controller/logout"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>