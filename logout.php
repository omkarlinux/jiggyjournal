<!DOCTYPE html>
<html lang="en">

<?php
    require 'includes/headcode.php';
?>

<body id="page-top" class="index">
 
    <!-- Logout script -->
    <?php
        session_start();
        unset($_SESSION['userid']);
        unset($_SESSION['fname']);
        
        header("refresh:2; url=index.php");
    ?>
    
    <!-- Navigation -->
    <?php
        require 'includes/topNavigation.php';
    ?>

    <!-- Main Content -->
    <header>
        <div class="main-content container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <br/><br/><br/>
                        <h3>Logout successful!</h3>
                        <hr class="star-light"
                        <br/><br/><br/>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php
        require 'includes/footcode.php';
        require 'includes/footer.php';
    ?>
</body>

</html>