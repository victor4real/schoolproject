<?php

 session_start();
require_once('db_connect.php');

$username = $_POST['username'];
$password = $_POST['password'];
//validate the input
    if (strlen($username) != "" && strlen($password) != "") {

        $q = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND account_type='admin'";
        $r = mysqli_query($con, $q);

        if (mysqli_num_rows($r) == 1) {
//redirect to students account pass enc  SHA1('$password')"
            header("Location: admin/index.php");
            $row = mysqli_fetch_row($r);     
             $_SESSION['id'] = $row[0];
            $_SESSION['username'] = $row[9];
            $_SESSION['password'] = $row[1];
            $_SESSION['phone'] = $row[8];
         
        }else {

//check if its a an admin
            $qq = "SELECT * FROM  users WHERE username = '$username' AND password = '$password' AND account_type='user'";
            $rr = mysqli_query($con, $qq);

            if (mysqli_num_rows($rr) == 1) {
                    header("Location: user/index.php");
//redirect to admin account
            $row = mysqli_fetch_row($rr);     
           $_SESSION['id'] = $row[0];
            $_SESSION['username'] = $row[9];
            $_SESSION['password'] = $row[1];
            $_SESSION['phone'] = $row[8];
            
            } else {
                // check if it is a head of unit
                $qq = "SELECT * FROM  users WHERE username = '$username' AND password = '$password' AND account_type='c'";// AND program_id = id
                $rr = mysqli_query($con, $qq);

                if (mysqli_num_rows($rr) == 1) {
                   header("Location: user/index.php");
                    // redirect to head of unit page
                $row = mysqli_fetch_array($rr);
                    $_SESSION['id'] = $row[0];
                    $_SESSION['username'] = $row[9];
                    $_SESSION['password'] = $row[1];
                    $_SESSION['phone'] = $row[8];
                    
                } else {
                     $qq = "SELECT * FROM admin WHERE username = '$username' AND password = '$password' AND userType = 'Hod'";
                $rr = mysqli_query($con, $qq);
                
                    if(mysqli_num_rows($rr) == 1){
                         header("location: ../hod/index.php");
                 $row = mysqli_fetch_array($rr);
                $_SESSION['id'] = $row['admin_id'];
                $_SESSION['name'] = $row['admin_name'];
                $_SESSION['type'] = "Hod";
                    }  else {
                        $error='Invalid username or password';
                       header("Location: login.php?error=$error"); 
                    }
                }
            }
    }
    } else {
            $error='Invalid username or password';
        }
?>
