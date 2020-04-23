<?php include_once('lib/header.php'); 
    require_once('functions/alert.php');
    require_once('functions/user.php');


if(!is_user_loggedIn() && is_token_set()){
    $_SESSION["error"] = "You are not authorized to view that page"; 
    header("Location: login.php");
}
?>

  <h3>Reset Password</h3>
  <p>Reset password associated with your account: [email]</p>

<form action="processreset.php"  method="POST">
    <p>
        <?php print_error(); print_message(); ?>
    </p>
    <?php if(!is_user_loggedIn()) { ?>
    <input 
        <?php
            if(is_token_set_in_seesion()){
                echo "value='" . $_SESSION['token'] . "'";
            }else{
                echo "value='" . $_GET['token'] . "'";
            }
        
        ?>
    type="hidden" name="token" />
        <?php } ?>


    <p>
    <label>Email</label><br />
    <input 
    <?php
        if(isset($_SESSION['email'])){
            echo "value=" . $_SESSION['email'];
        }

    ?>
    type="text" name="email" placeholder ="Email Address">
    </p>

    <p>
        <label>Enter New Password</label><br />
        <input type="password" name="password" placeholder ="Enter Your Password Here...">
    </p>
    <p>
        <button type="submit">Send Reset Code</button>
    </p>
</form>
<?php include_once('lib/footer.php') ?>    