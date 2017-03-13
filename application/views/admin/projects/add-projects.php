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
            <?php echo $this->session->flashdata('msg'); ?>
                    	<?php foreach ($notif as $notifs) {?>
                        <li><a href="#"><span class="label label-warning"><?php echo $notifs->datetime?></span><?php echo $notifs->title;?></a></li>
                        <a href = "<?php echo base_url('employee/insert_row/' .$notifs->projectID . '/' . $notifs->userID); ?>">Accept</a>
                         <?php } ?>
                        <li class="divider"></li>
                        <li><a href="#" class="text-center">View All</a></li>
            <div id="row-table" class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add New Project
                    </div>
                    <form action="add_project" method="post">
                        <div class="panel-body">
                            <div class="form-group col-lg-12">
                                <label>Project Title: </label>
                                <input id='title' name='title' class='form-control'>
                                <?php echo form_error('title'); ?>
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Description: </label>
                                <textarea id='description' name='description' rows='5' class='form-control'></textarea>
                                <?php echo form_error('description'); ?><br />
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Budget: </label>
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input id='budget' name='budget' class='form-control'>
                                </div>
                                <?php echo form_error('budget'); ?>
                            </div>

                            <div class="form-group col-lg-6">                                    
                                <label>Start Date:</label>
                                <div class="input-group" id="datetimepicker4">
                                    <input type='text' name='startDate' data-format='yyyy-MM-dd' class='form-control'>
                                    <span class="add-on input-group-btn ">
                                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-calendar"></span></button>   
                                    </span>
                                </div>
                                <?php echo form_error('startDate'); ?>
                            </div>
                            <div class="form-group col-lg-6">                                    
                                <label>End Date:</label>
                                <div class="input-group" id="datetimepicker3">
                                    <input type='text' name='endDate' data-format='yyyy-MM-dd' class='form-control'>
                                    <span class="add-on input-group-btn ">
                                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-calendar"></span></button>   
                                    </span>
                                </div>
                                <?php echo form_error('endDate'); ?>
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Project Type:</label>
                                <select name='projectType' class='form-control'>
                                    <option value="Civil">Civil</option>
                                    <option value="Defense">Defense</option>
                                    <option value="Security">Intelligence and Homeland Security</option>
                                    <option value="Health">Health</option>
                                    <option value="Advance Solutions">Advance Solutions</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Location</label>
                                <select name='projLocation' class='form-control'>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="South Korea">South Korea</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Canada">Canada</option>
                                    <option value="United States">United States</option>
                                </select>
                            </div>


                            <div class="form-group col-lg-12">
                                <label>Skills Required:</label><br />
                                <select name="skill[]" class="chosen-select" multiple style="width: 100%;">
                                    <?php for ($i = 0; $i < count($skills); $i++) { ?>
                                        <option value="<?php echo $skills[$i]->skillsID ?>"><?php echo $skills[$i]->skillName ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <?php echo form_submit(array('id' => 'success-btn', 'value' => 'Next', 'class' => 'btn')); ?>
                        </div>
                    </form>
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