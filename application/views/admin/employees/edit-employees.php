<?php $this->load->view('admin/assets/header'); ?>
<?php $this->load->view('admin/assets/navbar'); ?>

<!-- CONTENT -->
<div class="container">
    <div class="row">
        <?php $this->load->view('admin/assets/sidebar'); ?>
        <div class="content col-md-9">
            <h3>Employees</h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Employees</a></li>
                <li class="active">Edit Employee</li>
            </ol>                        
            <?php $this->load->view('admin/assets/menu_e'); ?>
            <hr>
            <?php echo $this->session->flashdata('msg'); ?>
            <div id="row-table" class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Employee
                    </div>
                    <div class="panel-body">
                        <?php foreach ($editUsers as $update) { ?>

                            <form method="post" action="<?php echo base_url() . "controller/update_user_data" ?>">
                                <div class="form-group col-lg-6">                                    
                                    <label>First Name</label>
                                    <input type="text" name="fname" value="<?php echo $update->fname; ?>">
                                </div>
                                <div class="form-group col-lg-6">                                    
                                    <label>Last Name</label>
                                    <input type="text" name="lname" value="<?php echo $update->lname; ?>">
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Email</label>
                                    <input type="text" name="email" value="<?php echo $update->email; ?>">
                                    <?php echo form_error('email'); ?>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input type="text" name="username" value="<?php echo $update->username; ?>">
                                    <?php echo form_error('username'); ?>
                                </div>

                                <div class="form-group col-md-6" style="margin-bottom: 0px;">
                                    <label>Password</label>
                                    <input type="text" name="password" value="<?php echo $update->password; ?>">

                                </div>
                                <div class="form-group col-md-6" style="margin-bottom: 0px;">
                                    <label>Repeat Password</label>
                                    <input type="password" name="passconf" class="form-control" placeholder="Repeat Password" id="" value="">                                        
                                </div> 
                                <div class="col-md-12" style="margin-bottom: 20px;"> 
                                    <?php echo form_error('password'); ?>
                                </div>
                                <!--        
                                <div class="form-group col-lg-12">
                                    <label>Designation</label>
                                <?php
                                $role = array(
                                    'Employee' => 'Employee',
                                    'Project Manager' => 'Project Manager',
                                    'Admin' => 'Admin',
                                );

                                echo form_dropdown('role', $role, 'employee', 'class = "form-control"');
                                ?>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Department</label>
                                <?php
                                $sector = array(
                                    'Civil' => 'Civil',
                                    'Defense' => 'Defense',
                                    'Intelligence & Homeland Security' => 'Intelligence & Homeland Security',
                                    'Health' => 'Health',
                                    'Advance Solutions' => 'Advance Solutions',
                                );

                                echo form_dropdown('sector', $sector, 'civil', 'class = "form-control"');
                                ?>
                                <?php echo form_error('role'); ?>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Location</label>
                                <?php
                                $location = array(
                                    'United Arab Emirates' => 'United Arab Emirates',
                                    'United Kingdom' => 'United Kingdom',
                                    'South Korea' => 'South Korea',
                                    'Spain' => 'Spain',
                                    'Canada' => 'Canada',
                                    'United States' => 'United States',
                                );

                                echo form_dropdown('location', $location, 'United Arab Emirates', 'class = "form-control"');
                                ?>
                                </div> -->

                        </div>
                        <div class="panel-footer">
                            <?php echo form_submit(array('id' => 'success-btn', 'value' => 'Update', 'class' => 'btn')); ?>
                        </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/assets/footer'); ?>