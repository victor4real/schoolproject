<?php 
 require_once '../db_connect.php';
 session_start();
  $case_no = $_GET['case_no'];
 $my_id = $_SESSION['id'];
 $my_username = $_SESSION['username'];
 $usql = mysqli_query($con,"SELECT * FROM users WHERE id='$my_id'");
 if(mysqli_num_rows($usql)<1){
  echo 'An error has occured';
 }

while($row = mysqli_fetch_array($usql)){ 
       $name = $row['first_name'] .' '. $row['last_name'];
     }
     
$msg='';
$success_msg='';
$errorMsg = '';

 if(isset($_POST['submit'])){
       $proceeding = $_POST['proceeding'];
      $sqlUpdate = mysqli_query($con,"UPDATE proceeding SET proceeding_report='$proceeding' WHERE case_no='$case_no' LIMIT 1") or die(mysqli_error());
    if ($sqlUpdate){
        $success_msg ='Proceeding updated successfully.';
    header("Location:court_proceeding.php?msg=".$success_msg);
      exit();
    } else {
    $error_msg = '<img src="../image/round_error.png" alt="Error" width="31" height="30" /> an error occured while updating orphans record.';
    }
}

 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/animate.css">
  <link rel="stylesheet" type="text/css" href="../fonts/font-awesome.min.css">
<style type="text/css"> 
.hiddenDiv{display:none}
#AddFormProcessGif{display:none}
<!--
.style26 {color: #FF0000}
.style28 {font-size: 14px}
.brightRed {
  color: #F00;
}
.textSize_9px {
  font-size: 9px;
}
</style>
<title>Edit Proceeding Page</title>
</head>
<body>
<?php  require_once 'header.php';?>
  <body>
    <div class="container">
             <div class="panel panel-primary">
    <div class="panel-heading">
              <h3 class="panel-title">Court Proceeding</h3>
            </div>
            <br>
            <div class="panel-body">
          <form class="" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
      <td colspan="2"><font color="#FF0000"><?php echo "$errorMsg"; ?></font></td>
    <?php 
      $disp_sql = mysqli_query($con ," SELECT * FROM  proceeding  WHERE case_no='$case_no' ") or die(mysqli_error());

while($disp_row = mysqli_fetch_assoc($disp_sql)){
       $proceeding =$disp_row['proceeding_report'];
 }
    ?>

         <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label">Enter Proceeding</label>
              <div class="cols-sm-10">
                <div class="input-group">
                 <textarea rows="8" cols="150" name="proceeding" id="proceeding"><?php print "$proceeding"; ?> </textarea>
                </div>
              </div>
            </div>
         

            <div class="form-group ">
              <button type="submit" name="submit" id="submit" class="btn btn-success btn-block ">Register</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
    </div>


  

<script src="../js/jquery.js"  type="text/javascript" media="screen"></script>
<script src="../css/bootstrap.min.js" type="text/javascript" ></script>
<script src="../js/jquery.min.js"></script>
  <script language="javascript" type="text/javascript"> 
$(document).ready(function() {
  $("#username").blur(function() {
    $("#nameresponse").removeClass().text('Checking Username...').fadeIn(1000);
    $.post("check_signup_name.php",{ username:$(this).val() } ,function(data) {
        $("#nameresponse").fadeTo(200,0.1,function() { 
        $(this).html(data).fadeTo(900,1); 
      });
        });
  });
});
function toggleSlideBox(x) {
    if ($('#'+x).is(":hidden")) {
      $('#'+x).slideDown(300);
    } else {
      $('#'+x).slideUp(300);
    }
}
</script>
        <?php include 'footer.php'; ?>

</body>
</html>