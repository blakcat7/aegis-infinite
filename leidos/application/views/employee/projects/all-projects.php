<?php $this->load->view('employee/assets/header'); ?>
<?php $this->load->view('employee/assets/navbar'); ?>
<div class="profile container">
    <div class="row">
        <?php $this->load->view('employee/assets/sidebar.php'); ?>
        <div class="profile-content col-md-9">
            <div class="col-md-12">
                <div class="panel panel-default"> 
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-folder-open"></i>Projects</h3>
                    </div>
                    <div class="panel-body">          
                        <ul class="nav nav-pills"> 
                            <li role="presentation" class="active"><a href="<?php echo base_url(); ?>employee/all_projects">All Projects</a></li> 
                            <li role="presentation"><a href="<?php echo base_url(); ?>employee/my_projects">My Projects</a></li>
                        </ul>
                        <ol class="breadcrumb" style="margin-top: 10px;">
                            <li><a href="<?php echo base_url(); ?>employee/all_projects">Projects</a></li>
                            <li class="active">All Projects</li>
                        </ol>
                        <?php foreach ($projects as $data) { ?>
                            <hr>
                            <div class ="proj">                                        
                                <h4 style="font-weight: 700;"><?php echo $data['projectType']; ?></h4>
                                <h4 style="font-weight: 700;">
                                    <?php echo $data['title']; ?>
                                    <label class='location'><span class="glyphicon glyphicon-map-marker"></span><?php echo $data['projLocation']; ?></label>
                                </h4>
                                <label class="date">                                        
                                    <?php echo date("F j, Y", strtotime($data['startDate'])); ?>
                                </label>   

                                <label class="date-title">-</label>
                                <label class="date">
                                    <?php echo date("F j, Y", strtotime($data['endDate'])); ?> 
                                </label>
                                <hr>
                                <label>About the project : </label>
                                <p class="desc"><?php echo $data['description']; ?> </p>
                                <hr>                                        
                                <a href="" class="join clicked"><span class="glyphicon glyphicon-heart" style="margin-left: 0px;"></span>Interested </a>
                                <a href="<?php echo base_url() . 'employee/view_projects/' . $data['projectID']; ?>" class="join clicked"><span class="glyphicon glyphicon-eye-open" style="margin-left: 0px;"></span>View </a>
                            </div>
                        <?php } ?>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('employee/assets/footer'); ?>