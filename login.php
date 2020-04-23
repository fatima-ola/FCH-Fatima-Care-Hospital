<?php  include_once('lib/header.php');
    require_once('functions/alert.php');

if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    //redirect to dashboard
    header("Location: dashboard.php");
}
?>

<h3>Login</h3>
<p>
    <?php print_alert(); ?>
</p>

<form method = "POST" action = "processlogin.php">
    <p>
        <label>Email</label><br />
        <input 
        <?php
            if(isset($_SESSION['email'])){
                echo "value=" . $_SESSION['email'];
            }
        ?>
        type="text" name="email" placeholder ="Enter Your Email Address Here..." >
    </p>
    <p>
        <label>Password</label><br />
        <input type="password" name="password" placeholder ="Enter Your Password Here..." >
    </p>
    <p>
        <button type="submit">Login</button>
    </p>
</form>
<?php include_once('lib/footer.php') ?>    