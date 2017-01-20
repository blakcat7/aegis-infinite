<?php
if (isset($this->session->userdata['logged_in'])) {
    header("location: http://localhost/login/index.php/controller/login");
}
?>
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
        <div class="container" style="margin-top:5%">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">

                    <div class="panel-body login">
                        <fieldset>
                            <div class="row">
                                <div class="center-block">
                                    <img class="logo" src="<?php echo base_url(); ?>images/logo.png" alt="">

                                </div>
                            </div>
                            <div class="row">
                                <div class="center-block">
                                    <img class="logo-name" src="<?php echo base_url(); ?>images/aegis.png" alt="">
                                </div>
                            </div>

                            <div class="row">
                                <?php echo form_open('controller/login'); ?>
                                <?php
                                echo "<div class='error_msg'>";
                                if (isset($error_message)) {
                                    echo $error_message;
                                }
                                echo validation_errors();
                                echo "</div>";
                                ?>
                                <div class="col-sm-12 col-md-10  col-md-offset-1 ">
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
                                        <input type="submit"  name="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>