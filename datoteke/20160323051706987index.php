<?php 
    //session_start();
    include 'header.php';
    
    if (isset($_SESSION['user_id'])) {
        //je prijavljen
        echo $_SESSION['first_name'];
    }
    else {
        echo 'Nisi prijavljen!';
    }
   
?>

<h1>Obrazec</h1>

<form action="users.php" method="POST">
    Ime: <input type="text" name="ime99" /><br />
    <input type="submit" value="Pošlji" />
</form>
        
<?php 
    include 'footer.php';
?>