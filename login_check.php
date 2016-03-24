<?php
    //aktivacije seje
    session_start();
    
    include_once 'database.php';
    //sprejmemo podatke od login.php
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    //posolimo password
    $pass = $salt.$pass;
    //zakodiramo password
    $pass = sha1($pass);
    
    $query = sprintf("SELECT * FROM users 
                      WHERE email = '%s' AND
                      pass = '$pass'",
             mysqli_real_escape_string($link, $email));
    //pošljem podatke v bazo
    $result = mysqli_query($link, $query);
    
    if (mysqli_num_rows($result) == 1) {
        //vse je ok
        $user = mysqli_fetch_array($result);
        //v sejo si shranim id uporabnika
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
		$_SESSION['email'] = $user['email'];
        
        //vse je ok, preusmeritev na index
        header("Location: index.php");
        die();
    }
    else {
        //napaka v podatkih, preusmeritev nazaj na login
        header("Location: login.php");
        die();
    }
?>