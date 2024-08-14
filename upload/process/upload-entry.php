<?php
include '../include/connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["fileToUpload"]["name"]));
$name= $_POST['Name'];
$detail= $_POST['Detail'];
$id= $_POST['Id'];
$business= $_POST['Business'];
}


$destination="img";

$mydate=getdate(date("U")); 
$date="$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]"; 



// Check if image file is a actual image or fake image
if(isset($_FILES["fileToUpload"]["name"])) {
    $errors     = array();
    $maxsize    = 2097152;
    $acceptable = array(
        'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png'
    );
    $msg="Image size is too larg, must be less than 2mb";
     if(($_FILES["fileToUpload"]['size'] > $maxsize) || ($_FILES["fileToUpload"]["size"] == 0)) {
        $errors[] = 'File too large. File must be less than 2 megabytes.'. '- we will redirect you back' . header ("location: ../login?entry=block&msg=$msg"). exit("");
    }
    $msg="Invalid file type, image must be JPG, GIF or PNG";
    if((!in_array($_FILES["fileToUpload"]['type'], $acceptable)) && (!empty($_FILES["fileToUpload"]["type"]))) {
        $errors[] = 'Invalid file type. Only JPG, GIF and PNG types are accepted.'. '- we will redirect you back' . header ("location: ../login?entry=block&msg=$msg"). exit("");
    }

    if(count($errors) === 0) {
        move_uploaded_file($_FILES["fileToUpload"]['name'], '/store/to/location.file');
    } else {
        foreach($errors as $error) {
            echo '<script>alert("'.$error.'");</script>';
        }

        die(); //Ensure no more processing is done
    }
    
}


      $sql = "INSERT INTO entry (name, business_name, user_id, image, detail, date, vote) VALUES ('$name', '$business', '$id', '$newfilename', '$detail', '$date', '0')";

    if ($conn->multi_query($sql) === TRUE) {
     echo("");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


$allow = array("jpg", "jpeg", "gif", "png");

$todir = '../entrys/' .$destination. '/';

if ( !!$_FILES['fileToUpload']['tmp_name'] ) // is the file uploaded yet?   
{
    $info = explode('.', strtolower( $_FILES['fileToUpload']['name']) ); // whats the extension of the file

    if ( in_array( end($info), $allow) ) // is this file allowed
    {
        if ( move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $todir . $newfilename ) );
        {
            // the file has been moved correctly
       unset($_SESSION['entry']);
       header ("location: ../login?final=block");
        }
    }
    else
    {
        // error this file ext is not allowed
        echo ("something went wrong");
    }
}

?>

