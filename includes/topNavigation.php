<!-- Login Validation Code PHP -->
<!-- Commented so that any errors don't actually show up on screen but php is still processed
<?php
	
    ob_start();
	session_start();
	
	$username = $_POST['email_id'];
	$password = $_POST['passwrd'];
	
	if($username&&$password)
	{
	   //Create connection object
       		$conn = new Connection;
	   // Check connection
		if (!$conn) 
		{
			die("Connection failed: ");
		} 
       
	  $sql = "SELECT * FROM user WHERE u_email='$username'";
      $conn->query($sql);
	  $numrows = $conn->rows();
	
		if($numrows!==0)
		{
			if($row = $conn->fetch())
			{
			$dbpassword = $row['password'];
			$dbuserid = $row['user_id'];
			$dbfname = $row['u_fname'];
			}
		
			if($password==$dbpassword)
			{
				$_SESSION['fname'] = $dbfname;
				$_SESSION['userid'] = $dbuserid;
                header("Location: ListView.php");            //Redirect to User's List view page
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
?> -->
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
                <a href="index.php" class="navbar-brand">IGGY JOURNAL</a>
            </span>  
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
			 <?php if(empty($_SESSION['userid'])) {?>
                <li class="page-scroll">
                    <a href="register.php">REGISTER</a>
                </li>
			 <?php } else { ?>
				<li class="page-scroll">
                    <a href="ListView.php"><?php echo $_SESSION['fname']."'s Journal"  ?></a>
                </li>
			 <?php } ?>
				
                <li class="page-scroll">
                    <a href="index.php#FAQ">FAQ'S</a>
                </li>
                <li class="page-scroll">
                    <a href="about.php">ABOUT US</a>
                </li>
                <li class="page-scroll">
                    <a href="index.php#contact">CONTACT</a>
                </li>
				<?php if(empty($_SESSION['userid']))
						{?>
                <li class="dropdown<?php if(isset($error) or isset($_POST['register'])){ echo ' open'; }?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>LOGIN</b> <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if(isset($error)){ ?>
									<span><?php echo $error; } ?></span>
                                    
                                    <form action="<?php echo basename($_SERVER['PHP_SELF']);?>" method="post" class="form" id="login-form">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email_id" id="inputEmail" placeholder="Email address" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="passwrd" id="inputPassword" placeholder="Password" required>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Remember Me
                                            </label>
                                        </div>
										
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block" value="login">SIGN IN</button>
                                        </div>
                                        <div class="help-block text-right"><a href="PasswordRecovery.php">Forgot password?</a></div>
                                    </form>
                                </div>
                                <div class="bottom text-center">
                                    NEW HERE ? <a href="register.php"><b>JOIN US</b></a>
                                </div>
                            </div>
                        </li>
                    </ul>
					  </li>
						<?php } else {?>
					
						<li class="page-scroll">
						<a href="logout.php">LOGOUT</a>
						</li>
				    
					<?php } ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>