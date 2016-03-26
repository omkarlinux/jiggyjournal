 

 <?php
 if (isset($_POST["delete"]))
 {
	del($journal_id) 
 }
 
function del($journal_id)
 {
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
		$query = mysqli_query($conn, "DELETE * FROM journal WHERE journal_id='$journal_id' ");
 }
?>