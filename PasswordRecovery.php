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
                                        <div class="panel-heading text-left">
                                              Forgot your Password? 
                                          </div>
                                        
                                        <div class="panel-body" style="margin:2px 15px 2px 15px !important;">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-5 text-left">
													    <label for="entryDate">Enter your Email Address:</label> <br /><br /><br />
                                                        <label for="selectQuestion">Your Security Question is:</label> <br /><br /><br />
                                                        <label for="addQuestion">Please Enter your Password</label> <br /><br /><br />
                                                        
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control input-sm" id="emailId" required><br />
                                                        <select class="form-control btn-sm" id="selectedquestion">
                                                            <option> What is your first pet's name?</option>
                                                        </select>
                                                        <br/>
                                                       <input type="text" class="form-control input-sm" id="answer" required><br />
                                                         <button class="btn btn-primary btn-sm text-left" type="submit" name="reset">Reset Password</button>&nbsp; &nbsp;&nbsp;&nbsp; 
                                                         <button class="btn btn-primary btn-sm text-left" type="submit" name="cancel">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
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
