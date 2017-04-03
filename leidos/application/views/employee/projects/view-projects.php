<?php $this->load->view('employee/assets/header'); ?>
<?php $this->load->view('employee/assets/navbar'); ?>
<div class="profile container">
    <div class="row">
        <?php $this->load->view('employee/assets/sidebar'); ?>
        <div class="profile-content col-md-9">
            <div class="col-md-12">
                <div class="panel panel-default"> 
                    <div class="panel-heading">     
                        <?php foreach ($viewProjects as $view) { ?>
                            <h3 class="panel-title" style="font-weight: 700;"><?php echo $view['title']; ?></h3>
                        <?php } ?>
                    </div>
                    <div class="panel-body">      
                        <?php foreach ($viewProjects as $view) { ?>
                            <div class="form-group col-md-12"> 
                                <label>Title:</label>
                                <div type="text" value="" name="title" class="form-div">
                                    <?php echo $view['title']; ?>
                                </div>
                            </div>                             
                            <div class="form-group col-md-12">                                        
                                <label>Description:</label>   
                                <div name="description" class="form-div"><?php echo $view['description']; ?></div>                                     
                            </div>
                            <div class="form-group col-md-6">
                                <label>Project Location:</label>
                                <div type="text" value="" name="projLocation" class="form-div">
                                    <?php echo $view['projLocation']; ?>
                                </div>
                            </div>                             
                            <div class="form-group col-md-6">
                                <label>Project Type:</label>                                            
                                <div type="text" value="" name="projLocation" class="form-div">
                                    <?php echo $view['projectType']; ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Start Date:</label>
                                <?php
                                $sDate = $view['startDate'];
                                $startDate = date("F j, Y", strtotime($sDate));
                                ?>
                                <div type="date" name="startDate" value="" class="form-div">
                                    <?php echo $sDate; ?>
                                </div>
                                <label class="date pull-right"><?php echo $startDate; ?></label>
                            </div>
                            <div class="form-group col-md-6">
                                <label>End Date:</label>
                                <?php
                                $eDate = $view['endDate'];
                                $endDate = date("F j, Y", strtotime($eDate));
                                ?> 
                                <div name="endDate" type="date" value="" class="form-div">
                                    <?php echo $eDate; ?>
                                </div>
                                <label class="date pull-right"><?php echo $endDate; ?></label>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Budget: (USD)</label>                                        
                                <div type="number" value="" name="budget" class="form-div">  
                                    <?php echo $view['budget']; ?>
                                </div>
                            </div>
                        <?php } ?>           
                        <div class="form-group col-md-12">
                            <label>Skills Required:</label>
                            <?php foreach ($viewSkills as $view): ?>
                                <div type="number" value="" name="budget" class="form-div">  
                                    <?php echo $view['skillName']; ?>
                                </div>
                                <br>
                            <?php endforeach; ?>
                        </div>
                        <div class="form-group col-md-12">                                    
                            <label>Project Manager:</label><br>
                            <?php foreach ($viewManager as $view): ?>
                                <div class="team" style="padding: 15px;">
                                    <label class="user">
                                        <a href="<?php echo base_url() . 'employee/view_users/' . $view['username']; ?>"><?php echo $view['username']; ?></a>
                                    </label>
                                    <span class="user"><?php echo $view['fname'] . ' ' . $view['lname']; ?></span>
                                    <span class="user"><?php echo $view['designation']; ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="form-group col-md-12"> 
                            <label>Team Members:</label> <br>                                   
                            <?php foreach ($developer as $view): ?>                                       
                                <div class="team" style="padding: 15px;">
                                    <label class="user">
                                        <a href="<?php echo base_url() . 'employee/view_users/' . $view['username']; ?>"><?php echo $view['username']; ?></a>
                                    </label>
                                    <span class="user"><?php echo $view['fname'] . ' ' . $view['lname']; ?></span>
                                    <span class="user"><?php echo $view['designation']; ?></span>
                                </div>
                            <?php endforeach; ?>
                            <?php foreach ($designer as $view): ?>                                       
                                <div class="team" style="padding: 15px;">
                                    <label class="user">
                                        <a href="<?php echo base_url() . 'employee/view_users/' . $view['username']; ?>"><?php echo $view['username']; ?></a>
                                    </label>
                                    <span class="user"><?php echo $view['fname'] . ' ' . $view['lname']; ?></span>
                                    <span class="user"><?php echo $view['designation']; ?></span>
                                </div>
                            <?php endforeach; ?>
                            <?php foreach ($quality as $view): ?>                                       
                                <div class="team" style="padding: 15px;">
                                    <label class="user">
                                        <a href="<?php echo base_url() . 'employee/view_users/' . $view['username']; ?>"><?php echo $view['username']; ?></a>
                                    </label>
                                    <span class="user"><?php echo $view['fname'] . ' ' . $view['lname']; ?></span>
                                    <span class="user"><?php echo $view['designation']; ?></span>
                                </div>
                            <?php endforeach; ?>
                            <?php foreach ($sales as $view): ?>                                       
                                <div class="team" style="padding: 15px;">
                                    <label class="user">
                                        <a href="<?php echo base_url() . 'employee/view_users/' . $view['username']; ?>"><?php echo $view['username']; ?></a>
                                    </label>
                                    <span class="user"><?php echo $view['fname'] . ' ' . $view['lname']; ?></span>
                                    <span class="user"><?php echo $view['designation']; ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>   
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('employee/assets/footer'); ?>