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
            
            $sql = "INSERT INTO journal(title,content, date, user_id) VALUES (\"$title\",\"$content\" , STR_TO_DATE('$date', '%m/%d/%Y'),\"$userid\");";
            
            $connobj->query($sql);
            
            $insertid = $connobj->getLastID();
            if(isset($_FILES['UploadFile']) && $_FILES['UploadFile']['error'] != UPLOAD_ERR_NO_FILE) {
                upload_photo($insertid);
            }
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
                            SET title = \"$title\", 
                                content = \"$content\", 
                                date = STR_TO_DATE('$date', '%m/%d/%Y'), 
                                user_id = \"$userid\"
                            WHERE journal_id = \"$journal_id\";";
            }
            $connobj->query($sql);
            if(isset($_FILES['UploadFile']) && $_FILES['UploadFile']['error'] != UPLOAD_ERR_NO_FILE) {
                upload_photo($journal_id);
            }
            
        }
        
        function upload_photo($journal_id){
            $conn = new Connection;
            $target_dir = "journalImages/";
            $uploadOk = 1;
            //Filechecks
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["UploadFile"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check file size
            if ($_FILES["UploadFile"]["size"] > 50000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            //Check if photo exists for journal id
            $sql = "SELECT photoFile FROM journal WHERE journal_id = '$journal_id'";
            $result = $conn->query($sql);
            if ($result->num_rows!==0)
            {
                if($row = $conn->fetch())
                {
                    $photoFile = $row['photoFile'];
                    //If yes, delete existing file from server
                    if(isset($photoFile))
                    {
                        unlink("$target_dir$photoFile");
                    }
                }
            }
            
            
            //Format the new filename
            
            $name = $_FILES['UploadFile']['name'];
            # Go to all lower case for consistency
            $name = strtolower($name);
            
            preg_match('/^(.*?)(\.\w+)?$/', $name, $matches);
            
            # $matches[0] gets the entire string.
            # $matches[1] gets the first sub-expression in (),
            # $matches[2] the second, etc.
            
            $extension = isset($matches[2]) ? $matches[2] : '';
            
            # Make sure the file extension has no odd characters
            if (($extension != '') &&
            (!preg_match('/^\.\w+$/', $extension)))
            {
                return("Bad file extension");
                $uploadOk = 0;
            }
            # Put the full name back together
            $name = "$journal_id$extension";
            
            #Check if file exists on the server
            if (file_exists("$target_dir$name"))
            {   
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            
            if ($uploadOk == 1)
            {
                //Save the file on the server with new name
                if (!move_uploaded_file($_FILES['UploadFile']['tmp_name'], "$target_dir$name")) 
                {
                    echo "Sorry, there was an error uploading your file.";
                }
                else
                {
                    //Update journal id with new photo file name
                    $sql = "UPDATE journal SET photoFile = \"$name\" WHERE journal_id = \"$journal_id\";";
 
                    $conn->query($sql);
                }
            }
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