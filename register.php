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
			<div class="main-content container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2>Join US</h2>
						<hr class="star-primary">
					</div>
				</div>
    
			<!--Database PHP --!>
            <?php
				 if(isset($_POST['submit']))
				{
					Register_user();
				}
			
				function Register_user()
				{
	
					// Database connection setup
					$serverName = "mysql13.000webhost.com";
					$database = "a2354647_journal";
					$username = "a2354647_journal";
					$password = "njoys6900";
					
					//Create connection object
					$conn = new mysqli($serverName, $username, $password, $database);

					// Check connection
					if ($conn->connect_error) 
					{
						echo("Connection failed: " . $conn->connect_error);
					} 
					$fname = $_POST["Firstname"];
					$lname = $_POST["Lastname"];
					$email = $_POST["email"];
					$password = $_POST["password"];
					$security_question = $_POST["question"];
					$answer = $_POST["answer"];
					$sql1 = "SELECT * FROM user Where u_email='$email'";
					
				
					 if(mysqli_num_rows($conn->query($sql1)) > 0)
					 {
					 	echo("User already exists with this email!");
					 }
					 else
					 {	 
					  $sql = "INSERT INTO user(u_fname,u_lname, u_email, password, security, answer) VALUES ('$fname','$lname' ,'$email','$password', '$security_question','$answer');";
					
					   if ($conn->query($sql) === TRUE) 
					   {
					 	 echo "Registered successfully";
					   } 
					   else 
					   {
					 	 echo "Not registered: " .$sql . "<br>" . mysqli_error($conn); 
					   }
					 }	
					$conn->close();        
				}
			?>
			<!-- Register -->
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
						<!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
					<form action="register.php" method="post" >
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>FirstName</label>
                                <input type="text" class="form-control" name="Firstname" placeholder="FirstName" id="Firstname" required data-validation-required-message="Please enter your firstname.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
						 <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>LastName</label>
                                <input type="text" class="form-control" name="Lastname" placeholder="Lastname" id="Lastname" required data-validation-required-message="Please enter your lastname.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" id="password" required data-validation-required-message="Please enter your password.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Re-enter Password</label>
                                <input type="password" class="form-control" placeholder="Re-enter Password" id="password1" required data-validation-required-message="Please re-enter your password.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
						<script language="JavaScript" type="text/javascript">
						function getOther(val)
						{
						 if(val==='Other')
						   document.getElementById('question').style.display='block';
							else
						   document.getElementById('question').style.display='none'; 
						}
						</script>
						<div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <br/>
                                <select class="form-control btn-sm register-placeholder" name = "question" onchange="getOther(this.value);" id="question" >
                                    <option>--Select a Security Question--</option>
                                    <option value="What is your first pet's name?">What is your first pet's name?</option>
                                    <option value="What is your favorite color?">What is your favorite color?</option>
                                    <option value="What is your favorite actor's name?">What is your favorite actor's name?</option>
									<option value="Other">Other</option>
                                </select>
								<input type="text" name="question" id="question" style="display:none;">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Enter an Answer</label>
                                <input type="text" class="form-control input-sm" name="answer" placeholder="Enter an anwer" id="answer" required>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <input type="hidden" name="register" value="true" />
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <input type="submit" name ="submit" class="btn btn-success btn-lg" value = "Submit">
                            </div>
                        </div>
                    </form>
                    <br/><br/><br/>
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
