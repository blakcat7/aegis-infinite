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
                            <form action="<?php echo base_url('manager/update'); ?>" method="post" class="form-horizontal">
                                <input type="hidden" name="txt_hidden" value="<?php echo $blog->userID; ?>">
                                <div class="form-group col-md-12">
                                    <?php echo $this->session->flashdata('msg'); ?>
                                </div>
                                <div class="form-group col-md-6">                                    
                                    <label>First Name</label>
                                    <input type="text" value="<?php echo $blog->fname; ?>" name="fname" class="form-control">
                                </div>
                                <div class="form-group col-md-6">                                    
                                    <label>Last Name</label>
                                    <input type="text" value="<?php echo $blog->lname; ?>" name="lname" class="form-control">
                                </div>                                    
                                <div class="form-group col-md-12">                                    
                                    <label>Designation</label>
                                    <input type="text" value="<?php echo $blog->designation; ?>" name="designation" class="form-control">
                                </div>                                        
                                <div class="form-group col-md-12">                                    
                                    <label>Sector:</label>
                                    <select name='sector' class='form-control'>   
                                        <option value="Civil">Civil</option>
                                        <option value="Defense">Defense</option>
                                        <option value="Security">Intelligence and Homeland Security</option>
                                        <option value="Health">Health</option>
                                        <option value="Advance Solutions">Advance Solutions</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">                                    
                                    <label>Primary Location:</label>
                                    <select name='location' class='form-control'>                                                                                                                         
                                        <option selected value="<?php echo $blog->location ?>"><?php echo $blog->location ?></option>
                                        <option disabled></option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Untied States">United States</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">                                    
                                    <label>Preferred Location:</label>                                                  
                                    <select name='plocation' class='form-control' style='width: 100%;'>   
                                        <option selected value="<?php echo $blog->plocation ?>"><label><?php echo $blog->plocation ?></label></option>                                                                  
                                        <option disabled></option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>                        
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Canada">Canada</option>
                                        <option value="United States">United States</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">                                    
                                    <label>Availability:</label>                                                  
                                    <select name='availability' class='form-control' style='width: 100%;'>   
                                        <option selected value="<?php echo $blog->availability ?>"><label><?php echo $blog->availability ?></label></option>                                                                  
                                        <option disabled></option>
                                        <option value="Available">Available</option>                        
                                        <option value="Busy">Busy</option>
                                        <option value="Unavailable">Unavailable</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-10">
                                    <input type="submit" name="btnUpdate" class="join" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('manager/assets/footer'); ?>