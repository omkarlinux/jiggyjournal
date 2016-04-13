<!DOCTYPE html>
<html lang="en">

<?php
    require 'includes/headcode.php';
?>

<body id="page-top" class="index">

    <!-- Navigation -->
<?php
    require 'includes/topNavigation.php';
?>

    <!-- Main Content-->
        <div class="container" style="margin-top:100px">

            <div class="row">
                <div class="col-lg-12">
                    <!--<img class="img-responsive" src="img/profile.png" alt="">-->
                    <div class="intro-text">
					<h1 style="text-align:center">Connection to Server</h1>                    
					 <hr class="star-light">
                     <div id="connectionTest">
                         <?php 
                            echo php_ini_loaded_file;
                            phpinfo();
                         ?>
                    </div>
                </div>
            </div>
        </div>

    <?php
        require 'includes/footcode.php';
        require 'includes/footer.php';
    ?>
</body>

</html>				
