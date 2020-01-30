<?php require_once '../db_connect.php';
 session_start();
$msg='';
$success_msg='';
$errorMsg = '';
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Users</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/autoptimize.css">
<link rel="stylesheet" type="text/css" href="../css/animate.css">
<link rel="stylesheet" type="text/css" href="../fonts/font-awesome.min.css">
</head>
<body>

  <?php      
  include('header.php'); ?>
  <div class="container">

   <?php if (isset($_GET['msg'])) {
  echo  $_GET['msg'];
 
  }  ?>
   <button class="pull-right btn-success"><a href="registration.php">Register User</a></button>
 <div class="panel panel-default">
    <div class="panel-heading" style="background-color: #008000;">
              <h3 class="panel-title" style="color: white;">List of Users </h3>
            </div>
<!-- START THE PM FORM AND DISPLAY LIST -->
        <table class="table">
          <tr>
            <th > S/N</th>            
            <th >Username </th>
            <th >Password</th>
            <th >Account Type</th>
            <th >View details</th>
          </tr>
      
<?php
// SQL to gather their entire PM list
$sql = mysqli_query($con,"SELECT * FROM users  ORDER BY id DESC LIMIT 100");
 if(mysqli_num_rows($sql)<1){
  echo 'You have no registered Suspects';
 }
$i=1;
while($row = mysqli_fetch_array($sql)){ 
    $id = $row['id'];
    $username =$row['username'];
    $password =$row['password'];
    $account_type = $row['account_type'];      
      
?>
          <tr>
           <td ><?php echo $i; ?></td>
            <td ><?php echo $username; ?></td>
            <td ><?php echo $password; ?></td>
            
            <td ><?php echo $account_type ?></td>
            
           <td><a href="view_details.php?id=<?php echo $id; ?>" class="btn btn-success">View detail</a></td>
          </tr>

<?php
$i++;}// Close Main while loop
?>
</table>
</form>
</div>
</div>
</body>
</html>
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
</script>
