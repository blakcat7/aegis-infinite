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
                <li class="active">Recommend Employees</li>
            </ol>                        
            <?php $this->load->view('admin/assets/menu_p'); ?>
            <hr>                    
            <?php echo $this->session->flashdata('msg'); ?>

            <div id="row-table" class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Recommend an Employee
                    </div>
                    <form action="add_recommended" method="post">
                        <div class="panel-body">
                            <div class="form-group col-lg-12">
                                <label>Recommended Employees:</label><br />
                                <?php
                                foreach($users as $user) { ?>
                                <div class="recommended">
                                    <?php 
                                    echo '<span class="user">' . $user->username . '</span>';
                                    echo '<span class="user">' . $user->fname . ' '. $user->lname . '</span>';
                                    echo '<span class="user">' . $user->role . '</span>';
                                    ?>
                                </div>
                                <?php } ?>
                                <br/>
                                <span style="font-size: 9pt;">Search and select for employee username as recommended above.</span>
                                <select name="recommended[]" class="chosen-select" multiple title='Select Skills' multiple style="width: 100%;">
                                    <?php for ($i = 0; $i < count($users); $i++) { ?>
                                        <option value="<?php echo $users[$i]->userID ?>"><?php echo $users[$i]->username ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <?php echo form_submit(array('id' => 'success-btn', 'value' => 'Submit', 'class' => 'btn')); ?>
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