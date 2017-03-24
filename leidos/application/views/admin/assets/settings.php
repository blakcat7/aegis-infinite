<?php $this->load->view('admin/assets/header'); ?>
<?php $this->load->view('admin/assets/navbar'); ?>
<div class="container">
    <div class="row">
        <?php $this->load->view('admin/assets/sidebar'); ?>
        <div class="content col-md-9">
            <h3>Settings</h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Settings</li>
            </ol>                      
            <hr>            
            <?php echo $this->session->flashdata('msg'); ?>
            <div id="row-table" class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-cogs"></i>Settings
                    </div>                           
                    <div class="panel-body">
                        <form action="<?php echo base_url('admin/add_skill'); ?>" method="post" class="form-horizontal">
                            <div class="col-md-10">          
                                <input class="form-group form-div form-control" name="skill" placeholder="Enter Skill Name">
                            </div>
                            <div class="col-md-2"> 
                                <button type="submit" name="btnUpdate" class="btn btn-add-r">
                                    <i class = "fa fa-plus"></i>
                                </button>
                            </div>
                        </form>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <?php foreach ($skills as $skill) { ?>
                            <form action="<?php echo base_url('admin/update_skill'); ?>" method="post" class="form-horizontal">                                
                                <input type="hidden" class="form-control" name="skillsID" value="<?php echo $skill->skillsID ?>"><br/>
                                <div class="form-group col-md-10">   
                                    <input class="form-div form-control" name="skill" value="<?php echo $skill->skillName ?>">
                                </div>                                                       
                                <div class="form-group col-xs-6 col-md-1">                                        
                                    <button type="submit" name="btnUpdate" class="btn btn-add-e">
                                        <i class = "fa fa-refresh"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="form-group col-xs-6 col-md-1">                                            
                                <a href="<?php echo base_url('employee/delete_skills/' . $skill->skillName); ?>" class="btn btn-add-d">
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
<?php $this->load->view('admin/assets/footer'); ?>

