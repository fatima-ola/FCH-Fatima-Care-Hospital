<?php session_start();
// connecting pages together
// print_r($_POST);

//collecting the data

$errorCount = 0;

//verifying the data, validating the data

$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] : $errorCount++;
$last_name = $_POST['last_name'] != "" ? $_POST['last_name'] : $errorCount++;
$email= $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;
$gender = $_POST['gender'] != "" ? $_POST['gender'] : $errorCount++;
$designation = $_POST['designation'] != "" ? $_POST['designation'] : $errorCount++;
$department = $_POST['department'] != "" ? $_POST['department'] : $errorCount++;

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;




if($errorCount > 0){
    //redirect back and display error
    //header("Location: register.php? message=something went wrong with the submission");
    /* $_SESSION["error"] = "You have " . $errorCount . " errors in your form submission";*/

    


    $session_error = "You have " . $errorCount . " error";

    if($errorCount > 1){
        
        $session_error .= "s";
    }

    $session_error .= " in your form submission";
    $_SESSION["error"] = $session_error;

    header("Location: register.php");
}else{
    
    
    //count all users

    $allUsers = scandir("db/users/");
    
    $countAllUsers = count($allUsers);

    $newUserId = ($countAllUsers-1);

    $userObject = [
        'id'=>$newUserId,
        'first_name' =>$first_name,
        'last_name' =>$last_name,
        'email' =>$email,
        'password' =>password_hash($password, PASSWORD_DEFAULT), //password hashing
        'gender' =>$gender,
        'designation' =>$designation,
        'department' =>$department
    ];

    //check if the user already exists.
    //Assign ID to the user,
    // ***count all the users
    // ***assign the next id to the new user
    // count($users) => 2, next user should then be id = 3

    //look into the database array, and check if the email already exists...
    // loop

    

    for($counter = 0; $counter < $countAllUsers; $counter++){
        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json"){
            $_SESSION["error"] = "Registration Failed, User Alreay Exists ";
            header("Location: register.php");
            die();
        }
    }

    //validating name
    

    //save in the database
    file_put_contents("db/users/". $email . ".json", json_encode($userObject));
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
    $_SESSION["error"] = "Your name can only contain letters and white space" ;
    header("Location: register.php");
}

// validate last name
if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
    $_SESSION["error"] = "Your name can only contain letters and white space" ;
    header("Location: register.php");
}



//saving the data into the database/our filesystem / our folder

//return back to the page, with a status message

?>