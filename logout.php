<?php
session_destroy($_SESSION['id'] = $row[0]);
    session_destroy($_SESSION['email'] = $row[3]);
    session_destroy($_SESSION['name'] = $row[2]);
    session_destroy($_SESSION['phone'] = $row[6]);
    session_destroy($_SESSION['referral'] = $row[7]);
    
    header("Location: index.php");

?>