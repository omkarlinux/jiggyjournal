<!DOCTYPE html>
<html lang="en">

<?php
    require 'includes/headcode.php';
?>

<body id="page-top" class="index">
 
    <!-- Save script -->
    <?php
        session_start();
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

            header("refresh:1; url=ListView.php");
        }
        
        function create_post()
        {

            $connobj = new Connection;
            
            $title = $_POST["title"];
            $content = $_POST["content"];
            $date = $_POST["date"];
            $userid = $_SESSION["userid"];
            $sql = "INSERT INTO journal(title,content, date, user_id) VALUES ('$title','$content' , STR_TO_DATE('$date', '%m/%d/%Y'),'$userid');";
            
            $connobj->query($sql);
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
            $connobj->query($sql);
        }
    ?>
    
    <!-- Navigation -->
    <?php
        require 'includes/topNavigation.php';
    ?>

    <!-- Main Content -->
    <header>
        <div class="main-content container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <br/><br/><br/>
                        <h3>Save successful!</h3>
                        <hr class="star-light"
                        <br/><br/><br/>
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