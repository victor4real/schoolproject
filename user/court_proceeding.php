<?php require_once '../db_connect.php';
 session_start();
 $my_id = $_SESSION['id'];
 $my_username = $_SESSION['username'];
$msg='';
$success_msg='';
$errorMsg = '';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cases page</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/autoptimize.css">
<link rel="stylesheet" type="text/css" href="../css/animate.css">
<link rel="stylesheet" type="text/css" href="../fonts/font-awesome.min.css">
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/wow.min.js"></script>
<script type="text/javascript" src="../js/jquery easing.js"></script>
<script type="text/javascript" src="../js/Grayscale.js"></script>
</head>
<body>

  <?php      
  include('header.php'); ?>
  <div class="container">

   <?php if (isset($_GET['msg'])) {
  echo  $_GET['msg'];
 
  }  ?>
  
   <div class="panel panel-default">
    <div class="panel-heading" style="background-color: #008000;">
              <h3 class="panel-title" style="color: white;">Court Proceeding</h3>
            </div>
<!-- START THE PM FORM AND DISPLAY LIST -->
        <table class="table">
          <tr>
             <th >S/N</th>
            <th >Case Number</th>
             <th >Case Title</th>
             <th >Date filled</th>
            <th >Details</th>
            </tr>
      
<?php
// SQL to gather their entire PM list
$sql = mysqli_query($con,"SELECT * FROM cases  ORDER BY id DESC LIMIT 100");
 if(mysqli_num_rows($sql)<1){
  echo 'You have no any case report';
 }
$i=1;
while($row = mysqli_fetch_array($sql)){ 
       $id = $row['id'];
       $case_no =$row['case_no'];
       $case_title= $row['case_title'];
       $date= $row['reg_date'];
        

?>
          <tr>
            <td ><?php echo $i ; ?></td>
            <td ><?php echo $case_no; ?></td>
             <td ><?php echo $case_title; ?></td>
             <td ><?php echo $date; ?></td>
                <td><a href="view_proceeding.php?case_no=<?php echo $case_no; ?>" class="btn btn-success">View Proceeding</a></td>
          </tr>

<?php
$i++;}// Close Main while loop
?>
</table>
</form>
</div>
</div>
 <?php include 'footer.php'; ?>
</body>
</html>
