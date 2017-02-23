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
        <link href="<?php echo base_url(); ?>css/profile.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/footer.css" rel="stylesheet">
        <style>
            #view-more{
                display: none;
            }
        </style>
    </head>
    <body>

        <!-- NAVBAR -->
        <nav class="navbar" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>images/logo-w.png" class="brand"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span>Dashboard</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-calendar"></span>Calendar</a></li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="glyphicon glyphicon-search"></span>Search <b class="caret"></b></a>
                            <ul class="dropdown-menu" style="min-width: 300px;">
                                <li>
                                    <div class="col-md-12">
                                        <form class="navbar-form navbar-left" role="search">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search" />
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="glyphicon glyphicon-folder-open"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="label label-warning">7:00 AM</span>Hi :)</a></li>
                                <li><a href="#"><span class="label label-warning">8:00 AM</span>How are you?</a></li>
                                <li><a href="#"><span class="label label-warning">9:00 AM</span>What are you doing?</a></li>
                                <li class="divider"></li>
                                <li><a href="#" class="text-center">View All</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="glyphicon glyphicon-globe"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="label label-warning">4:00 AM</span>Favourites Snippet</a></li>
                                <li><a href="#"><span class="label label-warning">4:30 AM</span>Email marketing</a></li>
                                <li><a href="#"><span class="label label-warning">5:00 AM</span>Subscriber focused email
                                        design</a></li>
                                <li class="divider"></li>
                                <li><a href="#" class="text-center">View All</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $fname . ' ' . $lname; ?></a></li>
                                <li class="divider"></li>
                                <li><a href="#"><span class="glyphicon glyphicon-pencil"></span>Edit Profile</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>employee/logout"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <!-- END OF NAVBAR -->

        <!-- CONTENT -->
        <div class="profile container">
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <div class="profile">
                            <div class="profile-header-container">                                   
                                <div class="profile-pic">
                                    <img class="crop" src="<?php echo base_url(); ?>images/profile1.jpg" />
                                </div>
                            </div> 
                            <div class="name">
                                <h2><?php echo $fname . ' ' . $lname; ?><br/><small><?php echo $role; ?></small></h2>
                                <small><?php echo $location; ?> <i class="fa fa-map-marker"></i></small>   
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="<?php echo base_url(); ?>employee/profile"><i class="fa fa-user fa-fw"></i>Profile</a ></li>
                        <li class="active"><a href="<?php echo base_url(); ?>employee/projects"><i class="fa fa-folder-open fa-fw"></i>Projects</a ></li>   
                        <li><a href="#"><i class="fa fa-calendar fa-fw"></i>Attendance</a></li>
                        <li><hr></li>
                        <li><a href="#"><i class="fa fa-cogs fa-fw"></i>Settings</a></li>
                        <li><hr></li>
                    </ul>
                </div>
                <div class="profile-content col-md-9">
                    <!-- Skills -->
                    <div class="col-md-12">
                        <div class="panel panel-default"> 
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-folder-open"></i>Projects</h3>
                            </div>
                            <div class="panel-body">          
                                <ul class="nav nav-pills"> 
                                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>employee/projects">All Projects</a></li> 
                                    <li role="presentation"><a href="<?php echo base_url(); ?>employee/my_projects">My Projects</a></li>
                                </ul>
                                <ol class="breadcrumb" style="margin-top: 10px;">
                                    <li><a href="<?php echo base_url(); ?>employee/projects">Projects</a></li>
                                    <li class="active">All Projects</li>
                                </ol> 

                                <?php foreach ($project as $data) { ?>
                                    <hr>
                                    <div class="proj">
                                        <h4> <?php echo $data['title']; ?> 
                                            <div class="pull-right">
                                                <label class="location"><span class="glyphicon glyphicon-map-marker"></span><?php echo $data['projLocation'] ?></label>
                                                <label class="date"><?php echo $data['projectType'] ?></label>
                                            </div>
                                        </h4>                                        
                                        <label class="date-title">Start Date:</label>
                                        <label class="date">                                        
                                            <?php
                                            $sDate = $data['startDate'];
                                            $startDate = date("F j, Y", strtotime($sDate));
                                            echo $startDate;
                                            ?>
                                        </label>   

                                        <label class="date-title">End Date:</label>
                                        <label class="date">
                                            <?php
                                            $eDate = $data['endDate'];
                                            $endDate = date("F j, Y", strtotime($eDate));
                                            echo $endDate;
                                            ?> 
                                        </label>
                                        <br><br>                                       
                                        <p class="desc"><?php echo $data['description']; ?> </p>

                                        <div id ="<?php echo $data['projectID']; ?>" class="panel-body">
                                            <i class="fa fa-th-list"></i>Type: Advanced Solutions <br/><br/>
                                            <i class="fa fa-calendar-plus-o"></i>Start Date: 09/30/2016 <br/>
                                            <i class="fa fa-calendar-check-o"></i>End Date: TBD <br/><br/>

                                            <i class="fa fa-location-arrow"></i>Location: Dubai, United Arab Emirates <br/><br/>
                                            <i class="fa fa-cogs"></i>Skills Required:</br>
                                            <span class="interest">Adobe Photoshop</span>
                                            <span class="interest">Adobe Illustrator</span>
                                            <span class="interest">Powerpoint</span><br/><br/>
                                            <i class="fa fa-users"></i>Members:</br>
                                            <img data-toggle="tooltip" title="Project Manager" class="img-members" src="../admin1.png"/>
                                            <img data-toggle="tooltip" title="Graphic Designer" class="img-members" src="../member1.png"/>
                                            <img data-toggle="tooltip" title="Microsoft Expert" class="img-members" src="../member2.png"/>
                                            <img data-toggle="tooltip" title="Graphic Designer" class="img-members" src="../member3.png"/>
                                            <img data-toggle="tooltip" title="Graphic Designer" class="img-members" src="../member.png"/>
                                            </br></br>
                                            <i class="fa fa-check-square-o"></i>Project Completion: 90%</br>
                                            <div class="progressBarContainer">
                                                <div class="progressBarValue orange value-90"></div>
                                            </div>

                                        </div>
										<input type="button" id="<?php echo $data['projectID']; ?>" value="test">
                                        <button type="button" id="<?php echo $data['projectID']; ?>" class="view" data-toggle="modal" data-target="#myModal">View More</button>
                                        <button class="join">Request to Join</button>
                                    </div>                        
                                <?php } ?>
                            </div>
                        </div><!--/.col-md-6 -->
                    </div>
                </div>
            </div>
            <!-- END OF CONTENT -->
            <!-- FOOTER -->
            <?php $this->load->view('footer'); ?>
            <!-- FOOTER -->

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('button:button').click(function () {
                        $("id").slideToggle();
                        $(this).html(function (i, html) {
                            return html === 'View More' ? 'View Less' : 'View More';
                        });
                    });
                });

                $('button:button').click(function() { alert( $(this).attr("id") ) });
                //alert("Button Id: " + this.id);
            </script>

            }
    </body>
</html>