<?php session_start();
    require_once('functions/user.php');

$errorCount = 0;

//collecting the data, validating the data
$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] : $errorCount++;
$last_name = $_POST['last_name'] != "" ? $_POST['last_name'] : $errorCount++;
$email= $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;
$gender = $_POST['gender'] != "" ? $_POST['gender'] : $errorCount++;
$designation = $_POST['designation'] != "" ? $_POST['designation'] : $errorCount++;
$department = $_POST['department'] != "" ? $_POST['department'] : $errorCount++;

// saving into session variables.
$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;


if($errorCount > 0){
    $session_error = "You have " . $errorCount . " error";

    if($errorCount > 1){
        
        $session_error .= "s";
    }

    $session_error .= " in your form submission";
    $_SESSION["error"] = $session_error;
    header("Location: register.php");

}else{
    

    $newUserId = ($countAllUsers-1);

    $userObject = [
        'id'=>$newUserId,
        'first_name' =>$first_name,
        'last_name' =>$last_name,
        'email' =>$email,
        'password' =>password_hash($password, PASSWORD_DEFAULT), 
        'gender' =>$gender,
        'designation' =>$designation,
        'department' =>$department
    ];  

    //check if the user already exists.

     $userExists = find_user($email);
    
        if($userExists){
            $_SESSION["error"] = "Registration Failed, User Alreay Exists ";
            header("Location: register.php");
            die();
        }
    

    //save in the database
    save_user($userObject);
    $_SESSION["message"] = "Registration Successful, you can now login! " .$first_name . "  ". $last_name;
    header("Location: login.php");
}

// Validating email 
if (!stristr($email,"@") OR !stristr($email,".")) {
    $_SESSION["error"] = "Your email address is not correct";
    header("Location: register.php");
} 

// validate first name 

if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
    $_SESSION["error"] = "Your First name can only contain letters and white space" ;
    header("Location: register.php");
}

// validate last name

if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
    $_SESSION["error"] = "Your Last name can only contain letters and white space" ;
    header("Location: register.php");
}

//saving the data into the database/our filesystem / our folder

//return back to the page, with a status message

?>