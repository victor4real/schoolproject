<?php 
 require_once '../db_connect.php';
 session_start();
 $my_id = $_SESSION['id'];
 $id = preg_replace('#[^0-9]#i', '', $_GET['id']);
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
$sql = mysqli_query($con ," SELECT * FROM cases  WHERE id='$id' ") or die(mysqli_error());;
$i=1;
if($r=mysqli_num_rows($sql)<1 ){
  
  echo "Sorry an error has occured";
}
while($row = mysqli_fetch_assoc($sql)){



       $case_no = $row['case_no'];
       $case_title = $row['case_title'];
       $case_description= $row['case_description'];
       $reporter = $row['reporter'];
       $reg_date = $row['reg_date'];
      }
   ?>   
  <div class="panel panel-default">
      <div class="panel-heading" style="background-color: #008000;">
      <h3 class="panel-title" style="color: white;">
      Case Number  <?php echo $case_no ?> Detail
      </h3>
      </div>
            <div class="panel-body">
              <div class="row">
                  <table class="table">
                    <tbody>

                     <tr>
                        Case Number:
                        <?php echo $case_no ?>
                      </tr>
                      <tr>
                        <td>Case Title</td>
                        <td><?php echo $case_title ?></td>
                      </tr>
                      <tr>
                        <td>Reporter:</td>
                        <td><?php echo $reporter?></td>
                      </tr>
                      <tr>
                        <td>Filling date</td>
                        <td><?php echo $reg_date ?></td>
                      </tr>
                      <tr>
                        <td>Case Description</td>
                        <td><?php echo $case_description ?></td>
                      </tr>
                       </tbody>
                  </table>
                   
                 
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