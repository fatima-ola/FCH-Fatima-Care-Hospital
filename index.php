<?php include_once('lib/header.php'); ?>
<p>
    <?php
        if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
            echo "<span style = 'color: green'>" .$_SESSION['message']. "</span>";
            session_destroy();
        }
    ?>
</p>
    Wlcome to FCH-Fatima Care Hospital: Giving highest quality healthcare <br/><hr />
    <p>This is a specialist hospital that gives healthy care to her patient!</p>
    <p>We cure, God heal</p>
<?php include_once('lib/footer.php'); ?>
