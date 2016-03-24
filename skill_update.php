<?php
    include_once 'database.php';
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $id = (int) $_POST['id'];
    
    $query = sprintf("UPDATE skills SET title='%s',description='%s'
                      WHERE id=".$id, 
            mysqli_real_escape_string($link, $title),
            mysqli_real_escape_string($link, $description)); 
    
    //vnos podatkov v bazo
    mysqli_query($link, $query);    
    //preusmeritev
    header("Location: skills.php");
?>