<?php 
 require_once '../db_connect.php';
$msg='';
$success_msg='';
$errorMsg = '';
$first_name ='';
$last_name ='';
$username ='';
$password ='';
$address ='';
$state_of_origin = '';
$local_govt = '';
$phone ='';
$gender = '';
$passport = '';

if (!empty($_POST)){
  
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $cpassword = $_POST['cpassword'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $username =$_POST['username'];
        $passport = $_FILES['pic']['name'];
        $state_of_origin = $_POST['state_of_origin'];
        $local_govt = $_POST['local_govt'];
        $i_target = "../users/".basename($_FILES['pic']['name']);
       
  
   $gender = preg_replace('#[^a-z]#i', '', $_POST['gender']); 
   $phone = preg_replace('#[^0-9]#i', '', $_POST['phone']); 
    
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   

   $password = stripslashes($password); 
   $cpassword = stripslashes($cpassword); 
   
   $password = strip_tags($password);
   $cpassword = strip_tags($cpassword);
   //$emailCHecker = mysqli_real_escape_string($con,$email1);
   //$emailCHecker = str_replace("`", "", $emailCHecker);
   $sql_uname_check = mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
   $uname_check = mysqli_num_rows($sql_uname_check);
   //$sql_email_check = mysqli_query($con,"SELECT email FROM mymembers WHERE email='$emailCHecker'");
   //$email_check = mysqli_num_rows($sql_email_check);
    if ((!$username) || (!$gender) || (!$first_name) || (!$last_name) || (!$password) || (!$cpassword) || (!$phone) || (!$state_of_origin) || (!$local_govt) || (!$passport)  || (!$address) ) { 

     $errorMsg = 'ERROR: You did not submit the following required information:<br /><br />';
  
     if(!$username){ 
       $errorMsg .= ' * Username<br />';
     } 
     if(!$gender){ 
       $errorMsg .= ' * Gender: Confirm your sex.<br />';
     }  
   if(!$first_name){ 
       $errorMsg .= ' * First Name<br />';      
     }
   if(!$last_name){ 
       $errorMsg .= ' *Last Name<br />';        
     } 
   if(!$password){ 
       $errorMsg .= ' * Password<br />';        
     }    
   if(!$cpassword){ 
       $errorMsg .= ' * Confirm Password <br />';      
     }
   if(!$phone){ 
       $errorMsg .= ' *Phone Number<br />';        
     }  
   if(!$state_of_origin){ 
       $errorMsg .= ' * State of origin<br />';      
     }
   if(!$local_govt){ 
       $errorMsg .= ' * Local Government<br />';        
     } 
      if(!$passport){ 
       $errorMsg .= ' * Passport<br />';      
     }
   if(!$address){ 
       $errorMsg .= ' * Address<br />';        
     }
       
  

     } else if ($password != $cpassword) {
              $errorMsg = 'ERROR: Your Password fields  do not match<br />';
     } else if ($uname_check > 0){ 
              $errorMsg = "<u>ERROR:</u><br /> $username is already in use in our system. Please try a different username.<br />"; 
     } 

    else{

       $sql = mysqli_query($con, "INSERT INTO users(id,first_name,last_name,username,password,address,gender,phone,state_of_origin,local_govt, passport) VALUES('', '$first_name' , '$last_name' ,  '$username' , '$password'  ,'$address','$gender' , '$phone', '$state_of_origin', '$local_govt', '$passport' )") or die(mysqli_error());
        // mkdir("users/$username", 0755);                 
     if(move_uploaded_file($_FILES['pic']['tmp_name'], $i_target)){
       $success_msg =' User Registered successfully.';
    header("Location: index.php?msg=".$success_msg);
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
<title>User Registration Page</title>
</head>
<body>
<?php  require_once 'header.php';?>
    <div class="container">
          <div class="panel panel-primary">
    <div class="panel-heading">
              <h3 class="panel-title">User Registration</h3>
            </div>
            <div class="panel-body">
          <form class="" method="POST" action="registration.php" enctype="multipart/form-data" autocomplete="off">
      <td colspan="2"><font color="#FF0000"><?php echo "$errorMsg"; ?></font></td>

            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Fisrt Name</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="first_name" id="first_name" value="<?php print "$first_name"; ?>"  placeholder="Enter your First name"/>
                </div>
              </div>
            </div>

          <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Last Name</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="last_name" id="last_name" value="<?php print "$last_name"; ?>"  placeholder="Enter your Last Name"/>
                </div>
              </div>
            </div>


            <div class="form-group">
              <label for="username" class="cols-sm-2 control-label">Username</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="username" id="username"  value="<?php print "$username"; ?>" placeholder="Enter your username"/> 
                </div>
              </div>
            </div>
           
         <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label"> Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="password" id="password" value="<?php print "$password"; ?>"  placeholder="Enter your Password"/>
                </div>
              </div>
            </div>
    
       <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label"> Confirm Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="cpassword" id="cpassword" value="<?php print "$cpassword"; ?>"   placeholder="Confirm your password"/>
                </div>
              </div>
            </div>

         <div class="form-group">
        <label class="cols-sm-2 control-label">Gender</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-venus-double" arial-hidden="true"></i></span>
            <select class="form-control" name="gender" id="gender" value="<?php print "$gender"; ?>" >
            <option value="">--select your gender--</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        </div>
        </div>

       <div class="form-group">
              <label for="email" class="cols-sm-2 control-label">Address</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="address" id="address" value="<?php print "$address"; ?>"  placeholder="Enter your address"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">phone number</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone fa-lg" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="phone" id="phone" value="<?php print "$phone"; ?>"  placeholder="Enter your phone number"/>
                </div>
              </div>
            </div>

             <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label"> State of Origin</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-building-o" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="state_of_origin" id="state_of_origin" value="<?php print "$state_of_origin"; ?>" placeholder="Enter your State of Origin"/>
                </div>
              </div>
            </div>

              <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label">Local Government </label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="local_govt" id="local_govt" value="<?php print "$local_govt"; ?>"  placeholder="Enter your Local Government"/>
                </div>
              </div>
            </div>
     
          <div class="form-group">
              <label for="passport" class="cols-sm-2 control-label">Passport</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span>
                  <input type="file" class="form-control" name="pic"  id="pic" />
                </div>
              </div>
            </div>

            <div class="form-group ">
              <button type="submit" id="button" class="btn btn-primary btn-block ">Register</button>
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