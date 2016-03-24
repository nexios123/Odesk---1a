<?php
    include_once 'header.php';
?>

<h1 id="prijava"></h1>Prijava</h1>

<form action="login_check.php" method="POST">
    E-Pošta  : <input type="email" name="email" /><br />
    Geslo: <input type="password" name="pass" /><br />
    <input type="submit" value="Prijava" />
    <input type="reset" value="Prekliči" />
</form>

<?php
    include_once 'footer.php';
?>
