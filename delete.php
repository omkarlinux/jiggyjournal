 
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
    <!-- Delete script -->
    <?php
        //If delete button is called
        if(isset($_POST['delete']))
        {
            del($journal_id);
        }
    
        function del($journal_id)
        {/* Delete journal entry from database */
        
            $connobj = new Connection;
            
            $delete_id = $_POST['journal_id'];

            // Database connection setup
            $connobj = new Connection;
            
            $sql=  "DELETE FROM journal WHERE journal_id='$delete_id';";
            if( $connobj->query($sql) === TRUE)
            { 
            ?> 	
            <header>
                <div class="main-content container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="intro-text">
                                <br/><br/><br/>
                                <h3>Deleted successfully</h3>
                                <hr class="star-light"
                                <br/><br/><br/>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
                <?php }
            else 
            {
                echo "Not deleted";
            }
            header("refresh:1; url=ListView.php");
        }
    ?>
	
    <?php
        require 'includes/footcode.php';
        require 'includes/footer.php';
    ?>
</body>

</html>
 
?>
>>>>>>> origin/master
