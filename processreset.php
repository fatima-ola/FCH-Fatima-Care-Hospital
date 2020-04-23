<?php session_start();

//collecting the data, validating the data

$errorCount = 0;

if(!$_SESSION['loggedIn']){

    $token = $_POST['token'] != "" ? $_POST['token'] : $errorCount++;
    $_SESSION['token'] = $token;
}

$email= $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;

$_SESSION['email'] = $email;

if($errorCount > 0){
    $session_error = "You have " . $errorCount . " error";

    if($errorCount > 1){
        
        $session_error .= "s";
    }

    $session_error .= " in your form submission";
    $_SESSION["error"] = $session_error;
    header("Location: reset.php");

}else{
    $allUserTokens = scandir("db/tokens/"); 
    $countAllUserTokens = count($allUserTokens);

    for($counter = 0; $counter < $countAllUserTokens; $counter++){
        $currentTokenFile = $allUserTokens[$counter];

        if($currentTokenFile == $email . ".json"){
            $tokenContent = file_get_contents("db/tokens/".$currentTokenFile);
            $tokenObject = json_decode($tokenContent);
            $tokenFromDB = $tokenObject->token;

            if($_SESSION['loggedIn']){
                $checkToken = true;
            }else{
                $checkToken = $tokenFromDB == $token;
            }

            if($checkToken){

                $allUsers = scandir("db/users/");
                $countAllUsers = count($allUsers);

                for($counter = 0; $counter < $countAllUsers; $counter++){
        
                    $currentUser = $allUsers[$counter];
            
                    if($currentUser == $email . ".json"){
                        //check password
                        $userString = file_get_contents("db/users/".$currentUser);
                        $userObject = json_decode($userString);
                        $userObject->password = password_hash($password, PASSWORD_DEFAULT);
                
                        unlink("db/users/".$currentUser);

                        file_put_contents("db/users/". $email . ".json", json_encode($userObject));

                        $_SESSION["message"] = "Pssword Reset Successful, you can now login";

                        $subject = "Password Reset Successful";
                        $message = "Your account on FCH has just been updated, your password has changed.
                        If you did not initiate the password change, please visit fch.org and reset your
                        password immediately";
                        $headers = "From: no-reply@fch.org" . "\r\n" .
                        "CC: fatima@fch.org";

                        $try = mail($email,$subject,$message,$headers);
        
                        header("Location: login.php");
                        die();
                    }
                }


               
            }
            
        }
    }

    $_SESSION["error"] = "Password Reset Failed, token/email invalid or expired" ;
    header("Location: login.php");
}

?>