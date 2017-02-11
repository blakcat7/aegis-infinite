<?php $this->load->view('admin/assets/header'); ?>
<?php $this->load->view('admin/assets/navbar'); ?>

<!-- CONTENT -->
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
            <!-- Table -->
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
                    <table class="table table-hover" id="dev-table">
                        <thead>
                            <tr><th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Location</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($results as $data) { ?>
                                <tr>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['fname']; ?> <?php echo $data['lname']; ?></td>
                                    <td><?php echo $data['email']; ?></td>
                                    <td><?php echo $data['location']; ?><br/></td>
                                    <td><?php echo $data['sector']; ?></td>
                                    <td>
                                        <a href="" class = "btn btn-add-e">
                                            <i class = "fa fa-pencil"></i>
                                        </a>
                                        <a href="<?php echo base_url('admin/delete_row/' . $data['username']); ?> " class="btn btn-add-e">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>   
                                    <!--
                                    <td>kilgore</td>
                                    <td>kilgore</td>
                                    <td>loc</td>
                                    <td><button type="button" class="btn btn-add-e">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </td> -->
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>

                    <div class="panel-footer">
                        <ul class="pagination">
                            <!-- Show pagination links -->
                            <?php
                            foreach ($links as $link) {
                                echo "<li class='pagination'>" . $link . "</li>";
                            }
                            ?>
                        </ul>    
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>

<?php $this->load->view('admin/assets/footer'); ?>

