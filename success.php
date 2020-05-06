<?php  include_once('lib/header.php'); 
    require_once('functions/redirect.php');
if(!isset($_SESSION['loggedIn']) ){
    //redirect to dashboard
    redirect_to("login.php");
}

$ref = $_GET['txref'];
?>


<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <h3>Dashboard</h3> 
    </div>
    <div class="row h-100 justify-content-center align-items-center">
            Welcome back, <?php echo $_SESSION['fullname'] ?>. Your reference Number is <?php echo $ref  ?>  
    </div>
    <div class="row h-100 justify-content-center align-items-center">
        <p class="text-success"><strong>Payment received successfully</strong></p>    
    </div>
    <div class="row h-100 justify-content-center align-items-center">
        <span style="margin: 5px;"><a class="btn btn-bg btn-outline-primary" href="patient.php">Go Back</a></span>  
    </div>
</div>

<?php include_once('lib/footer.php'); ?>