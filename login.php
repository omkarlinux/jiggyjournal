<?php
	
	session_start();
	
	$username = $_POST['email'];
	$password = $_POST['password'];
	
	if($username&&$password)
	{
	// Database connection setup
		$serverName = "mysql13.000webhost.com";
		$database = "a2354647_journal";
		$user_name = "a2354647_journal";
		$pass_word = "njoys6900";
	   //Create connection object
       		$conn = new mysqli($serverName, $user_name, $pass_word, $database);
	   // Check connection
		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		} 
       
	  $query = mysqli_query($conn, "SELECT * FROM user WHERE u_email='$username'");
	  $numrows = mysqli_num_rows($query);
	
		if($numrows!==0)
		{
			while($row = mysqli_fetch_assoc($query))
			{
			$dbusername = $row['u_email'];
			$dbpassword = $row['paassword'];
			}
		
			if($username == $dbusername&&$password==$dbpassword)
			{
				echo "Welcome user";
				@$_SESSION['username'] = $username;
			}
			else
				echo " password is incorrect!";  
		}
		else
			die("User doesn't exist!");
			
			
	}
	else	die("Please enter a username and password!");
?>
