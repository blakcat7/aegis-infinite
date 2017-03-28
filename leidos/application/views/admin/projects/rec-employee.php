<?php $this->load->view('admin/assets/header'); ?>
<?php $this->load->view('admin/assets/navbar'); ?>
<div class="container">
    <div class="row">
        <?php $this->load->view('admin/assets/sidebar'); ?>
        <div class="content col-md-9">
            <h3>Projects</h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Projects</a></li>
                <li class="active">Recommend Employees</li>
            </ol>                        
            <?php $this->load->view('admin/assets/menu_p'); ?>
            <hr>                    
            <?php echo $this->session->flashdata('msg'); ?>
            <div id="row-table" class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Recommend an Employee
                    </div>
                    <form action="recommend_users" method="post">
                        <div class="panel-body">
                            <div class="form-group col-lg-12">
                                <label>Recommended Employees:</label>                                   
                                <input type="checkbox" class="hidden" checked name="recommended[]" autocomplete="off" value="NULL">
                                <input type="search" class="form-control" id="search" placeholder="Search for Employee">
                                <br />
                                <div class="searchable-container">
                                    <?php foreach ($users as $user) { ?>
                                        <div class="items col-xs-6 col-sm-3 col-md-3">
                                            <div data-toggle="buttons" class="btn-group bizmoduleselect">
                                                <label class="btn btn-default">
                                                    <div class="bizcontent">
                                                        <input type="checkbox" name="recommended[]" autocomplete="off" value="<?php echo $user->userID ?>">
                                                        <span class="glyphicon glyphicon-ok glyphicon-lg"></span>
                                                        <div class="recommended">
                                                            <div class="crop img-responsive <?php echo $user->availability ?>">
                                                                <img src="<?php echo base_url(); ?>images/profilepics/<?php echo $user->picture ?>">
                                                            </div>
                                                        </div>
                                                        <label class="user">
                                                            <a href="<?php echo base_url() . 'employee/view_users/' . $user->username; ?>"><?php echo $user->username; ?></a>
                                                        </label>
                                                        <span class="user"><?php echo $user->fname . ' ' . $user->lname; ?></span>
                                                        <span class="user"><?php echo $user->role; ?></span>
                                                        <hr class="style">                                                        
                                                        <span style="font-size: 8pt; font-weight: 700; color: #2980b9">Work Location</span>
                                                        <span class="user"><?php echo $user->location; ?></span>
                                                        <span style="font-size: 8pt; font-weight: 700; color: #e74c3c">Preferred Location</span>
                                                        <span class="user"><?php echo $user->plocation; ?></span>
                                                        <span style="font-size: 8pt; font-weight: 700; color: #e74c3c">Skills</span>
                                                        <span class="user"><?php echo $user->skillName; ?></span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <?php echo form_submit(array('id' => 'success-btn', 'value' => 'Submit', 'class' => 'btn')); ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('admin/assets/footer');
