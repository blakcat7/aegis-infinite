<?php $this->load->view('admin/assets/header'); ?>
<?php $this->load->view('admin/assets/navbar'); ?>
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
            <div id="row-table" class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Basic Information
                    </div>
                    <form action="<?php echo base_url('admin/update'); ?>" method="post" class="form-horizontal">       
                        <div class="panel-body">
                            <?php foreach ($viewUsers as $view): ?> 
                                <input type="hidden" name="txt_hidden" value="<?php echo $view['userID']; ?>">
                                <div class="form-group col-md-6">         
                                    <label>First Name</label>
                                    <input type="text" value="<?php echo $view['fname']; ?>" name="fname" class="form-control">
                                </div>
                                <div class="form-group col-md-6">                                    
                                    <label>Last Name</label>
                                    <input type="text" value="<?php echo $view['lname']; ?>" name="lname" class="form-control">
                                </div>   
                                <div class="form-group col-md-6">         
                                    <label>Username</label>
                                    <input type="text" value="<?php echo $view['username']; ?>" name="username" class="form-control">
                                </div>
                                <div class="form-group col-md-6">         
                                    <label>Email</label>
                                    <input type="email" value="<?php echo $view['email']; ?>" name="email" class="form-control">
                                </div>
                                <div class="form-group col-md-6">         
                                    <label>Role</label>
                                    <select name='role' class='form-control'>                                                                                                                         
                                        <option selected value="<?php echo $view['role']; ?>"><?php echo $view['role']; ?></option>
                                        <option disabled></option>
                                        <option value="Employee">Employee</option>
                                        <option value="Project Manager">Project Manager</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">         
                                    <label>Designation</label>
                                    <input value="<?php echo $view['designation']; ?>" name="designation" class="form-control">
                                </div>
                                <div class="form-group col-md-6">         
                                    <label>Primary Location</label>
                                    <select name='location' class='form-control'>                                                                                                                         
                                        <option selected value="<?php echo $view['location']; ?>"><?php echo $view['location']; ?></option>
                                        <option disabled></option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Untied States">United States</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">         
                                    <label>Preferred Location</label>
                                    <select name='plocation' class='form-control'>                                                                                                                         
                                        <option selected value="<?php echo $view['plocation']; ?>"><?php echo $view['plocation']; ?></option>
                                        <option disabled></option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Untied States">United States</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">         
                                    <label>Sector</label>
                                    <select name='sector' class='form-control'>                                                                                                                         
                                        <option selected value="<?php echo $view['sector']; ?>"><?php echo $view['sector']; ?></option>
                                        <option disabled></option>
                                        <option value="Civil">Civil</option>
                                        <option value="Defense">Defense</option>
                                        <option value="Security">Intelligence & Homeland Security</option>
                                        <option value="Health">Health</option>
                                        <option value="Advance Solutions">Advance Solutions</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">         
                                    <label>Availability</label>
                                    <select name='availability' class='form-control'>                                                                                                                         
                                        <option selected value="<?php echo $view['availability']; ?>"><?php echo $view['availability']; ?></option>
                                        <option disabled></option>
                                        <option value="Available">Available</option>
                                        <option value="Busy">Busy</option>
                                        <option value="Unavailable">Unavailable</option>
                                    </select>
                                </div>                                 
                                <div class="form-group col-md-6">         
                                    <label>Category</label>
                                    <select name='category' class='form-control'>                                                                                                                         
                                        <option selected value="<?php echo $view['category']; ?>"><?php echo $view['category']; ?></option>
                                        <option disabled></option>
                                        <option value="Developer">Developer</option>
                                        <option value="Designer">Designer</option>
                                        <option value="Quality">Quality Assurance</option>                                        
                                        <option value="Sales">Sales and Marketing</option>                                                                             
                                        <option value="Management">Management</option>
                                    </select>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="panel-footer">
                            <input type="submit" name="btnUpdate" class="btn" value="Update" id="success-btn">
                        </div>
                    </form>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Skills
                    </div>
                    <div class="panel-body">
                        <?php foreach ($viewSkills as $view_s) { ?>
                            <div class="progress">   
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $view_s['percentage']; ?>%;">
                                    <span class="sr-only"><?php echo $view_s['percentage']; ?>% Complete</span>
                                </div>
                                <span class="progress-type"><?php echo $view_s['skillName']; ?></span>
                                <span class="progress-completed"><?php echo $view_s['percentage']; ?>%</span>
                            </div>

                        <?php } ?>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Projects Involved
                    </div>
                    <div class="panel-body">     
                        <?php foreach ($viewProjects as $view): ?>
                            <div class="form-group col-md-12">     
                                <h4>
                                    <a href="<?php echo base_url() . 'admin/edit_project/' . $view['projectID']; ?>"><?php echo $view['title']; ?></a></h4>
                            </div>                             
                            <div class="form-group col-md-12">
                                <label>Description:</label>
                                <?php echo $view['description']; ?> 
                            </div>
                            <div class="form-group col-md-6">
                                <label>Project Location:</label>
                                <?php echo $view['projLocation']; ?>
                            </div>                             
                            <div class="form-group col-md-6">
                                <label>Project Type:</label>
                                <?php echo $view['projectType'] ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Start Date:</label>
                                <?php
                                $sDate = $view['startDate'];
                                $startDate = date("F j, Y", strtotime($sDate));
                                echo $startDate;
                                ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Start Date:</label>
                                <?php
                                $eDate = $view['endDate'];
                                $endDate = date("F j, Y", strtotime($eDate));
                                echo $endDate;
                                ?> 
                            </div>
                            <div class="form-group col-md-12">
                                <label>Budget:</label>
                                <?php echo '$ ' . $view['budget']; ?>
                            </div>
                            <div class="form-group col-md-12">
                                <hr>
                            </div>        
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo $this->load->view('admin/assets/footer.php'); ?>