<?php session_start();
require_once('functions/user.php');
require_once('functions/alert.php');
require_once('functions/redirect.php');

    

$errorCount = 0;

//collecting the data, validating the data
$full_name = $_POST['full_name'] != "" ? $_POST['full_name'] : $errorCount++;
$phone_number = $_POST['phone_number'] != "" ? $_POST['phone_number'] : $errorCount++;
$birth_date= $_POST['birth_date'] != "" ? $_POST['birth_date'] : $errorCount++;
$appointment = $_POST['appointment'] != "" ? $_POST['appointment'] : $errorCount++;
$time_appointment = $_POST['time_appointment'] != "" ? $_POST['time_appointment'] : $errorCount++;
$nature = $_POST['nature'] != "" ? $_POST['nature'] : $errorCount++;
$complaint = $_POST['complaint'] != "" ? $_POST['complaint'] : $errorCount++;

// saving into session variables.
$_SESSION['full_name'] = $full_name;  
$_SESSION['phone_number'] = $phone_number;
$_SESSION['birth_date'] = $birth_date;
$_SESSION['appointment'] = $appointment;
$_SESSION['time_appointment'] = $time_appointment;
$_SESSION['nature'] = $nature;
$_SESSION['complaint'] = $complaint;


if($errorCount > 0){
    $session_error = "You have " . $errorCount . " error";

    if($errorCount > 1){
        
        $session_error .= "s";
    }

    $session_error .= " in your form submission";
    $_SESSION["error"] = $session_error;
    header("Location: appointment.php");

}else{
    

    $newUserId = ($countAllUsers-1);
    
    $userObject = [
        'id'=>$newUserId,
        'full_name' =>$full_name,
        'phone_number' =>$phone_number,
        'birth_date' =>$birth_date,
        'appointment' =>$appointment, 
        'time_appointment' =>$time_appointment,
        'nature' =>$nature,
        'complaint' =>$complaint
    ];  


    $userExists = find_appoint($full_name);
    
        if($userExists){
            $_SESSION["error"] = "Registration Failed, User Alreay Exists ";
            header("Location: appointment.php");
            die();
        }
    

    //save in the database
    save_appoint($userObject);
    $_SESSION["message"] = "Booking of Appointment Successful, you can now Pay! " .$full_name;
    header("Location: paybill.php");
    
}




?>

