<?php $this->load->view('admin/assets/header'); ?>
<?php $this->load->view('admin/assets/navbar'); ?>
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
                    <form action="recommend_users" method="post">
                        <div class="panel-body">
                            <div class="form-group col-lg-12">
                                <label>Recommended Employees:</label>
                                <br />
                                <?php foreach ($users as $user) { ?>
                                    <div class="recommended">
                                        <div class="crop">
                                            <img src="<?php echo base_url(); ?>images/profilepics/<?php echo $user->picture ?>">
                                        </div>
                                        <label class="user">
                                            <a href="<?php echo base_url() . 'employee/view_users/' . $user->username; ?>"><?php echo $user->username; ?></a><div class="availability <?php echo $user->availability; ?>"></div></label>
                                        <span class="user"><?php echo $user->fname . ' ' . $user->lname; ?></span>
                                        <span class="user"><?php echo $user->designation; ?></span>
                                    </div>
                                <?php } ?>
                                <br/>
                                <span style="font-size: 9pt;">Search and select for employee username as recommended above.</span>
                                <select name="recommended[]" class="chosen-select" multiple title='Select Skills' multiple style="width: 100%;">
                                    <option selected value="NULL">No Employee Selected</option>
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
<?php $this->load->view('admin/assets/footer');