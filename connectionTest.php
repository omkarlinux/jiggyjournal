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
                            // Database connection setup
                            $serverName = "mysql13.000webhost.com";
                            $database = "a2354647_journal";
                            $username = "a2354647_journal";
                            $password = "njoys6900";
                            
                            //Create connection object
                            $conn = new mysqli($serverName, $username, $password, $database);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } 
                            echo "Connected successfully";
                            ?>
                            
                            <h3>List of Users in the Database</h3>
                            <?php
                            //Query User Data
                            $sqlQueryFetchUsers = "select *
from information_schema.referential_constraints
where constraint_schema = 'a2354647_journal'";
                            $usersResult = $conn->query($sqlQueryFetchUsers);
                            
                            if ($usersResult->num_rows > 0){
                                //Output each row
                                while($row = $usersResult->fetch_assoc()){
                                    echo "$row"; 
                                }
                            }
                            else {
                                echo "0 users";
                            }
                            
                            //Close database connection
                            $conn->close();
                            
                             
                         
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
