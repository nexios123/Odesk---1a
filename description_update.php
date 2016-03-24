<?php
    include_once 'database.php';
    include_once 'session.php';
    
    $user_id = $_SESSION['user_id'];
    
   
    $description = $_POST['description'];
    
    
    $query = sprintf("UPDATE users SET description='%s'
                      WHERE id=".$user_id,             
            mysqli_real_escape_string($link, $description)); 
    
    //vnos podatkov v bazo
    mysqli_query($link, $query);    
    //preusmeritev
    header("Location: profile.php");
?>