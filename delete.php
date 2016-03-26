 

 <?php
 if(isset($_POST['delete']))
 {
	$delete_id= $_POST('delete');
	echo $delete_id; 
 }
 
   // Database connection setup
    $serverName = "mysql13.000webhost.com";
	$database = "a2354647_journal";
	$user_name = "a2354647_journal";
	$pass_word = "njoys6900";
	 //Create connection object
	$conn = new mysqli($serverName, $user_name, $pass_word, $database);
	 // Check 
	if ($conn->connect_error) 
	{
	  die("Connection failed: " . $conn->connect_error);	
	} 
		$query = mysqli_query($conn, "DELETE * FROM journal WHERE journal_id='$delete_id' ");
 
 if ($conn->query($sql) === TRUE) 
					{
						$result = "Deleted Successfully";
					} 
					else 
					{
						$result = "Not deleted: " .$sql . "<br>" . mysqli_error($conn); 
					}

					$conn->close();    
                    header("Location: ListView.php");
 }
 
 
?>