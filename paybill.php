<?php include_once('lib/header.php');
require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/user.php');

?>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <h3>Pay Bill</h3>
    </div>
    <div class="row h-100 justify-content-center align-items-center">
        
        <form method="POST" action="processbill.php">
            <p>
                <?php print_alert(); ?>
            </p>
                
            <p>
                <label lass="label" for="Full Name">Full Name</label><br>
                <input type="text" class="form-control" name="full_name" placeholder="Full Name">
            </p>

            <p>
                <label class="label" for="Email">Email Address</label><br>
                <input type="text" class="form-control" name="email" placeholder="Email Address">
            </p>
            <p>
                <label class="label" for="Phone Number">Phone Number</label><br>
                <input type="text" class="form-control" name="phone_number" placeholder="Phone Number">
            </p>
            <p>
                <label class="label" for="Amount">Amount</label><br>
                <input type="text" class="form-control" name="amount" placeholder="NGN: 3000">
            </p>
            <p>
                <button class="btn btn-sm btn-primary" name="pay" type="submit">Make Payment</button>
            </p>
            <p>
                <a href="patient.php">Go Back</a>
            </p>
        </form>
    </div>
</div>
<?php include_once('lib/footer.php'); ?>