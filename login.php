  <?php 
  require_once('db_connect.php');
  ?>
  <!DOCTYPE html>
</!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <body>
    <?php
include_once 'header.php';

    ?>
  <div class="container">
                        <div class="panel panel-default">
    <div class="panel-heading" style="background-color: #008000;">
              <h3 class="panel-title" style="color: white;" >Log In</h3>
            </div>
                           <div class="form-group">
                           
                           <form  action="process_login.php" method="post">
                           <div style="color: red;"><?php if (isset($_GET['error'])) {
  echo  $_GET['error'];}?></div>
                                <label class="control-label">Username</label>
                                <input type="text" id="username" name="username" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">password</label>
                                <input type="password" id="password" name="password" class="form-control" />
                            </div>
                            <div class="form-group">
                                <a href="#">Forgot Password</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" value="Sign in" class="btn btn-success btn-block">Sign in</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        <?php include 'footer.php';?>
        </body>
        </html>