<?php $this->load->view('manager/assets/header'); ?>
<?php $this->load->view('manager/assets/navbar'); ?>
<div class="profile container">
    <div class="row">
        <?php $this->load->view('manager/assets/sidebar.php'); ?>
        <div class="profile-content col-md-9">
            <div class="col-md-12">
                <div class="panel panel-default"> 
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-globe"></i>Notifications<span class="pull-right badge"><?php echo $count_notif + $count_request; ?></span></h3>
                    </div>
                    <div class="panel-body">          
                        <?php foreach ($view_request as $notifs) { ?>  
                            <a href="<?php echo base_url(); ?>manager/view_profile/<?php echo $notifs->username; ?>">
                                <span class="label label-primary"><?php echo $notifs->datetime ?></span>
                                <?php echo $notifs->fname . $notifs->lname; ?></a> requested to join
                            <a href="#"><span class="label label-warning"></span><?php echo $notifs->title; ?></a>
                            <div class="pull-right">
                                <button class="btn btn-add-e"><a href = "<?php echo base_url(); ?>manager/insert_row/<?php echo $notifs->projectID . '/' . $notifs->userID ?>">Accept</a></button>                                
                                <button class="btn btn-add-d"><a href = "<?php echo base_url('manager/delete_row/' . $notifs->projectID . '/' . $notifs->userID); ?>">Decline</a></button>
                            </div>
                            <div class="divider"></div>
                            <hr>
                        <?php } ?>
                        <?php foreach ($view_notif as $notifs) { ?>                                
                            <span class="label label-primary"><?php echo $notifs->datetime ?></span>
                            You are invited to join               
                            <a href="<?php echo base_url(); ?>employee/view_projects/<?php echo $notifs->projectID; ?>">
                                <span class="label label-warning"></span><?php echo $notifs->title; ?>
                            </a>
                            <div class="pull-right">
                                <button class="btn btn-add-e"><a href = "<?php echo base_url(); ?>manager/insert_row/<?php echo $notifs->projectID . '/' . $notifs->pmID ?>">Accept</a></button>                                
                                <button class="btn btn-add-d"><a href = "<?php echo base_url('manager/delete_row/' . $notifs->projectID . '/' . $notifs->userID); ?>">Decline</a></button>
                            </div>
                            <div class="divider"></div>
                            <hr>
                        <?php } ?>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('manager/assets/footer.php'); ?>
