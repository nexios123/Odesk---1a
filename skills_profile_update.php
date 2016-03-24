<?php
    include_once 'database.php';
    include_once 'session.php';
    //spremenljivka je tabela (array) 
    //vseh izbranih veščin
    $skills = $_POST['skills'];
    
    $user_id = $_SESSION['user_id'];
    //izbrišem vse njegove veščine
    $query = "DELETE FROM skills_users WHERE user_id=$user_id";
    mysqli_query($link, $query);
    
    //ponovno vnesem vse njegove veščine
    foreach ($skills as $skill_id) {
        $query = "INSERT INTO skills_users (user_id, skill_id)
                  VALUES ($user_id, $skill_id)";
        //vnesemo v bazo
        mysqli_query($link, $query);
    }
    //preusmerimo nazaj na profil
    header("Location: profile.php");
?>