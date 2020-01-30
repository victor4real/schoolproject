  <?php
  require_once('../db_connect.php');
  session_start();
 $my_id = $_SESSION['id'];
 $my_username = $_SESSION['username'];
   $case_no =$_GET['case_no'];
if (isset($_POST["submit"])) {
  $update = mysqli_query($con,"DELETE FROM case_files WHERE case_no='$case_no'") or die(mysqli_error());
  if($update){
      $success_msg ='Evidence deleted successfully.';
    header("Location: case_files.php?msg=".$success_msg);
    }
    else{
    $msg = "An Error has occured";  
      }
}
?>
<!DOCTYPE html>
</!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fill Space Home</title>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/animate.css">
  <link rel="stylesheet" type="text/css" href="../fonts/font-awesome.min.css">
  </head>
<body>
<?php 
include_once 'header.php';
?>
<div class="container">
   <div class="row">
            <div class="col-lg-offset-3">
              <div class="col-lg-8">
                <div class="table-responsive table-ex">
                    <table class="table table-responsive">
                      <form action="" method="post">
                        <tr>
                            <td colspan="3">
                                <div class="well">
                                <span class="">Are you sure you want to delete this evidence file?</span>
                                    <br />
                                    <br />
                                    
                                    <p><input type="submit" name="submit"value="Yes" class="btn btn-danger" />&emsp;<a class="btn btn-default" href="view_files.php?case_no=<?php echo $case_no?>">Back</a></p>
                                </div>
                            </td>
                        </tr>
                        </form>
                    </table>
                </div>
                </div>
            </div>
        </div>
        </div>
         <?php include 'footer.php'; ?>
        </body>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/wow.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</html>