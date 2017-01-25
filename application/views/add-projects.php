<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../brand.ico">

        <title>Aegis Infinite</title>

        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/navbar.css">
        <link  rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css">  
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/chosen.css">    
        <link rel = "stylesheet" href = "<?php echo base_url(); ?>css/footer.css">
    </head>
    <body>
        <!-- CONTENT -->
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked">
                        <li><h5><i class="fa fa-home fa-fw"></i> Management</h5><li>
                            <hr>
                        <li><a href="#"><span class="glyphicon glyphicon-dashboard fa-fw"></span>Dashboard</a></li>
                        <li><a href="<?php echo site_url('controller/add_employee'); ?>"><i class="fa fa-users fa-fw"></i>Employees</a></li>
                        <li><a href="<?php echo site_url('controller/add_project') ?>"><i class="fa fa-folder-open fa-fw"></i>Projects</a></li>
                        <h5><i class="fa fa-calendar fa-fw"></i> Calendar</h5>   
                        <hr>                        
                        <li><a href="#"><i class="fa fa-calendar fa-fw"></i>Attendance</a></li>
                        <li><a href="#"><i class="fa fa-rocket fa-fw"></i>Leave Applications</a></li>
                        <li><a href="#"><i class="fa fa-sun-o fa-fw"></i>Holidays</a></li>
                        <h5><i class="fa fa-wrench fa-fw"></i> Options</h5>   
                        <hr>
                        <li><a href="#"><i class="fa fa-cogs fa-fw"></i>Settings</a></li>
                        <hr>
                    </ul>
                </div>
                <div class="content col-md-9">
                    <h3>Projects</h3>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#">Projects</a></li>
                        <li class="active">Add New Project</li>
                    </ol>                        
                    <button type="button" class="btn btn-add-e">View Projects
                        <span class="glyphicon glyphicon-folder-open"></span>
                    </button>

                    <button type="button" class="btn btn-add-e">Add New Project
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>

                    <hr>                    

                    <?php echo $this->session->flashdata('msg-p'); ?>

                    <div id="row-table" class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Add New Project
                            </div>
                            <div class="panel-body">
                                <?php echo form_open('admin/add_project'); ?>
                                <div class="form-group col-lg-12">
                                    <?php echo form_label('Project Title: '); ?>
                                    <?php echo form_input(array('id' => 'title', 'name' => 'title', 'class' => 'form-control')); ?>
                                    <?php echo form_error('title'); ?>
                                </div>

                                <div class="form-group col-lg-12">
                                    <?php echo form_label('Description: '); ?> <?php echo form_error('description'); ?><br />
                                    <?php echo form_textarea(array('id' => 'description', 'name' => 'description', 'rows' => '5', ' class' => 'form-control')); ?><br />

                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Project Type</label>
                                    <?php
                                    $sector = array(
                                        'Civil' => 'Civil',
                                        'Defense' => 'Defense',
                                        'Intelligence & Homeland Security' => 'Intelligence & Homeland Security',
                                        'Health' => 'Health',
                                        'Advance Solutions' => 'Advance Solutions',
                                    );

                                    echo form_dropdown('projectType', $sector, 'civil', 'class = "form-control"');
                                    ?>
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

                                    echo form_dropdown('projLocation', $location, 'United Arab Emirates', 'class = "form-control"');
                                    ?>

                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Skills Required:</label> <?php echo form_error('skillsRequired'); ?><br />

                                    <?php
                                    foreach ($skills->result() as $skills) {
                                        $skill[] = $skills->skillName;
                                    }

                                    echo form_dropdown('skillsRequired[]', $skill, $skill, array('id' => 'skillsRequired', 'name' => 'skillsRequired', 'class' => 'chosen-select', 'multiple style' => 'width:785px;'));
                                    ?>                                    


                                    <label>Skill Required:</label>
                                    <?php echo form_input(array('type' => 'text', 'name' => 'skillsRequired', 'class' => 'form-control')); ?>
                                    <?php echo form_error('skillsRequired'); ?>
                                </div>

                                <div class="form-group col-lg-6">                                    
                                    <label>Start Date:</label>
                                    <div class="input-group" id="datetimepicker4">
                                        <?php echo form_input(array('type' => 'text', 'name' => 'startDate', 'data-format' => 'yyyy-MM-dd', 'readonly' => 'true', 'class' => 'form-control')); ?>
                                        <span class="add-on input-group-btn ">
                                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-calendar"></span></button>   
                                        </span>
                                    </div>
                                    <?php echo form_error('startDate'); ?>
                                </div>
                                <div class="form-group col-lg-6">                                    
                                    <label>End Date:</label>
                                    <div class="input-group" id="datetimepicker3">

                                        <?php echo form_input(array('type' => 'text', 'name' => 'endDate', 'data-format' => 'yyyy-MM-dd', 'readonly' => 'true', 'class' => 'form-control')); ?>
                                        <span class="add-on input-group-btn ">
                                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-calendar"></span></button>   
                                        </span>
                                    </div>
                                    <?php echo form_error('endDate'); ?>
                                </div>
                                <!--
                                <div class="form-group col-lg-12">
                                    <label>Recommended Project Manager:</label>
                                    <div class="editable" contenteditable="false" id="">
                                        <img data-toggle="tooltip" title="Project Manager" class="img-members" src="images/admin1.png"/>
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Recommended Members:</label>
                                    <div class="editable" contenteditable="false" id="">                                          
                                        <img data-toggle="tooltip" title="Graphic Designer" class="img-members" src="images/member1.png"/>
                                        <img data-toggle="tooltip" title="Microsoft Expert" class="img-members" src="images/member2.png"/>
                                        <img data-toggle="tooltip" title="Graphic Designer" class="img-members" src="images/member3.png"/>
                                        <img data-toggle="tooltip" title="Graphic Designer" class="img-members" src="images/member.png"/>
                                    </div>
                                </div> -->
                            </div>
                            <div class="panel-footer">
                                <?php echo form_submit(array('id' => 'success-btn', 'value' => 'Add', 'class' => 'btn')); ?>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF CONTENT -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js"></script>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker4').datetimepicker({
                    pickTime: false
                });
                $('#datetimepicker3').datetimepicker({
                    pickTime: false
                });
            });
        </script>
        <script src="<?php echo base_url(); ?>js/chosen.jquery.min.js"></script>
        <script type="text/javascript">
            var config = {
                '.chosen-select': {},
                '.chosen-select-deselect': {allow_single_deselect: true},
                '.chosen-select-no-single': {disable_search_threshold: 10},
                '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
                '.chosen-select-width': {width: "95%"}
            }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }
        </script>

    </body>
</html>