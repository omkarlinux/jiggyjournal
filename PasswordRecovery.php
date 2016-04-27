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

		<?php
				 if(isset($_POST['go']))
				{
					get_email();
				}
				
				 if(isset($_POST['validate_answer']))
				{
					get_securityanswer();
				}
				
				 if(isset($_POST['reset']))
				{
					get_reset();
				}
			
			
				function get_email()
				{
	
					// Database connection setup
					//Create connection object
					$connobj = new Connection;				
					$emailId = $_POST["emailId"];
				
					
					$sql = "SELECT * FROM user Where u_email=\"$emailId\"";
					$result = $connobj->query($sql);
				
					 if($result->num_rows > 0)
					 {
						if($row = $connobj->fetch())
						{
							$GLOBALS['emailId']= $row['email'];
							$GLOBALS['security']= $row['security'];
						}
					 }
					 else
					 {	 
					  echo("Invalid username, Try again!");
					   
					 }        
				}
				function get_securityanswer()
				{
					$connobj = new Connection;
					
					$answer = $_POST["answer"];
					
									
				}
				function get_reset()
				{
					$connobj = new Connection;
				}
		?>
    <!-- Main Content -->
    <header>
        <div class="main-content container">
            <div class="row">
                <div class="col-lg-12">
                    <!--<img class="img-responsive" src="img/profile.png" alt="">-->
                    <div class="intro-text">
					<h1>Password Recovery</h1>
					 <hr class="star-light">
                        <div class="jumbotron">
                            <div class="about" id="PasswordRecovery">
                                  <div class="panel-group">
                                   <div class="panel panel-success">
                                        <div class="panel-heading">
                                           &nbsp;
                                          </div>
										  
											  
                                        <form action="PasswordRecovery.php" method="post" >
                                        <div class="panel-body" style="margin:2px 15px 2px 15px !important;">
                                            <div id="show-email-row" class="row">
                                                <div class="form-group">
                                                    <div class="col-md-2 text-left">
                                                        <label for="entryDate">Enter Email ID:</label> <br /><br />
                                                    </div>
                                                    <div class="col-md-7 col-md-offeset-2">
                                                        <input type="text" name="emailId" value="<?php echo @$GLOBALS['emailId']; ?>" class="form-control input-sm" id="emailId" required><br />
                                                   </div>
                                                    <div class="col-md-1">
                                                        <button class="btn btn-primary btn-sm" name="go" id="go" type="submit" name="go" value="go">Go</button>
                                                    </div>
                                                </div>
                                            </div>
										</form>
										<form action="PasswordRecovery.php" method="post" >
                                            <div id="show-security-row">
                                                <div class="row">
                                                    <div class="col-md-2 text-left">
                                                        <label for="selectQuestion">Security Question:</label> 

                                                    </div>
                                                    <div class="col-md-7 col-md-offeset-2">
                                                      <span class="form-control disabled text-left input-sm"><?php echo @$GLOBALS['security']; ?></span> 
                                                    </div>
                                                </div><br/>
                                                
                                                <div class="row">
                                                    <div class="col-md-2 text-left">
                                                       
                                                        <label for="addQuestion">Enter your Answer:</label> 

                                                    </div>
                                                    <div class="col-md-7 col-md-offeset-2">
                                                       
                                                        <input type="text" name="answer" class="form-control input-sm" id="answer" required>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button name="validate_answer" class="btn btn-primary btn-sm text-left" type="submit" id="submit" value="submit">Submit</button>
                                                    </div>
                                                </div>
                                    </div>
									</form>
                                    <br/><br/>
									        <form action="PasswordRecovery.php" method="post" >
                                            <div id="show-reset-password">
                                                <h4 class="text-left">Reset your password</h4>
                                                <div class="row">
                                                    <div class="col-md-2 text-left">
                                                        <label>Enter Password:</label>

                                                    </div>
                                                    <div class="col-md-7 col-md-offeset-2">
                                                        <input type="text" name="password" class="form-control input-sm" id="password" >
                                                    </div>
                                                </div><br/>
                                                <div class="row">
                                                    <div class="col-md-2 text-left">

                                                        <label>Confirm Password:</label>

                                                    </div>
                                                    <div class="col-md-7 col-md-offeset-2">

                                                        <input type="text" name="confirmpassword" class="form-control input-sm" id="confirmPassword" >
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button name="reset" class="btn btn-primary btn-sm text-left" type="submit" id="reset" value="reset">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
										</form>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                        <hr class="star-light">
                        
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