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
                <h2>
                    <?php echo $fname . ' ' . $lname; ?><br>
                    <small><?php echo $designation; ?></small><br>
                    <small><?php echo $location; ?> <i class="fa fa-map-marker"></i></small>   
                </h2>
            </div>
        </div>
    </div>
    <ul class="nav nav-pills nav-stacked">
        <li><a href="<?php echo base_url(); ?>manager/profile"><i class="fa fa-user fa-fw"></i>Profile</a ></li>
        <li><a href="<?php echo base_url(); ?>manager/all_projects"><i class="fa fa-folder-open fa-fw"></i>Projects</a ></li>   
        <li><a href="#"><i class="fa fa-calendar fa-fw"></i>Attendance</a></li>
        <li><hr></li>
        <li><a href="<?php echo base_url('manager/edit_info/' . $userID); ?>"><i class="fa fa-cogs fa-fw"></i>Settings</a></li>
        <li><hr></li>       
    </ul>
    <div style="text-align: center">
        <a href="<?php echo base_url('../../aegis-infinite/'); ?>">
            <img style="width: 15px; height: auto; margin: 0 5px 2px 0;" src="<?php echo base_url(); ?>images/logo.png"/>
            <span style="font-size: 10pt;">Aegis Infinite &copy; 2016</span>
        </a>
    </div>
</div>