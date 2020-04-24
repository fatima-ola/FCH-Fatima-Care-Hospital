<?php  include_once('lib/header.php');
    require_once('functions/alert.php');
    require_once('functions/redirect.php');

if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    //redirect to dashboard
   redirect_to("dashboard.php");
}
?>
<div class="container">
    <div class="row h-100 justify-content-center align-items-center">
        <h3>Login</h3>
    </div>
    <div class="row h-100 justify-content-center align-items-center">
       <form method = "POST" action = "processlogin.php">
        <p>
            <?php print_alert(); ?>
        </p>
            <p>
                <label>Email</label><br />
                <input 
                <?php
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];
                    }
                ?>
                type="text" class="form-control" name="email" placeholder ="Your Email Address Here..." >
            </p>
            <p>
                <label>Password</label><br />
                <input type="password" class="form-control" name="password" placeholder ="Your Password Here..." >
            </p>
            <p>
                <button class="btn btn-sm btn-primary" type="submit">Login</button>
            </p>
            <p>
                <a href="forgot.php">Forgot Password</a> <br />
                <a href="register.php">Don't have an account? Register</a>
            </p>
        </form>
    </div>
</div>
<?php include_once('lib/footer.php') ?>    