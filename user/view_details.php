<?php 
 require_once '../db_connect.php';
 session_start();
 $my_id = $_SESSION['id'];
 $id = preg_replace('#[^0-9]#i', '', $_GET['id']);
 $error_Msg = "";
$success_msg = "";
if (isset($_POST["submit"])) {
  $account_type=$_POST['account_type'];
  $update = mysqli_query($con,"UPDATE users SET account_type='$account_type' WHERE id= '$id'") or die(mysqli_error());
  if($update){
      $success_msg =' User account type updated successfully.';
    header("Location: view_users.php?id='$id' && msg=".$success_msg);
    }
    else{
    $msg = "An Error has occured";  
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
<title>Profile Page</title>
</head>
<body>
<?php  require_once 'header.php';?>
  <body>
<div class="container">
  

   <?php if (isset($_GET['msg'])) {
  echo  $_GET['msg'];
 
  }  ?>
   <?php 
$sql = mysqli_query($con ," SELECT * FROM users  WHERE id='$id' ") or die(mysqli_error());;
$i=1;
if($r=mysqli_num_rows($sql)<1 ){
  
  echo "Sorry an error has occured";
}
while($row = mysqli_fetch_assoc($sql)){
       $first_name = $row['first_name'];
       $last_name = $row['last_name'];
       $address= $row['address'];
       $state_of_origin = $row['State_of_origin'];
       $lga = $row['local_govt'];
       $gender= $row['gender'];
       $phone= $row['phone'];
       $account_type = $row['account_type'];
       $passport= $row['passport'];
      }
   ?>   
  <div class="panel panel-info">
      <div class="panel-heading">
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img src="../users/<?php echo $passport; ?>" alt="profile image" class="img-circle img-responsive" />

 </div>

                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>

                     <tr>
                        <td>Firstname</td>
                        <td><?php echo $first_name ?></td>
                      </tr>
                      <tr>
                        <td>Lastname</td>
                        <td><?php echo $last_name ?></td>
                      </tr>
                      <tr>
                        <td>Address:</td>
                        <td><?php echo $address?></td>
                      </tr>
                      <tr>
                        <td>Gender</td>
                        <td><?php echo $gender ?></td>
                      </tr>
                      <tr>
                        <td>Phone Number</td>
                        <td><?php echo $phone ?></td>
                      </tr>
                       <tr>
                        <td>State of origin</td>
                        <td><?php echo $state_of_origin ?></td>
                      </tr>
                        <tr>
                        <td>Local Government</td>
                        <td><?php echo $lga ?></td>
                      </tr>
                        
                       <tr>
                        <td>Account type</td>
                        <td><?php echo $account_type ?></td>
                      </tr>
                        
                       </tbody>
                  </table>
              <td><a href="edit_user.php?id=<?php echo $id; ?>" class="btn btn-primary btn-block">Edit Details</a></td>  
                 
                </div>
              </div>
            </div>
            </div>
            </div>

              <div class="container">
        <div class="form-group" id="AddBox" name="AddBox" style="display: none;" >
          <div class="panel panel-info">
    <div class="panel-heading">
              <h3 class="panel-title">Promote </h3>
            </div>
          <form action="" method="post">
                     <div class="form-group">
                        <label class="cols-sm-2 control-label">Select Account type</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-check" arial-hidden="true"></i></span>
                            <select class="form-control" name="account_type" id="account_type">
                            <option value=""><?php print "$account_type"; ?></option>
                            <option value="admin">Admin</option>
                            <option value="official">Official</option>
                           
                        </select>
                        </div>
                        </div>
                                    <p><input type="submit" name="submit" id="submit" value="Promote" class="btn btn-success btn-block" /></p>
                                </div>
                            </td>
                        </tr>
                        </form>
                        </div>
            </div>
           
  <script src="../js/jquery.js"  type="text/javascript" media="screen"></script>
<script src="../css/bootstrap.min.js" type="text/javascript" ></script>
<script src="../js/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
function toggleAddBox() {
    if ($('#AddBox').is(":hidden")) {
      $('#AddBox').slideDown(1000);
    } else {
      $('#AddBox').slideUp(1000);
    }      
}

function toggleAddBox1() {
    if ($('#AddBox1').is(":hidden")) {
      $('#AddBox1').slideDown(1000);
    } else {
      $('#AddBox1').slideUp(1000);
    }      
}
</script>
</body>