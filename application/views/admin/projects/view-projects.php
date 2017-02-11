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
                <li><a href="view-employees.html">Employees</a></li>
                <li class="active">Employees List</li>
            </ol>                        
            <?php $this->load->view('admin/assets/menu_p'); ?>
            <hr>
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
                            <tr><th>Title</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Project Type</th>
                                <th>Project Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($results as $data) { ?>
                                <tr>
                                    <td><?php echo $data['title']; ?></td>
                                    <td><?php echo $data['startDate']; ?>
                                    <td><?php echo $data['endDate']; ?></td>
                                    <td><?php echo $data['projectType']; ?><br/></td>
                                    <td><?php echo $data['projLocation']; ?></td>   
                                    <td>
                                        <a href="" class = "btn btn-add-e">
                                            <i class = "fa fa-pencil"></i>
                                        </a>
                                        <a href="" class="btn btn-add-e">
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

<!-- END OF CONTENT -->
<?php $this->load->view('admin/assets/footer'); ?>