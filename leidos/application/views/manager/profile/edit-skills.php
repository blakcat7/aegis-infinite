<?php $this->load->view('manager/assets/header'); ?>
<?php $this->load->view('manager/assets/navbar'); ?>
<div class="profile container">
    <div class="row">
        <?php $this->load->view('manager/assets/settings'); ?>
        <div class="profile-content col-md-9">
            <div class="col-md-12">
                <div id="row-table" class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-fire"></i>Skills</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group col-md-12">
                                <a href="<?php echo site_url('manager/insert_skills'); ?>" role="button" class="btn btn-add-e">Add Skills
                                    <span class="glyphicon glyphicon-plus"></span>
                                </a>

                                <a href="<?php echo site_url('manager/edit_skills'); ?>" role="button" class="btn btn-add-e">Update Skills
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <hr>
                                <?php echo $this->session->flashdata('msg'); ?>
                            </div>
                            <input type="hidden" name="txt_hidden" value="<?php echo $blog->userID; ?>">
                            <?php foreach ($get_skills as $skill) { ?>    
                                <form action="<?php echo base_url('manager/update_skills'); ?>" method="post" class="form-horizontal">                                                                              
                                    <input type="hidden" class="form-control" name="userID" value="<?php echo $skill->userID ?>"><br/>
                                    <input type="hidden" class="form-control" name="skillsID" value="<?php echo $skill->skillsID ?>"><br/>
                                    <div class="form-group col-xs-8">
                                        <input type="text" class="form-div" name="skills" value="<?php echo $skill->skillName ?>"><br/>
                                    </div>
                                    <div class="form-group col-xs-2">
                                        <select name='percentage' class='form-control'>
                                            <option value="<?php echo $skill->percentage ?>"><?php echo $skill->percentage ?>%</option>
                                            <option disabled></option>
                                            <option value="100">100%</option>
                                            <option value="90">90%</option>
                                            <option value="80">80%</option>
                                            <option value="70">70%</option>
                                            <option value="60">60%</option>
                                            <option value="50">50%</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-1">
                                        <button type="submit" name="btnUpdate" class="btn btn-add-e">
                                            <i class = "fa fa-refresh"></i>
                                        </button>
                                    </div>
                                </form>
                                <div class="form-group col-xs-1">                                            
                                    <a href="<?php echo base_url('manager/delete_skills/' . $skill->skillsID); ?>" class="btn btn-add-d">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            <?php } ?>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('manager/assets/footer');