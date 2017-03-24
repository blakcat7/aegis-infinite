<?php $this->load->view('manager/assets/header'); ?>
<?php $this->load->view('manager/assets/navbar'); ?>
<div class="profile container">
    <div class="row">
        <?php $this->load->view('manager/assets/sidebar'); ?>
        <div class="profile-content col-md-9">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Projects Information
                    </div>
                    <?php foreach ($viewProjects as $view): ?>      
                        <form action="<?php echo base_url('manager/update_project/' . $view['projectID']); ?>" method="post" class="form-horizontal">       
                            <div class="panel-body">                       
                                <input type="hidden" name="txt_hidden" value="<?php echo $view['projectID']; ?>">
                                <div class="form-group col-md-12"> 
                                    <label>Title:</label>
                                    <input type="text" value="<?php echo $view['title']; ?>" name="title" class="form-div form-control">
                                </div>                             
                                <div class="form-group col-md-12">                                        
                                    <label>Description:</label>   
                                    <textarea rows="3" name="description" class="form-div form-control"><?php echo $view['description']; ?></textarea>                                     
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Project Location:</label>
                                    <select name='projLocation' class='form-div form-control'>                                                                                                                         
                                        <option selected value="<?php echo $view['projLocation']; ?>"><?php echo $view['projLocation']; ?></option>
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
                                    <label>Project Type:</label>
                                    <select name='projectType' class='form-div form-control'>                                                                                                                         
                                        <option selected value="<?php echo $view['projectType']; ?>"><?php echo $view['projectType']; ?></option>
                                        <option disabled></option>
                                        <option value="Civil">Civil</option>
                                        <option value="Defense">Defense</option>
                                        <option value="Security">Intelligence & Homeland Security</option>
                                        <option value="Health">Health</option>
                                        <option value="Advance Solutions">Advance Solutions</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Start Date:</label>
                                    <?php
                                    $sDate = $view['startDate'];
                                    $startDate = date("F j, Y", strtotime($sDate));
                                    ?>
                                    <input type="date" name="startDate" value="<?php echo $sDate; ?>" class="form-div">
                                    <label class="date pull-right"><?php echo $startDate; ?></label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Start Date:</label>
                                    <?php
                                    $eDate = $view['endDate'];
                                    $endDate = date("F j, Y", strtotime($eDate));
                                    ?> 

                                    <input name="endDate" type="date" value="<?php echo $eDate; ?>" class="form-div">
                                    <label class="date pull-right"><?php echo $endDate; ?></label>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Budget: (USD)</label>                                        
                                    <input type="number" value="<?php echo $view['budget']; ?>" name="budget" class="form-div form-control">                                        
                                </div>                                  
                                <div class="form-group col-md-10">
                                    <input type="submit" name="btnUpdate" class="join" value="Update">
                                </div>
                            </div>  

                        </form>
                    <?php endforeach; ?>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Skills Required
                    </div>    
                    <div class="panel-body"> 
                        <form action="<?php echo base_url('manager/add_project_skills/' . $view['projectID']); ?>" method="post" class="form-horizontal">  
                            <div class="form-group col-md-11">
                                <input type="hidden" name="txt_hidden" value="<?php echo $view['projectID']; ?>">
                                <select name="skills[]" class="chosen-select" multiple style="width: 100%;">
                                    <?php for ($i = 0; $i < count($skills); $i++) { ?>
                                        <option value="<?php echo $skills[$i]->skillsID ?>"><?php echo $skills[$i]->skillName ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-1"> 
                                <button type="submit" class="btn btn-add-e"><i class="fa fa-plus"></i></button>
                            </div>
                        </form>
                        <?php foreach ($viewSkills as $view): ?>
                            <div class="form-group col-md-11">
                                <input type="hidden" name="txt_hidden" value="<?php echo $view['projectID']; ?>">
                                <div name="skills" class="form-div form-control">
                                    <?php echo $view['skillName']; ?>
                                </div>
                            </div>
                            <div class="form-group col-md-1"> 
                                <a href="<?php echo base_url('manager/delete_project_skills/' . $view['projectID'] . '/' . $view['skillsID']); ?>" class="btn-a">
                                    <i style="margin-right: 0px;" class="fa fa-trash"></i>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>            
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        Recommended Employees
                    </div>    
                    <div class="panel-body">    
                            <label>Project Managers:</label>
                        <form action="<?php echo base_url('manager/add_managers/' . $view['projectID']); ?>" method="post" class="form-horizontal">  
                            <div class="form-group col-md-11">
                                <input type="hidden" name="txt_hidden" value="<?php echo $view['projectID']; ?>">
                                <select name="recommended[]" class="chosen-select" multiple title='Select Skills' multiple style="width: 100%;">
                                    <?php for ($i = 0; $i < count($pmanager); $i++) { ?>
                                        <option value="<?php echo $pmanager[$i]->userID ?>"><?php echo $pmanager[$i]->username ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-1"> 
                                <button type="submit" class="btn btn-add-e"><i class="fa fa-plus"></i></button>
                            </div>
                        </form>
                        <div class="form-group col-md-12">
                            <?php foreach ($viewManager as $view): ?>
                                <input type="hidden" name="user" value="<?php $view['userID'] ?>">
                                <div class="team" style="padding: 15px;">
                                    <label class="user">
                                        <a href="<?php echo base_url() . 'admin/view_profile/' . $view['username']; ?>"><?php echo $view['username']; ?></a>
                                    </label>
                                    <span class="user"><?php echo $view['fname'] . ' ' . $view['lname']; ?></span>
                                    <span class="user"><?php echo $view['designation']; ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <label>Team Members:</label><br>
                        <form action="<?php echo base_url('manager/add_employee/' . $view['projectID']); ?>" method="post" class="form-horizontal">  
                            <div class="form-group col-md-11">
                                <input type="hidden" name="txt_hidden" value="<?php echo $view['projectID']; ?>">
                                <select name="recommended_e[]" class="chosen-select" multiple title='Select Skills' multiple style="width: 100%;">
                                    <?php for ($i = 0; $i < count($employee); $i++) { ?>
                                        <option value="<?php echo $employee[$i]->userID ?>"><?php echo $employee[$i]->username ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-1"> 
                                <button type="submit" class="btn btn-add-e"><i class="fa fa-plus"></i></button>
                            </div>
                        </form>
                        <div class="form-group col-md-12">
                            <?php foreach ($viewEmployees as $view): ?>                                       
                                <div class="team" style="padding: 15px;">
                                    <label class="user">
                                        <a href="<?php echo base_url() . 'employee/view_profile/' . $view['username']; ?>"><?php echo $view['username']; ?></a>
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
<?php $this->load->view('manager/assets/footer'); ?>