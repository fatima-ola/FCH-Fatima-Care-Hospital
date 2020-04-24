<?php  include_once('lib/header.php'); 
require_once('functions/alert.php');
if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    //redirect to dashboard
    header("Location: dashboard.php");
}
   
?>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <h3>Register</h3>
    </div>
    <div class="row h-100 justify-content-center align-items-center">
        <p><strong>Welcome, Please Register Here</strong></p>
    </div>
    <div class="row  h-100 justify-content-center align-items-center">
        <p style="color: red;">All Fields are Required</p>
    </div>    
    <div class="row  h-100 justify-content-center align-items-center" >
    <form method = "POST" action = "processregister.php">
        <p>
            <?php print_alert(); ?>
        </p>
            <p>
                <label>First Name</label><br />
                <input 
                <?php
                    if(isset($_SESSION['first_name'])){
                        echo "value=" . $_SESSION['first_name'];
                    }
                ?>
                type="text" class="form-control" name="first_name" placeholder ="Your First Name Here...">
            </p>
            <p>
                <label>Last Name</label><br />
                <input 
                <?php
                    if(isset($_SESSION['last_name'])){
                        echo "value=" . $_SESSION['last_name'];
                    }
                ?>
                type="text" class="form-control" name="last_name" placeholder ="Your Last Name Here...">
            </p>
            <p>
                <label>Email</label><br />
                <input 
                <?php
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];
                    }
                ?>
                type="text"  class="form-control" name="email" placeholder ="Your Email Address Here...">
            </p>
            <p>
                <label>Password</label><br />
                <input  type="password"  class="form-control" name="password" placeholder ="Your Password Here...">
            </p>
            <p>
                <label>Gender</label><br />
                <select  class="form-control" name = "gender" required>
                    <option value="">Select One</option>
                    <option
                    <?php
                    if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){
                        echo "selected";
                    }
                ?>>
                    Male</option>
                    <option
                    <?php
                    if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
                        echo "selected";
                    }
                ?>>
                    Female</option>
                </select>
                
            </p>
            <p>
                <label>Designation</label><br />
                <select class="form-control" name="designation" required>
                    <option value="">Select One</option>
                    <option
                    <?php
                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Team (MT)'){
                        echo "selected";
                    }
                ?>>
                    Medical Team (MT)</option>
                    <option
                    <?php
                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patient'){
                        echo "selected";
                    }
                ?>>
                    Patient</option>
                    <option
                    <?php
                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Admin'){
                        echo "selected";
                    }
                ?>>
                    Admin</option>
                </select>
                
            </p>
            <p>
                <label class="label" for="department">Department</label><br />
                <input 
                <?php
                    if(isset($_SESSION['department'])){
                        echo "value=" . $_SESSION['department'];
                    }
                ?>
                type="text" id="department" class="form-control" name="department" placeholder ="Your Department Here...">
            </p>
            <p>
                <button class= "btn btn-sm btn-success" type="submit">Register</button>
            </p>
            <p>
                <a href="forgot.php">Forgot Password</a> <br />
                <a href="login.php">Already have an account? Login</a>
            </p>
        </form>
    </div>   
        
        
</div>
<?php include_once('lib/footer.php') ?>    