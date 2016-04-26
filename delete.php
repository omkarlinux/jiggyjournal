 
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
            $delete_id = $_POST['journal_id'];
            
            // Database connection setup
            $connobj = new Connection;
            
            //Check if photo exists for journal id
            $sql = "SELECT photoFile FROM journal WHERE journal_id = '$delete_id'";
            $result = $conn->query($sql);
            if ($result->num_rows!==0)
            {
                if($row = $conn->fetch())
                {
                    $photoFile = $row['photoFile'];
                    //If yes, delete existing file from server
                    if(isset($photoFile))
                    {
                        unlink("$target_dir$photoFile");
                    }
                }
            }
            
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
