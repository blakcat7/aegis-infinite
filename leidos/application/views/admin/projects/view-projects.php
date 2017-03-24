<?php $this->load->view('admin/assets/header'); ?>
<?php $this->load->view('admin/assets/navbar'); ?>
<div class="container">
    <div class="row">
        <?php $this->load->view('admin/assets/sidebar'); ?>
        <div class="content col-md-9">
            <h3>Projects</h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="view-employees.html">Projects</a></li>
                <li class="active">Projects List</li>
            </ol>                        
            <?php $this->load->view('admin/assets/menu_p'); ?>
            <hr>
            <?php echo $this->session->flashdata('msg'); ?>
            <div id="row-table" class="row">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <i class="fa fa-folder-open"></i>Projects Database
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
                        <table class="table table-bordered table-striped table-list" id="dev-table">
                            <thead>
                                <tr><th>Title</th>
                                    <th class="extra">Start Date</th>
                                    <th class="extra">End Date</th>
                                    <th class="extra">Project Type</th>
                                    <th class="extra">Project Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($results as $data) { ?>
                                    <tr>
                                        <td><a href="<?php echo base_url() . 'admin/edit_project/' . $data['projectID']; ?>"><?php echo $data['title']; ?></a></td>
                                        <td class="extra"><?php echo $data['startDate']; ?>
                                        <td class="extra"><?php echo $data['endDate']; ?></td>
                                        <td class="extra"><?php echo $data['projectType']; ?><br/></td>
                                        <td class="extra"><?php echo $data['projLocation']; ?></td>   
                                        <td>                                        
                                            <a href="<?php echo base_url() . 'admin/edit_project/' . $data['projectID']; ?>" class = "btn btn-add-e">
                                                <i class = "fa fa-pencil-square-o"></i>
                                            </a>
                                            <a href="<?php echo base_url('admin/delete_project/' . $data['projectID']); ?>" class="btn btn-add-d">
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