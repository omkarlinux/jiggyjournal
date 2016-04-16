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

    <!-- To make sure that people who do not login cannot access ListView Page -->
    
    <?php
        session_start();
        if(empty($_SESSION['userid']))
            {
                header("Location: index.php");
            }
    ?> 
    <!-- Main Content-->
    <header>
        <div class="main-content container">
            <div class="row">
                <div class="col-lg-12"> <br/>
                    <!--<img class="img-responsive" src="img/profile.png" alt="">-->
                    <div class="intro-text">
                    
                        <hr class="star-light">
                       <div class="jumbotron">
                           
                             <div class="row">
                                   <span class="col-md-7">
                                       <p class="text-left"><b>Welcome, <?php if(!empty($_SESSION['fname'])){echo $_SESSION['fname'];} ?></b>- Create your life in words and pictures!!</p>
                                   </span>
                                   <span class="col-md-5 col-md-offset-0 text-right">
                                       <a href="EditJournal.php" class="btn btn-success btn-sm"><span class="badge"><span class="glyphicon glyphicon-plus"></span></span> Add New Entry</a>
                                   </span>
                                </div> <br/>
                                

	<?PHP
		if(isset($_SESSION['userid']))
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
			$userid = $_SESSION['userid'];
			$query = mysqli_query($conn, "SELECT * FROM journal WHERE user_id='$userid' ORDER by date desc");
			$numrows = mysqli_num_rows($query);
			if($numrows!==0)
			{
				?>
				<div class="panel-group">
				<?php 
				for($x=$numrows; $x>=1; $x--)
				{
					if($row = mysqli_fetch_assoc($query))
					{
					$title = $row['title'];
					$content = $row['content'];
					$date = $row['date'];
					$journal_id=$row['journal_id'];
		?>
                            
                                <div class="post panel panel-success">
									<div class="id"><?php echo $journal_id ;?></div>
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-8 text-left">
                                               <?php echo $title; ?>
                                            </div>
                                            <div class="col-md-1">

                                            <form action = "EditJournal.php" method="post" >
                                                <input type="hidden" name="edit_id" value="<?php echo $journal_id; ?>" />
                                                <button type="submit" name="edit" value="edit" class="btn btn-link" title="Edit Entry" data-toggle="tooltip" data-placement="bottom"><span class="badge"> <span class="glyphicon glyphicon-pencil"></span></span></button>			
											</form>
                                            </div>
                                            <div class="col-md-1">
											<form action = "delete.php" onclick="return confirm('Are you sure you want to delete?')" method="post" >
                                                <input type="hidden" name="journal_id" value="<?php echo $journal_id; ?>" />
                                                <button type="submit" name="delete" value="delete" class="btn btn-link" title="Delete Entry" data-toggle="tooltip" data-placement="bottom"><span class="badge"><span class="glyphicon glyphicon-remove"></span></span></button>
											</form>
											</div>

                                            <div class="col-md-2 col-md-offset-0">
                                              <?php /*echo $date; echo strptime($date,"m-d-Y"); echo date("F j, Y",strptime($date,"m-d-Y")); */
                                              /* echo $mydate = strtoTime($date); echo $printdate = date('F j, Y', $mydate); */
											  echo $printdate=date('F,j,Y', strtoTime($date));
											  ?>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="panel-body text-justify">
									<div class="row"> 
									<div class="col-md-3">
									<img src="img/picture.jpg" class="img-thumbnail" alt="Image" style="height:180px; width:300px;" />
									</div>
									<div class="col-md-9">
									<?php echo $content; ?>
									</div>
									</div>
									</div>
                                </div>
                                
                            
							
					<?php 
					} 
				}
			?>
			</div>				
			<?php 
			}
			else
			{
			?>
				Nothing to see here. Move along.
			<?php 
			}
		}
		?>
                    
                        
                    </div>
                </div>
				<hr class="star-light">
            </div>
        </div>
    </header>

    <?php
        require 'includes/footcode.php';
        require 'includes/footer.php';
    ?>
</body>

</html>
