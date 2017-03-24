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
        <link href="<?php echo base_url(); ?>css/table.css" rel="stylesheet">      
        <link href="<?php echo base_url(); ?>css/profile.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/chosen.css" rel="stylesheet" />

        <script type="text/javascript" src="<?php echo base_url(); ?>js/filter.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/upload.js"></script>
        <style>
            .btn-add-e, .btn-add-d { padding: 9.65px 12px;}
        </style>
    </head>
    <body>

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
                        <li class="active">Edit Project</li>
                    </ol>                        
                    <?php $this->load->view('admin/assets/menu_p'); ?>
                    <hr>
                    <div id="row-table" class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Projects Information
                            </div>
                            <form action="<?php echo base_url('admin/update_project'); ?>" method="post" class="form-horizontal">       
                                <div class="panel-body"> 
                                    <?php foreach ($viewProjects as $view): ?>                            
                                        <input type="hidden" name="txt_hidden" value="<?php echo $view['projectID']; ?>">
                                        <div class="form-group col-md-12"> 
                                            <label>Title:</label>
                                            <input type="text" value="<?php echo $view['title']; ?>" name="title" class="form-control">
                                        </div>                             
                                        <div class="form-group col-md-12">                                        
                                            <label>Description:</label>   
                                            <textarea rows="3" name="description" class="form-control"><?php echo $view['description']; ?></textarea>                                     
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Project Location:</label>
                                            <select name='projLocation' class='form-control'>                                                                                                                         
                                                <option selected value="<?php echo $view['projLocation']; ?>"><?php echo $view['projLocation']; ?></option>
                                                <option disabled></option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="South Korea">South Korea</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Untied States">United States</option>
                                            </select>
                                        </div>                             
                                        <div class="form-group col-md-6">
                                            <label>Project Type:</label>
                                            <select name='projectType' class='single form-control'>                                                                                                                         
                                                <option selected value="<?php echo $view['projectType']; ?>"><?php echo $view['projectType']; ?></option>
                                                <option disabled></option>
                                                <option value="Civil">Civil</option>
                                                <option value="Defense">Defense</option>
                                                <option value="Security">Intelligence & Homeland Security</option>
                                                <option value="Health">Health</option>
                                                <option value="Advance Solutions">Advance Solutions</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Start Date:</label>
                                            <?php
                                            $sDate = $view['startDate'];
                                            $startDate = date("F j, Y", strtotime($sDate));
                                            ?>
                                            <input type="date" name="startDate" value="<?php echo $sDate; ?>" class="form-control">
                                            <label class="date pull-right"><?php echo $startDate; ?></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Start Date:</label>
                                            <?php
                                            $eDate = $view['endDate'];
                                            $endDate = date("F j, Y", strtotime($eDate));
                                            ?> 

                                            <input name="endDate" type="date" value="<?php echo $eDate; ?>" class="form-control">
                                            <label class="date pull-right"><?php echo $endDate; ?></label>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Budget: (USD)</label>                                        
                                            <input type="number" value="<?php echo $view['budget']; ?>" name="budget" class="form-control">                                        
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="panel-footer">
                                    <input type="submit" name="btnUpdate" class="btn" value="Update" id="success-btn">
                                </div>
                            </form>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Skills Required
                            </div>    
                            <div class="panel-body"> 
                                <form action="<?php echo base_url('admin/add_skills'); ?>" method="post" class="form-horizontal">  
                                    <div class="form-group col-md-11">
                                        <input type="hidden" name="txt_hidden" value="<?php echo $view['projectID']; ?>">
                                        <select name="skills[]" class="chosen-select" multiple style="width: 100%;">
                                            <?php for ($i = 0; $i < count($skills); $i++) { ?>
                                                <option value="<?php echo $skills[$i]->skillsID ?>"><?php echo $skills[$i]->skillName ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-1"> 
                                        <button type="submit" class="btn btn-add-e"><i class="fa fa-plus"></i></button>
                                    </div>
                                </form>
                                <?php foreach ($viewSkills as $view): ?>
                                    <div class="form-group col-md-11">
                                        <input type="hidden" name="txt_hidden" value="<?php echo $view['projectID']; ?>">
                                        <select name="skills" id="select" class="form-control" style="width:100%;">
                                            <option selected value="<?php echo $view['skillName']; ?>"><?php echo $view['skillName']; ?></option>
                                            <option disabled="disabled"></option>
                                            <?php for ($i = 0; $i < count($skills); $i++) { ?>
                                                <option value="<?php echo $skills[$i]->skillsID ?>"><?php echo $skills[$i]->skillName ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-1"> 
                                        <a href="<?php echo base_url('admin/delete_skills/' . $view['skillsID']); ?>" class="btn-a">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>            
                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Recommended Employees
                            </div>    
                            <div class="panel-body"> 
                                <label>Project Managers:</label>   
                                <form action="<?php echo base_url('admin/add_managers'); ?>" method="post" class="form-horizontal">  
                                    <div class="form-group col-md-11">
                                        <input type="hidden" name="txt_hidden" value="<?php echo $view['projectID']; ?>">
                                        <select name="recommended[]" class="chosen-select" multiple title='Select Skills' multiple style="width: 100%;">
                                            <?php for ($i = 0; $i < count($pmanager); $i++) { ?>
                                                <option value="<?php echo $pmanager[$i]->userID ?>"><?php echo $pmanager[$i]->username ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-1"> 
                                        <button type="submit" class="btn btn-add-e"><i class="fa fa-plus"></i></button>
                                    </div>
                                </form>
                                <div class="form-group col-md-12">
                                    <?php foreach ($viewManager as $view): ?>
                                        <input type="hidden" name="user" value="<?php $view['userID'] ?>">
                                        <div class="team" style="padding: 15px;">
                                            <label class="user">
                                                <a href="<?php echo base_url() . 'admin/view_profile/' . $view['username']; ?>"><?php echo $view['username']; ?></a>
                                            </label>
                                            <span class="user"><?php echo $view['fname'] . ' ' . $view['lname']; ?></span>
                                            <span class="user"><?php echo $view['designation']; ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="form-group col-md-12"> 
                                    <label>Team Members:</label> <br>                                   
                                    <?php foreach ($viewEmployees as $view): ?>                                       
                                        <div class="team" style="padding: 15px;">
                                            <label class="user">
                                                <a href="<?php echo base_url() . 'admin/view_profile/' . $view['username']; ?>"><?php echo $view['username']; ?></a>
                                            </label>
                                            <span class="user"><?php echo $view['fname'] . ' ' . $view['lname']; ?></span>
                                            <span class="user"><?php echo $view['designation']; ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>   
                            </div>
                            <div class="panel-footer">
                                <input type="submit" name="btnUpdate" class="btn" value="Update" id="success-btn">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF CONTENT -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/filter.js"></script>
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
