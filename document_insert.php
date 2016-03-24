<?php

include_once 'database.php';
include_once 'session.php';

$user_id = $_SESSION['user_id'];

$title = $_POST['title'];
$description = $_POST['description'];

$target_dir = "dokumenti/";
$random = date('Ymdhis').rand(1,1000);
$target_file = $target_dir.$random.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$error = '';
//dobi končnico datoteke
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
        $error = $error.' Ni naložilo.';
    }
}
// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
    $error = $error.' Prevelika.';
}
// Disallow certain file formats
if ($imageFileType == "exe" || 
        $imageFileType == "bat" || 
        $imageFileType == "msi" ||
        $imageFileType == "dll") {    
    $uploadOk = 0;
    $error = $error.' Nedovoljena končnica.';
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $_SESSION['error'] = 'Napaka pri nalaganju datoteke.'.$error;
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], 
                            $target_file)) {
        //vse je ok
        $query = sprintf("INSERT INTO documents (title, description, url, user_id) 
                          VALUES ('%s','%s','%s',$user_id)",
                    mysqli_real_escape_string($link, $title),
                    mysqli_real_escape_string($link, $description),
                    mysqli_real_escape_string($link, $target_file));
        //pošljemo nove podatke v bazo
        mysqli_query($link, $query); 
        $_SESSION['success'] = 'Uspešno ste naložili';
        
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}

//preusmeritev nazaj na profile stran!
header("Location: profile.php");
?>