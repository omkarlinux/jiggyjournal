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
    
    <?php
        session_start();
        if(empty($_SESSION['userid']))
        {
            header("Location: index.php");
        }
    ?> 
			<!--Database PHP --!>
            <?php
                if($_SERVER['REQUEST_METHOD'] === 'POST')
                {//something posted
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
                        $GLOBALS['photoFile'] = $row['photoFile'];
                        $GLOBALS['date'] = date('m/d/Y',$phpDate);
                    }
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
                            <form name="editPageForm" enctype="multipart/form-data" id="editPageForm" method="post" >
                                <input type="hidden" name="action" value="<?php if(isset($_POST['edit'])){echo 'update';}
                                                                                else{echo 'create';} ?>" />
                                <div class="panel-group control-group">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-7 text-left">
                                                  <?php if(isset($_POST['edit'])){echo 'Edit';}
                                                        else{echo 'Create';} ?> Post
                                                </div>
                                                <div class="col-md-2">
                                                </div>
                                                <?php 
                                                if(isset($_POST['edit']))
                                                {?>
                                                    <div class="col-md-1 col-md-offset-0" style="width:7%">
                                                        <button type="submit" name="delete" value="delete" formAction="delete.php" onClick="return confirm('Are you sure?')" class="btn btn-link" title="Delete Entry" data-toggle="tooltip" data-placement="bottom"><span class="badge"><span class="glyphicon glyphicon-remove" style="font-size:16px"></span></span></button>
                                                    </div>
                                                <?php    
                                                }
                                                ?>
                                                <div class="col-md-1 col-md-offset-0" style="width:7%">
                                                    <a  class="btn btn-link" href="ListView.php" title="Cancel Entry" data-toggle="tooltip" data-placement="bottom"><span class="badge"><span class="glyphicon glyphicon-ban-circle" style="font-size:16px"></span></span></a>
                                                </div>
                                                <div class="col-md-1 col-md-offset-0" style="width:5%">
                                                    <button type="submit" name="save" formAction="save.php" class="btn btn-link" title="Save Entry" data-toggle="tooltip" data-placement="bottom"><span class="badge"><span class="glyphicon glyphicon-floppy-disk" style="font-size:16px"></span></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body" style="margin:2px 15px 2px 15px !important;">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-2">
                                                        <label for="Entry" class="text-left">Journal Title:</label> <br /><br /><br />
                                                        <label for="EntryDate" class="text-left">Entry Date:</label> <br /><br /><br />
														<label for="UploadFile" class="text-left">
                                                        <?php 
                                                            if(isset($GLOBALS['photoFile']))
                                                            {
                                                                echo 'Update';
                                                            }
                                                            else
                                                            {
                                                                echo 'Upload';
                                                            } 
                                                        ?> Photo:</label><br /><br /><br /><br/><br/>
                                                        <label for="Entry" class="text-left">Journal Entry:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="journal_id" value="<?php echo $GLOBALS['journal_id']; ?>" />
                                                        <input type="text" class="form-control" name="title" value="<?php echo @$GLOBALS['title']? $GLOBALS['title']:''; ?>"><br />
                                                      	<div class='input-group date controls'>
                                                            <input type='text' class="form-control" name="date"
                                                             value="<?php echo @$GLOBALS['date']? $GLOBALS['date']:''; ?>" required />
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                            <p class="help-block text-danger"></p>
                                                         </div><br />
														 <div class="col-md-4 text-left">
														 <input id="imageInput" type="file" name="UploadFile"> <br/> <br/>
														  <br/>
														  </div> 

														  <div class="image preview col-md-4 col-md-offest-0">
														    <img id="preview" src="journalImages/<?php echo $GLOBALS['photoFile'];?>" class="img-thumbnail" alt="Image" style="max-height:120px;"/>

														  </div> <br/> <br/>
                                                        <textarea name="content" class="form-control col-md-10" rows="5" ><?php echo @$GLOBALS['content']? $GLOBALS['content']:''; ?></textarea>
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
   
    <?php
        require 'includes/footcode.php';
        require 'includes/footer.php';
    ?>
</body>

</html>
