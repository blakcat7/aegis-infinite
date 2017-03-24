<div class="form-group col-md-12">
    <div class="col-md-12 team-project">
        <div class="tree">
            <ul>
                <li><a class="category" href="#">Recommended Employees</a>
                    <ul>                                                    
                        <li><a class="category" href="#">Project Managers</a>
                            <ul>
                                <?php foreach ($viewManager as $view): ?>                                        
                                    <li>
                                        <a class="category" href="<?php echo base_url() . 'admin/view_profile/' . $view['username']; ?>"><?php echo $view['fname'] . ' ' . $view['lname']; ?></a>                                     
                                        <a href="<?php echo base_url() . 'admin/delete_staff/' . $view['projectID'] . '/' . $view['userID']; ?>"><i class='fa fa-remove'></i></a>                                                                    
                                    </li>
                                <?php endforeach; ?>  
                            </ul>
                        </li>

                        <li><a class="category" href="#">Project Members</a>                                                            
                            <ul>
                                <li><a class="category" href="#">Developers</a>
                                    <ul>   
                                        <?php foreach ($developer as $view): ?>                                        
                                            <li>
                                                <a class="category" href="<?php echo base_url() . 'admin/view_profile/' . $view['username']; ?>"><?php echo $view['fname'] . ' ' . $view['lname']; ?></a>
                                                <a href="<?php echo base_url() . 'admin/delete_staff/' . $view['projectID'] . '/' . $view['userID']; ?>"><i class='fa fa-remove'></i></a></li>
                                        <?php endforeach; ?> 
                                    </ul>      
                                </li>
                                <li><a class="category" href="#">Designers</a>
                                    <ul>   
                                        <?php foreach ($designer as $view): ?>                                        
                                            <li> <a class="category" href="<?php echo base_url() . 'admin/view_profile/' . $view['username']; ?>"><?php echo $view['fname'] . ' ' . $view['lname']; ?></a>
                                                <a href="<?php echo base_url() . 'admin/delete_staff/' . $view['projectID'] . '/' . $view['userID']; ?>"><i class='fa fa-remove'></i></a>
                                            </li>
                                        <?php endforeach; ?> 
                                    </ul> 
                                </li>
                                <li><a class="category" href="#">Quality Control</a>
                                    <ul>   
                                        <?php foreach ($quality as $view): ?>                                        
                                            <li> <a class="category" href="<?php echo base_url() . 'admin/view_profile/' . $view['username']; ?>"><?php echo $view['fname'] . ' ' . $view['lname']; ?></a>
                                                <a href="<?php echo base_url() . 'admin/delete_staff/' . $view['projectID'] . '/' . $view['userID']; ?>"><i class='fa fa-remove'></i></a>
                                            </li>
                                        <?php endforeach; ?> 
                                    </ul></li>
                                <li><a class="category" href="#">Marketing</a>
                                    <ul>   
                                        <?php foreach ($sales as $view): ?>                                        
                                            <li> <a class="category" href="<?php echo base_url() . 'admin/view_profile/' . $view['username']; ?>"><?php echo $view['fname'] . ' ' . $view['lname']; ?></a>
                                                <a href="<?php echo base_url() . 'admin/delete_staff/' . $view['projectID'] . '/' . $view['userID']; ?>"><i class='fa fa-remove'></i></a>
                                            </li>
                                        <?php endforeach; ?> 
                                    </ul></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>