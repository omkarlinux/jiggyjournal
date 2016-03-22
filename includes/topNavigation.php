<!-- Login Validation Code PHP -->
<?php
	
	session_start();                    // Check later
	
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
			if($row = mysqli_fetch_assoc($query))
			{
			$dbpassword = $row['password'];
			$dbuserid = $row['user_id'];
			}
		
			if($password==$dbpassword)
			{
				@$_SESSION['username'] = $username;         //Check later
                header("Location: ListView.php");        	//Redirect to User's List view page
			}
			else
            {
                //Password & username are incorrect
                $error = "Password is incorrect. Try again";
            }
		}
		else
        {
            $error = "User doesn't exist!";
        }
	}
?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span>
                <img src="img/JiggyJournalIcon.png" style="height:55px; width:55px;float:left;">
                <a href="index.php#page-top" class="navbar-brand">iggy Journal</a>
            </span>  
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="page-scroll">
                    <a href="register.php">Register</a>
                </li>
                <li class="hidden">
                    <a href="index.php#page-top"></a>
                </li>
                <li class="page-scroll">
                    <a href="index.php#FAQ">FAQ's</a>
                </li>
                <li class="page-scroll">
                    <a href="about.php">About US</a>
                </li>
                <li class="page-scroll">
                    <a href="index.php#contact">Contact</a>
                </li>
				<?php if(isset($username)): echo ' open'; endif;?>
                <li class="dropdown<?php if(isset($error)): echo ' open'; endif;?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if(isset($error)): ?>
                                        <span><?php echo $error; ?></span>
                                    <?php endif; ?>
                                    <form action="<?php echo basename($_SERVER['PHP_SELF']);?>" method="post" class="form" id="login-form">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email address" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" required>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Remember me
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block" value="login">Sign in</button>
                                        </div>
                                        <div class="help-block text-right"><a href="">Forgot password?</a></div>
                                    </form>
                                </div>
                                <div class="bottom text-center">
                                    New here ? <a href="register.php"><b>Join Us</b></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>