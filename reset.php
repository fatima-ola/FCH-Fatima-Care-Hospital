<?php include_once('lib/header.php'); 
    require_once('functions/alert.php');
    require_once('functions/user.php');


if(!is_user_loggedIn() && is_token_set()){
    $_SESSION["error"] = "You are not authorized to view that page"; 
    header("Location: login.php");
}
?>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
    <h3>Reset Password</h3>
    </div>
    <div class="row h-100 justify-content-center align-items-center">
        <p>Reset password associated with your account: [email]</p>
    </div>
    <div class="row h-100 justify-content-center align-items-center">
        <form action="processreset.php"  method="POST">
            <p>
                <?php print_alert(); ?>
            </p>
            <?php if(!is_user_loggedIn()) { ?>
            <input 
            <?php              
                if(is_token_set_in_session()){
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

            type="text" name="email" placeholder="Your Email Here..."  />
            </p>

            <p>
                <label>Enter New Password</label><br />
                <input type="password" name="password" placeholder ="Your Password Here...">
            </p>
            <p>
                <button type="submit">Send Reset Code</button>
            </p>
        </form>
    </div>
</div>
  
 


<?php include_once('lib/footer.php') ?>    