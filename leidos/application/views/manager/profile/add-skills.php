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
                            <h3 class="panel-title"><i class="fa fa-pencil"></i>Basic Info</h3>
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
                            <form action="<?php echo base_url('manager/add_skills'); ?>" method="post" class="form-horizontal">
                                <input type="hidden" name="txt_hidden" value="<?php echo $blog->userID; ?>">
                                <div class="form-group col-md-10">                                    
                                    <label>Skills</label>
                                    <select name="skill" class="form-control" style="width: 100%;">
                                        <?php for ($i = 0; $i < count($skills); $i++) { ?>
                                            <option value="<?php echo $skills[$i]->skillsID ?>"><?php echo $skills[$i]->skillName ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">                                    
                                    <label>Percentage</label>
                                    <select name='percentage' class='form-control'>   
                                        <option value="100">100%</option>
                                        <option value="90">90%</option>
                                        <option value="80">80%</option>
                                        <option value="70">70%</option>
                                        <option value="60">60%</option>
                                        <option value="50">50%</option>
                                    </select>
                                </div>                                                  
                                <div class="form-group col-md-10">
                                    <input type="submit" name="btnUpdate" class="join" value="Add">
                                </div>
                                <?php foreach ($get_skills as $skill) { ?>
                                    <div class="form-group col-md-10">
                                        <input type="text" class="form-div" name="skills" value="<?php echo $skill->skillName ?>"><br/>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="text"  class="form-div" value="<?php echo $skill->percentage ?>">
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('manager/assets/footer.php');