<?php $this->load->view('admin/assets/header'); ?>
<?php $this->load->view('admin/assets/navbar'); ?>

<!-- CONTENT -->
<div class="container">
    <div class="row">
        <?php $this->load->view('admin/assets/sidebar'); ?>
        <div class="content col-md-9">
            <h3>Projects</h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Projects</a></li>
                <li class="active">Add New Project</li>
            </ol>                        
            <?php $this->load->view('admin/assets/menu_p'); ?>
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
                            <?php echo form_textarea(array('id' => 'description', 'name' => 'description', 'rows' => '5', ' class' => 'form-control')); ?>

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

                        <div class="form-group col-lg-12">
                            <label>Skills Required:</label> <?php echo form_error('skillsRequired'); ?><br />
                            <?php
                            foreach ($skills as $row) {
                                $skill[] = $row->skillName;
                            }
                            array_unshift($skill, "");
                            unset($skill[0]);
                            echo form_multiselect('skill[]', $skill, $skill, array('class' => 'chosen-select', 'multiple style' => 'width:785px;'));
                            ?>
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
                        <?php echo form_submit(array('id' => 'success-btn', 'value' => 'Next', 'class' => 'btn')); ?>
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