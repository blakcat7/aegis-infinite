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
                        <?php echo form_open('admin/add_skills'); ?>
                        <div class="form-group col-lg-12">
                            <label>Skills Required:</label> <?php echo form_error('skillsRequired'); ?><br />
                            <select name="skillsRequired[]" class="chosen-select" multiple-style="width:785px;">
                                <?php foreach ($skills as $row) { ?>
                                <option value="<?php $row->skillsID;?>"><?php $row->skillName;?>></option>
                                <?php
                                }
                                //echo form_multiselect('skill[]', $skill, '', array('class' => 'chosen-select', 'multiple style' => 'width:785px;'));
                                ?>    
                                <?php /* echo form_input(array('type' => 'text', 'name' => 'skillsRequired', 'class' => 'form-control')); */ ?>
                                <?php echo form_error('skillsRequired'); ?>
                            </select>
                        </div>
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