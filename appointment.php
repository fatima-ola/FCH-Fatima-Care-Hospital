<?php include_once('lib/header.php');
require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/user.php');

?>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <h3>Book Appointment</h3>
    </div>
    <div class="row h-100 justify-content-center align-items-center">
        
        <form method="POST" action="processappoint.php">
    
                
            <p>
                <label lass="label" for="Full Name">Full Name</label><br>
                <input type="text" class="form-control" name="full_name" placeholder="Full Name">
            </p>

            <p>
                <label class="label" for="Phone Number">Phone Number</label><br>
                <input type="text" class="form-control" name="phone number" placeholder="Phone Number">
            </p>
            <p>
                <label class="label" for="birthdate">Date of Birth</label><br>
                <input type="date" class="form-control" name="birthdate">
            </p>
        
            <p>
                <label class="label" for=" Date of appointment">Date of Appointment</label><br>
                <input type="date" class="form-control" name="appointment">
            </p>
            <p>
                <label class="label" for="Time of Appointment">Time of Appointment</label><br>
                <input type="time" class="form-control" name="appointment">
            </p>     
            <p>
                <label class="label" for="Nature of Appointment">Nature of Appointment</label><br>
                <select >
                    <option>consultation</option>
                    <option>Dental Section</option>
                    <option>Caesarian Section</option>
                    <option>General Surgery</option>
                    <option>Other</option>
                </select> 
                    
            </p>
            <p>
               <label class="label" for="Initial Complaint">Initial Complaint</label><br>
               <textarea  cols="40" rows="3" placeholder="Write your complaint here..."></textarea> 
            </p>

            <p>
                <button class="btn btn-sm btn-primary" type="submit">Submit Form</button>
            </p>
            <p>
                <a href="patient.php">Go Back</a>
            </p>
        </form>
    </div>
</div>
<?php include_once('lib/footer.php'); ?>