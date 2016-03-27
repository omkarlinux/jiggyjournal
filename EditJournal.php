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

    <!-- To make sure that people who do not login cannot access the EditJournal Page -->
    <!--
<?php/*
if(empty($_SESSION['userid']))
    {
        header("Location: index.php");
    }*/
?>  -->
			<!--Database PHP --!>
            <?php
                if($_SERVER['REQUEST_METHOD'] === 'POST')
                {//something posted
                    if (isset($_POST['save'])) //Trying to save
                    {
                        if($_POST['action'] == "update") //If we are editing existing post. We update it.
                        {
                            update_post();
                        }
                        elseif($_POST['action'] == "create")
                        {                         //Otherwise we create a new post
                            create_post();
                        }
                    }
                    elseif (isset($_POST['delete'])) 
                    {
                    include ("delete.php");   
                    }
                    if(isset($_POST['edit']) && empty($_POST['save']))
                    {
                        get_post_from_database();
                    
                    }

                }               
				
                function get_post_from_database()
                {                    
                    $connobj = new Connection;
                    
                    $GLOBALS['journal_id'] = $edit_id = $_POST['edit_id'];
                    $sql = "SELECT * FROM journal WHERE journal_id='$edit_id';";
                    $connobj->query($sql);
                    if($row = $connobj->fetch())
                    {
                        $GLOBALS['title'] = $row['title'];
                        $GLOBALS['content'] = $row['content'];
                        $phpDate = strtotime($row['date']);
                        $date = $date('m/d/Y',$time);
                        $GLOBALS['date'] = $row['date'];
                    }
                }
                
				function create_post()
				{
	
					$connobj = new Connection;
                    
					$title = $_POST["title"];
					$content = $_POST["content"];
					$date = $_POST["date"];
					$userid = $_SESSION["userid"];
					$sql = "INSERT INTO journal(title,content, date, user_id) VALUES ('$title','$content' , STR_TO_DATE('$date', '%m/%d/%Y'),'$userid');";
					
					if ($connobj->query($sql)) 
					{
						return true;
					} 
					else 
					{
						return false; 
					}
  
                    header("Location: ListView.php");
				}
                
                function update_post()
                {
                    $connobj = new Connection;
                    
					$title = $_POST["title"];
					$content = $_POST["content"];
					$date = $_POST["date"];
					$userid = $_SESSION["userid"];
                    $journal_id = $_POST['journal_id'];
                    if (isset($journal_id))
                    {
					    $sql = "UPDATE journal 
                                    SET title = '$title', 
                                        content = '$content', 
                                        date = STR_TO_DATE('$date', '%m/%d/%Y'), 
                                        user_id = '$userid'
                                    WHERE journal_id = '$journal_id';";
                    }
					if ($connobj->query($sql)) 
					{
						$result = true;
					} 
					else 
					{
						$result = false; 
					}
                    header("Location: ListView.php");
                }
			?>
    <!-- Main Content -->
    <header>
        <div class="main-content container">
            <div class="row">
                <div class="col-lg-12"> <br/>
                    <div class="intro-text">
                      <hr class="star-light">
                       <div class="jumbotron">
                            <form action="EditJournal.php" method="post" >
                                <input type="hidden" name="action" value="<?php if(isset($_POST['edit'])){echo 'update';}
                                                                                else{echo 'create';} ?>" />
                                <div class="panel-group">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-7 text-left">
                                                  <span class="glyphicon glyphicon-paperclip"></span> Edit Post
                                                </div>
                                                <div class="col-md-1 col-md-offset-3">
                                                    <button class="btn btn-primary btn-xs" type="submit" name="save">Save</button>
                                                </div>
                                                <div class="col-md-1 col-md-offset-0">
                                                    <button class="btn btn-primary btn-xs" type="submit" name="delete" onClick="submitAction('delete.php')">Delete</button>
                                                    <!--<a title="Delete Journal"><img src="img/deleteIcon.png" alt="Delete" /></a>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body" style="margin:2px 15px 2px 15px !important;">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-2">
                                                        <label for="Entry" class="text-left">Journal Title:</label> <br /><br /><br />
                                                        <label for="EntryDate" class="text-left">Entry Date:</label> <br /><br /><br />
                                                        <label for="Entry" class="text-left">Journal Entry:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="hidden" name="journal_id" value="<?php echo $GLOBALS['journal_id']; ?>" />
                                                        <input type="text" class="form-control" name="title" value="<?php if($numrows!==0){ echo $GLOBALS['title']; } ?>"><br />
                                                        <div class='input-group date'>
                                                            <input type='text' class="form-control" name="date" value="<?php if($numrows!==0){ echo $GLOBALS['date']; } ?>"/>
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                         </div><br />
                                                        <textarea name="content" class="form-control col-md-10" rows="5" ><?php if($numrows!==0){ echo $GLOBALS['content']; } ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>Utah State University<br>Logan, UT 84321</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About JiggyJournal</h3>
                        <p>JiggyJournal is a free to use, open source online journal created by <a href="about.html">JiggyJournal</a>.</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Jiggy Journal 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/cabin.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>
                                    Client:
                                    <strong>
                                        <a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>
                                    Date:
                                    <strong>
                                        <a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>
                                    Service:
                                    <strong>
                                        <a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/cake.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>
                                    Client:
                                    <strong>
                                        <a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>
                                    Date:
                                    <strong>
                                        <a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>
                                    Service:
                                    <strong>
                                        <a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/circus.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>
                                    Client:
                                    <strong>
                                        <a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>
                                    Date:
                                    <strong>
                                        <a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>
                                    Service:
                                    <strong>
                                        <a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/game.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>
                                    Client:
                                    <strong>
                                        <a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>
                                    Date:
                                    <strong>
                                        <a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>
                                    Service:
                                    <strong>
                                        <a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/safe.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>
                                    Client:
                                    <strong>
                                        <a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>
                                    Date:
                                    <strong>
                                        <a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>
                                    Service:
                                    <strong>
                                        <a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/submarine.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>
                                    Client:
                                    <strong>
                                        <a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>
                                    Date:
                                    <strong>
                                        <a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>
                                    Service:
                                    <strong>
                                        <a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php
        require 'includes/footer.php';
    ?>
</body>

</html>
