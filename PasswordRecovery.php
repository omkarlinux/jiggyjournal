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
                                        <div class="panel-heading">
                                           &nbsp;
                                          </div>
                                        
                                        <div class="panel-body" style="margin:2px 15px 2px 15px !important;">
                                            <div id="show-email-row" class="row">
                                                <div class="form-group">
                                                    <div class="col-md-2 text-left">
                                                        <label for="entryDate">Enter Email ID:</label> <br /><br />
                                                    </div>
                                                    <div class="col-md-7 col-md-offeset-2">
                                                        <input type="text" class="form-control input-sm" id="emailId" required><br />
                                                   </div>
                                                    <div class="col-md-1">
                                                        <button class="btn btn-primary btn-sm" type="submit" name="go">Go</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="show-security-row">
                                                <div class="row">
                                                    <div class="col-md-2 text-left">
                                                        <label for="selectQuestion">Security Question:</label> 

                                                    </div>
                                                    <div class="col-md-7 col-md-offeset-2">
                                                        <span class="form-control disabled text-left input-sm">What is your first pet's name?</span>
                                                    </div>
                                                </div><br/>
                                                
                                                <div class="row">
                                                    <div class="col-md-2 text-left">
                                                       
                                                        <label for="addQuestion">Enter your Answer:</label> 

                                                    </div>
                                                    <div class="col-md-7 col-md-offeset-2">
                                                       
                                                        <input type="text" class="form-control input-sm" id="answer" required>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button class="btn btn-primary btn-sm text-left" type="submit" name="submit">Submit</button>
                                                    </div>
                                                </div>
                                    </div>
                                    <br/><br/>
                                            <div id="show-reset-password">
                                                <h4 class="text-left">Reset your password</h4>
                                                <div class="row">
                                                    <div class="col-md-2 text-left">
                                                        <label>Enter Password:</label>

                                                    </div>
                                                    <div class="col-md-7 col-md-offeset-2">
                                                        <input type="text" class="form-control input-sm" id="password" required>
                                                    </div>
                                                </div><br/>
                                                <div class="row">
                                                    <div class="col-md-2 text-left">

                                                        <label>Confirm Password:</label>

                                                    </div>
                                                    <div class="col-md-7 col-md-offeset-2">

                                                        <input type="text" class="form-control input-sm" id="confirmPassword" required>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button class="btn btn-primary btn-sm text-left" type="submit" name="submit">Submit</button>
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
