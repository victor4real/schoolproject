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
$description ='';


if (!empty($_POST)){
  
        $case_no = $_POST['case_no'];
        $description = $_POST['description'];
        $reporter = $_POST['reporter'];
        $evidence_image = $_FILES['pic']['name'];
        $i_target = "../files/".basename($_FILES['pic']['name']);
       
  

    if ((!$description) || (!$evidence_image) || (!$case_no)) { 

     $errorMsg = 'Please submit the following :<br />';
  
     if(!$description){ 
       $errorMsg .= ' * Evidence description<br />';
     } 
     if(!$evidence_image){ 
       $errorMsg .= ' * Evidence picture.<br />';
     }  
   if(!$case_no){ 
       $errorMsg .= ' * Case number<br />';      
     }
        }

    else{

       $sql = mysqli_query($con, "INSERT INTO  case_files(id,case_no,img,description,reg_date,reporter) VALUES('', '$case_no' , '$evidence_image' ,  '$description' ,  now()  ,'$reporter' )") or die(mysqli_error());
        // mkdir("users/$username", 0755);                 
     if(move_uploaded_file($_FILES['pic']['tmp_name'], $i_target)){
       $success_msg =' Case Evidence Registered successfully.';
    header("Location: case_files.php?msg=".$success_msg);
    } else { 
    echo '<img src="image/round_error.png" width="31" height="30" /> &nbsp; an Error has occured.';
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
<title>file Page</title>
</head>
<body>
<?php  require_once 'header.php';?>
    <div class="container">
          <div class="panel panel-default">
    <div class="panel-heading" style="background-color: #008000;">
              <h3 class="panel-title" style="color: white;">Case Evidence Registration</h3>
            </div>
            <div class="panel-body">
          <form class="" method="POST" action="add_file.php" enctype="multipart/form-data" autocomplete="off">
      <td colspan="2"><font color="#FF0000"><?php echo "$errorMsg"; ?></font></td>

         <div class="form-group">
        <label class="cols-sm-2 control-label">Case Number</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user" arial-hidden="true"></i></span>
            <select class="form-control" name="case_no" id="case_no" value="<?php print "$case_no"; ?>" >
            <option value=""> --select Case Number-- </option>
             <?php
           $q = mysqli_query($con, "SELECT * FROM cases ORDER BY id ASC ");
            while($rowo = mysqli_fetch_assoc($q)){
            $case_num =$rowo['case_no'].'<br>';
             
           
          ?>
            <option value="<?php echo $case_num; ?>"> <?php echo  $case_num; }?> </option>
        </select>
        </div>
        </div>

     <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label">Evidence Description </label>
              <div class="cols-sm-10">
                <div class="input-group">
                 <textarea rows="8" cols="150" name="description" id="description"><?php print "$description"; ?> </textarea>
                </div>
              </div>
            </div>

             <div class="form-group">
              <label for="passport" class="cols-sm-2 control-label">Evidence Image</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span>
                  <input type="file" class="form-control" name="pic"  id="pic" />
                </div>
              </div>
            </div>
             
          <input type="hidden" class="form-control" name="reporter" id="reporter" value="<?php print "$name"; ?>"  />


            <div class="form-group ">
              <button type="submit" id="button" class="btn btn-success btn-block ">Add Evidence</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
    </body>
    </html>

  

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
        <?php include 'footer.php'?>