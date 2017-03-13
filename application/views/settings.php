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

        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>css/navbar.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/admin.css" rel="stylesheet">            
        <link href="<?php echo base_url(); ?>css/chosen.css" rel="stylesheet">   
        <link href="<?php echo base_url(); ?>css/profile.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/footer.css" rel="stylesheet">      
    </head>
    <body>
        <!-- NAVBAR -->
        <?php $this->load->view('navbar-e'); ?>
        <!-- END OF NAVBAR -->

        <!-- CONTENT -->
        <div class="profile container">
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                    </div>
                    <ul class="nav nav-pills nav-stacked">                        
                        <li style=""><a href="<?php echo base_url(); ?>employee/profile"><h5><i class="fa fa-arrow-left fa-fw"></i>Go Back To Profile</h5></a></li>
                        <h5><i class="fa fa-cogs fa-fw"></i> Settings</h5>   
                        <hr>
                        <li class="active"><a href="#"><i class="fa fa-user fa-fw"></i>Basic Info</a ></li>
                        <li><a href="#"><i class="fa fa-fire fa-fw"></i>Skills</a ></li>  
                        <li><a href="#"><i class="fa fa-calendar fa-fw"></i>Attendance</a></li>
                        <li><hr></li>
                    </ul>
                </div>
                <div class="profile-content col-md-9">
                    <!-- Projects -->
                    <div class="col-md-12">
                        <div id="row-table" class="row">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-pencil"></i>Basic Info</h3>

                                </div>
                                <div class="panel-body">
                                    <form action="<?php echo base_url('employee/update'); ?>" method="post" class="form-horizontal">
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
                                        <!--
                                        <div class="form-group col-lg-12">
                                            <label>Change Profile Picture</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file">
                                                        Browse… <input type="file" name="userfile" id="imgInp">
                                                    </span>
                                                </span>
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                        </div>                                        
                                        -->
                                        <div class="form-group col-md-10">
                                            <input type="submit" name="btnUpdate" class="join" value="Update">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!--/.col-md-6 -->
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF CONTENT -->
        <!-- FOOTER -->
        <?php $this->load->view('footer'); ?>
        <!-- FOOTER -->


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <script>
            $(document).ready(function () {
                $(document).on('change', '.btn-file :file', function () {
                    var input = $(this),
                            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                    input.trigger('fileselect', [label]);
                });

                $('.btn-file :file').on('fileselect', function (event, label) {

                    var input = $(this).parents('.input-group').find(':text'),
                            log = label;

                    if (input.length) {
                        input.val(log);
                    } else {
                        if (log)
                            alert(log);
                    }

                });
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#img-upload').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#imgInp").change(function () {
                    readURL(this);
                });
            });
        </script>
    </body>
</html>
