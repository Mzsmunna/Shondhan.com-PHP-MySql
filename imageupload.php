<?php
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    $userName = $_SESSION["username"];
    $userDir = $_SESSION["userdir"];
    $userPath = $_SESSION["userpath"];
    $userPP = $_SESSION["fullpath"];
    $picName = $_SESSION["picname"];
    
    echo $userDir;
    //Create PARTICULAR Directory if not Exist!
    if (!file_exists("$userPath")) {
        mkdir("$userPath", 0777, true);
    }
    
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
        
        //delete existing pic/file
        if (file_exists($userPP)) {
            //echo "The file $filename exists";
            unlink("$userPP");
        }
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("$userDir" . $_FILES["photo"]["name"])){
                echo $_FILES["photo"]["name"] . " is already exists.";
                //unlink('test.html');
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "$userDir" . $_FILES["photo"]["name"]);
                
                rename("$userDir"."$filename", "$userDir"."$userName"."."."$ext");
                echo "Your file was uploaded successfully.";
                header("Location: myprofile.php");
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>