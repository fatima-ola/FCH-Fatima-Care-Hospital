<?php  include_once('lib/header.php'); 
    require_once('functions/redirect.php');
if(!isset($_SESSION['loggedIn']) ){
    //redirect to dashboard
    redirect_to("login.php");
}
?>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <h3>Dashboard</h3> 
    </div>
    <div class="row h-100 justify-content-center align-items-center">
            Welcome, <?php echo $_SESSION['fullname'] ?>, You are logged in as (<?php echo
            $_SESSION['role'] ?>),and your ID is <?php echo $_SESSION['loggedIn'] ?>
    </div>
    <div class="row h-100 justify-content-center align-items-center">
        <span style="margin: 5px;"><a class="btn btn-bg btn-outline-primary" href="appointment.php">Book Appointment</a></span>
        <span style="margin: 5px;"><a class="btn btn-bg btn-outline-primary" href="paybill.php">Pay Bill</a></span>
    </div>
</div>




<?php include_once('lib/footer.php'); ?>