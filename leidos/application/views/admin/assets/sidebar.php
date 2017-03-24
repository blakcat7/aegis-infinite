<div class="col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <h5><i class="fa fa-home fa-fw"></i> Management</h5>   
        <hr>
        <li><a href="<?php echo site_url('admin/dashboard'); ?>"><span class="glyphicon glyphicon-dashboard fa-fw"></span>Dashboard</a></li>
        <li><a href="<?php echo site_url('admin/view_employees'); ?>"><i class="fa fa-users fa-fw"></i>Employees</a></li>
        <li><a href="<?php echo site_url('admin/view_projects') ?>"><i class="fa fa-folder-open fa-fw"></i>Projects</a></li>
        <h5><i class="fa fa-calendar fa-fw"></i> Calendar</h5>   
        <hr>                        
        <li><a href="#"><i class="fa fa-calendar fa-fw"></i>Attendance</a></li>
        <li><a href="#"><i class="fa fa-rocket fa-fw"></i>Leave Applications</a></li>
        <li><a href="#"><i class="fa fa-sun-o fa-fw"></i>Holidays</a></li>
        <h5><i class="fa fa-wrench fa-fw"></i> Options</h5>   
        <hr>
        <li><a href="<?php echo site_url('admin/settings') ?>"><i class="fa fa-cogs fa-fw"></i>Settings</a></li>
        <hr>
    </ul>
    <div style="text-align: center">
        <a href="<?php echo base_url('../../aegis-infinite/'); ?>">
            <img style="width: 15px; height: auto; margin: 0 5px 2px 0;" src="<?php echo base_url(); ?>images/logo.png"/>
            <span style="font-size: 10pt;">Aegis Infinite &copy; 2016</span>
        </a>
    </div>
</div>