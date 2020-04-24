<?php session_start ();
include_once('library/header.php');

if(!isset($_SESSION['loggedin'])){
    header("location: login.php");
}

?>

<h3> Patients Dashboard </h3>

Welcome, <?php echo $_SESSION['fullName'] ?>, You are logged in as (<?php echo $_SESSION['role']?>), and your ID is <?php echo $_SESSION['loggedin'] ?>






<?php
include_once('library/footer.php');

?>