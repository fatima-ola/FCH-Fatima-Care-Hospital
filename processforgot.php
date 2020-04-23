<?php session_start();
require_once('functions/alert.php');

//collecting data
$errorCount = 0;

$email= $_POST['email'] != "" ? $_POST['email'] : $errorCount++;

$_SESSION['email'] = $email;

if($errorCount > 0){
    $session_error = "You have " . $errorCount . " error";

    if($errorCount > 1){
        
        $session_error .= "s";   
    }

    $session_error .= " in your form submission";
    $_SESSION["error"] = $session_error;
    set_alert('error', $session_error);
    header("Location: forgot.php");

}else{
    
    $allUsers = scandir("db/users/"); 
    $countAllUsers = count($allUsers);

    for($counter = 0; $counter < $countAllUsers; $counter++){

        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json"){
            //send the mail, then redirect to the reset password page.
            /** 
            *GENERATING TOKEN CODE starts
            **/
            $token = "";

            $alphabets =['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o',
            'p','q','r','s','t','u','v','w','x','y','z'];

            for($i = 0; $i < 26; $i++){
               $index = mt_rand(0, count($alphabets) - 1);
               $token .= $alphabets[$index];
            }

            /** 
            *GENERATING TOKEN CODE ends
            **/

            $subject = "Password Reset Link";
            $message = "A password reset has been initiated from your account, if you
            did not initiate this reset, please ignore this message, otherwise, visit: localhost/FCH/reset.php?token=".
            $token;
            $headers = "From: no-reply@fch.org" . "\r\n" .
            "CC: fatima@fch.org";

            file_put_contents("db/tokens/". $email . ".json", json_encode(['token' =>$token]));
   
           
               
            $try = mail($email,$subject,$message,$headers);
            
                if($try){
                    //display success message
                    $_SESSION["message"] = "Password reset has been sent to your email: " . $email;
                    header("Location: login.php");
                   
                }else{
                    //display error message
                    $_SESSION["error"] = "Something went wrong, we could not send password reset to: " . $email; 
                    header("Location: forgot.php");
                       
                }
            die();
 
        }
    }

    $_SESSION["error"] = "Email not registered with us ERR: " . $email;
    header("Location: forgot.php");
    
}

?>