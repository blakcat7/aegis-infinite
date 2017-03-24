<?php $this->load->view('manager/assets/header'); ?>
<?php $this->load->view('manager/assets/navbar'); ?>
<div class="profile container">
    <div class="row">
        <?php $this->load->view('manager/assets/sidebar'); ?>
        <div class="profile-content col-md-9">
            <!-- Personal Details -->
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-user"></i>Personal Details
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-5"><i class="fa fa-envelope-o"></i>Email</div>                                    
                        <div class="col-sm-7"><?php echo $email; ?></div>
                        <div class="col-sm-12"><hr></div>
                        <div class="col-sm-5"><i class="fa fa-user"></i>Designation</div>                                    
                        <div class="col-sm-7"><?php echo $designation; ?></div>                                
                        <div class="col-sm-12"><hr></div>
                        <div class="col-sm-5"><i class="fa fa-map-marker"></i>Location <span style="font-size: 9pt;">(Primary)</span></div>                                    
                        <div class="col-sm-7"><?php echo $location; ?></div>
                    </div>
                </div>
            </div>
            <!-- Work Details -->
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-suitcase"></i>Work Details
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-5"><i class="fa fa-building-o"></i>Department</div>                                    
                        <div class="col-sm-7"><?php echo $sector; ?></div>       
                        <div class="col-sm-12"><hr></div>
                        <div class="col-sm-5"><i class  ="fa fa-tasks"></i>Role</div>                                    
                        <div class="col-sm-7"><?php echo $role; ?></div>                         
                        <div class="col-sm-12"><hr></div>
                        <div class="col-sm-5"><i class  ="fa fa-map-marker"></i>Location <span style="font-size: 9pt;">(Preferred)</span></div>                                    
                        <div class="col-sm-7"><?php echo $plocation; ?></div>
                    </div>
                </div>
            </div> 
            <!-- Skills -->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-fire"></i>Skills</h3>
                    </div>
                    <div class="panel-body">

                        Go to <span class="label label-add"><i class="fa fa-cogs"></i>Settings</span> to add or change skills.

                        <?php foreach ($results as $data) { ?>  
                            <div class="progress">   
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $data['percentage']; ?>%;">
                                    <span class="sr-only"><?php echo $data['percentage']; ?>% Complete</span>
                                </div>
                                <span class="progress-type"><?php echo $data['skillName']; ?></span>
                                <span class="progress-completed"><?php echo $data['percentage']; ?>%</span>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Projects -->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-folder"></i>Projects</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        foreach ($proj as $data) {
                            ?>                                             
                            <h4> <a href="<?php echo base_url() . 'manager/edit_projects/' . $data['projectID']; ?>"><?php echo $data['title']; ?> </a>
                                <div class="pull-right">
                                    <label class="location"><span class="glyphicon glyphicon-map-marker"></span><?php echo $data['projLocation'] ?></label>
                                    <label class="date"><?php echo $data['projectType'] ?></label>
                                </div>
                            </h4>
                            <p class="desc"><?php echo $data['description']; ?> </p>
                            <hr>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('manager/assets/footer'); ?>