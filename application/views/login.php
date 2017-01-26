<!DOCTYPE html>
<html>
    <head>
        <title>Aegis Infinite</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../brand.ico">

        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/login.css?<?php echo time(); ?>" rel="stylesheet">
    </head>
    <body>
        <?php
        if (isset($logout_message)) {
            echo "<div class='message'>";
            echo $logout_message;
            echo "</div>";
        }
        ?>
        <?php
        if (isset($message_display)) {
            echo "<div class='message'>";
            echo $message_display;
            echo "</div>";
        }
        ?>
        <div class="container center">
            <div class="form-signin">
                <div class="row">
                    <div class="center-block">
                        <img class="logo-name"  style="width: 80%; margin: 20px;" src="<?php echo base_url(); ?>images/leidos.png" alt="">
                    </div>
                </div>

                <?php echo form_open('employee/user_login'); ?>  

                <div style="color: #fff; margin:10px;">
                    <?php if (isset($error) && $error): ?>
                        Incorrect Username or Password!
                    <?php endif; ?>
                    <?php echo validation_errors(); ?>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span> 
                        <input class="form-control" placeholder="Username" name="username" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input class="form-control" placeholder="Password" name="password" id="password" type="password">
                    </div>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                </div>
                <div class="forget-password">
                    <a href="#"> Forget Password?</a>
                </div>
                <div class="form-group">
                    <input type="submit" id="submit" name="submit" class="btn btn-lg btn-block" value="Sign in">
                </div>
                <div style="text-align: center;">
                    <a href="<?php echo site_url('controller/admin_login'); ?>"><small>Switch to Admin</small></a>
                </div> 
                <?php echo form_close(); ?>
            </div>
        </div>
    </body>
</html>