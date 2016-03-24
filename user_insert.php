<?php
    include_once 'database.php';
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST["email"];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $country_id = (int) $_POST['country_id'];
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && 
            !empty($first_name) && !empty($last_name)
            && !empty($pass) && ($pass == $pass2)
            && !empty($country_id)) {
        //geslo pripravimo za vnos
        $pass = $salt.$pass;
        //geslo zakodiramo
        $pass = sha1($pass);
        
        $query = sprintf("INSERT INTO users(first_name,last_name,
                          email,pass,country_id) VALUES
                          ('%s','%s','%s','%s',".$country_id.")",
                    mysqli_real_escape_string($link, $first_name),
                    mysqli_real_escape_string($link, $last_name),
                    mysqli_real_escape_string($link, $email),
                    mysqli_real_escape_string($link, $pass));
        
        //preverimo uspešnost
        if (!mysqli_query($link, $query)) {
            //napaka pri vnosu stavka (email)
            header("Location: user_add.php");
            die();//prekine izvajanje skripte
        }
        //vse je ok, preusmerimo ga na prijavo
        header("Location: login.php");
    }
    else {
        //če je kakšna napaka, naj ga preusmeri nazaj
        header("Location: user_add.php");
    }
?>