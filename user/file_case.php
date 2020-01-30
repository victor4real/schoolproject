<?php 
 require_once '../db_connect.php';
 session_start();
 $my_id = $_SESSION['id'];
 $my_username = $_SESSION['username'];
 $usql = mysqli_query($con,"SELECT * FROM users WHERE id='$my_id'");
 if(mysqli_num_rows($usql)<1){
  echo 'An error has occured';
 }

while($row = mysqli_fetch_array($usql)){ 
       $name = $row['first_name'] .' '. $row['last_name']  ;
     
     }
     
$msg='';
$success_msg='';
$errorMsg = '';

$case_title='';
$case_description='';
$digits = 3;
        $rand_no= mt_rand(pow(10, $digits-1), pow(10, $digits)-1);
        $case_no ='FHC/BN/'.$rand_no;
if (!empty($_POST)){
         $reporter = $_POST['reporter'];
        $case_no = $_POST['case_no'];
        $case_title = $_POST['case_title'];
        $case_description = $_POST['case_description'];
        
  if ((!$case_title) || (!$case_description) ) { 

     $errorMsg = 'Please enter the following information:<br />';
  
    
     if(!$case_title){ 
       $errorMsg .= ' * Enter case title.<br />';
     }  
   if(!$case_description){ 
       $errorMsg .= ' * Enter case description<br />';      
     }
  
   }
       
  

    else{
 $sql = mysqli_query($con, "INSERT INTO cases (id,case_no, case_title, case_description, reg_date, reporter) VALUES('', '$case_no', '$case_title',  '$case_description' , now(),  '$reporter')") or die(mysqli_error());
        // mkdir("users/$username", 0755);                 
     if($sql){
      $success_msg ='Case Filled successfully.';
    header("Location: cases.php?msg=".$success_msg);
    } else { 
    echo '<img src="../image/round_error.png" width="31" height="30" /> &nbsp; an Error has occured.';
        exit();
        mysqli_close();
      
    }
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
<title>Census Registration Page</title>
</head>
<body>
<?php  require_once 'header.php';?>
  <body>
    <div class="container">
             <div class="panel panel-default">
    <div class="panel-heading" style="background-color: #008000;">
              <h3 class="panel-title" style="color: white;">Case Registration</h3>
            </div>
          <form class="" method="POST" action="file_case.php" enctype="multipart/form-data" autocomplete="off">
      <td colspan="2"><font color="#FF0000"><?php echo "$errorMsg"; ?></font></td>


          <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Case Title</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="case_title" id="case_title" value="<?php print "$case_title"; ?>"  placeholder="Enter case title"/>
                </div>
              </div>
            </div>

         <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label">Case description</label>
              <div class="cols-sm-10">
                <div class="input-group">
                 <textarea rows="8" cols="150" name="case_description" id="case_description"><?php print "$case_description"; ?> </textarea>
                </div>
              </div>
            </div>
             
          <input type="hidden" class="form-control" name="case_no" id="case_no" value="<?php print "$case_no"; ?>"  />
          <input type="hidden" class="form-control" name="reporter" id="reporter" value="<?php print "$name"; ?>"  />


            <div class="form-group ">
              <button type="submit" id="button" class="btn btn-success btn-block ">Register</button>
            </div>
            
          </form>
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