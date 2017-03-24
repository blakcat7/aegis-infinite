<?php $this->load->view('admin/assets/header'); ?>
<?php $this->load->view('admin/assets/navbar'); ?>
<div class="container">
    <div class="row">
        <?php $this->load->view('admin/assets/sidebar'); ?>
        <div class="content col-md-9">
            <h3>Employees</h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="<?php echo site_url(); ?>admin/view_employees">Employees</a></li>
                <li class="active">Employees List</li>
            </ol>                      
            <?php $this->load->view('admin/assets/menu_e'); ?>
            <hr>            
            <?php echo $this->session->flashdata('msg'); ?>
            <div id="row-table" class="row">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <i class="fa fa-users"></i>Employees Database
                        <div class="pull-right">
                            <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                <i class="glyphicon glyphicon-filter"></i>
                            </span>
                        </div>
                    </div>
                    <div class="panel-body" id="filter">
                        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter" />
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-list" id="dev-table">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th class="extra">Name</th>
                                    <th class="extra">Email</th>
                                    <th class="extra">Location</th>
                                    <th class="extra">Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($results as $data) { ?>  
                                    <tr>
                                        <td><a href="<?php echo base_url() . 'admin/view_profile/' . $data['username']; ?>"><?php echo $data['username']; ?></a></td>
                                        <td class="extra"><?php echo $data['fname']; ?> <?php echo $data['lname']; ?></td>
                                        <td class="extra"><?php echo $data['email']; ?></td>
                                        <td class="extra"><?php echo $data['location']; ?><br/></td>
                                        <td class="extra"><?php echo $data['sector']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() . 'admin/view_profile/' . $data['username']; ?>" class = "btn btn-add-e">
                                                <i class = "fa fa-pencil-square-o"></i>
                                            </a>
                                            <a href="<?php echo base_url('admin/delete_row/' . $data['username']); ?>" class="btn btn-add-d">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>   
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
<?php $this->load->view('admin/assets/footer'); ?>

