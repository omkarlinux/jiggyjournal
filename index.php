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
        <div class="main-content">
            <div class="row">
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-pause="false">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <div class="overlay"><h1>Your</h1></div>
                            <img src="img/lifeHands.jpg" alt="image">
                        </div>

                        <div class="item">
                            <div class="overlay"><h1>In words</h1></div>
                            <img src="img/lifeReflectedOn.jpg" alt="image">
                        </div>

                        <div class="item">
                            <div class="overlay"><h1>And Pictures</h1></div>
                            <img src="img/groupSelfie.jpg" alt="image">
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </header>
      <!--FAQ Grid Section -->
    <section id="FAQ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 style="text-align :center">Frequently Asked Questions</h2>
                    <hr class="star-primary">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                        <span class="glyphicon glyphicon-plus-sign"></span> Is there a cost for Jiggy Journal?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    NO!  The basic Jiggy Journal product is free.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                        <span class="glyphicon glyphicon-plus-sign"></span> What if I can’t remember my username or password?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Simply answer the security question and you will be able to reset your information.
                                </div>
                            </div>
                        </div>
                       
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                        <span class="glyphicon glyphicon-plus-sign"></span>  What kinds of photos can I upload?
                                    </a>
                                </h4>
                            </div>

                            <div id="collapse3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    We can accept the following digital photo formats:  .jpg, .png, .tiff, .bmp
                                </div>
                            </div>

                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                        <span class="glyphicon glyphicon-plus-sign"></span> How to contact Jiggy Journal team?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse">
                                <div class="panel-body">
                                    You can reach us by providing your details and a short message in the Contact Us Section. Our team will get back to you as soon as possible.
                                </div>
                            </div>
                        </div>

                         <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                        <span class="glyphicon glyphicon-plus-sign"></span>  WHat's the size of photos can I upload?
                                    </a>
                                </h4>
                            </div>

                            <div id="collapse5" class="panel-collapse collapse">
                                <div class="panel-body">
                                    You can upload photo with a size of 700KB.
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            </div>
    </section>

    

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact US</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php
        require 'includes/footcode.php';
        require 'includes/footer.php';
    ?>
</body>

</html>
