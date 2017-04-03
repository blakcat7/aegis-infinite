<?php $this->load->view('admin/assets/header'); ?>
<?php $this->load->view('admin/assets/navbar'); ?>

<!-- CONTENT -->
<div class="container">
    <div class="row">
        <?php $this->load->view('admin/assets/sidebar'); ?>
        <div class="content col-md-9">
            <h3>Notifications</h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Notifications</li>
            </ol>                        
            <hr>
            <div id="row-table" class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Notifications
                    </div>
                    <div class="panel-body">

                        <?php foreach ($notif as $notifs) { ?>
                            <span class="label label-warning"><?php echo $notifs->datetime ?></span><?php echo $notifs->title; ?>
                            <a href = "<?php echo base_url('employee/insert_row/' . $notifs->projectID . '/' . $notifs->userID); ?>">Accept</a>
                            <li class="divider"></li>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>