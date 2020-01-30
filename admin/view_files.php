<?php 
 require_once '../db_connect.php';
 session_start();
 $my_id = $_SESSION['id'];
 $case_no = $_GET['case_no'];
 $error_Msg = "";
$success_msg = "";

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
$sql = mysqli_query($con ," SELECT * FROM case_files  WHERE case_no='$case_no' ") or die(mysqli_error());;
$i=1;
if($r=mysqli_num_rows($sql)<1 ){
  
  echo "Sorry an error has occured";
}
while($row = mysqli_fetch_assoc($sql)){
       $case_num = $row['case_no'];
       $description = $row['description'];
       $reg_date= $row['reg_date'];
       $reporter = $row['reporter'];
       $img = $row['img'];
      }
   ?>   
  <div class="panel panel-default"> 
      <div class="panel-heading" style="background-color: #008000;">
      <h3 class="panel-title" style="color: white;">Case Number <?php echo $case_num?> Evidence Report</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img src="../files/<?php echo $img; ?>" alt="evidence image" class="img-thumbnail img-responsive" />

 </div>

                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>

                     <tr>
                        <td>Registered By:</td>
                        <td><?php echo $reporter ?></td>
                      </tr>
                      <tr>
                        <td>Case Number</td>
                        <td><?php echo $case_num; ?></td>
                      </tr>
                      <tr>
                        <td>Registration Date:</td>
                        <td><?php echo $reg_date; ?></td>
                      </tr>
                      <tr>
                        <td>Evidence description </td>
                        <td><?php echo $description ?></td>
                      </tr>
                                             
                       </tbody>
                  </table>
                  <td><a href="delete_files.php?case_no=<?php echo $case_no; ?>" class="btn btn-success btn-block">Delete Files</a></td>  
                 
                </div>
              </div>
            </div>
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