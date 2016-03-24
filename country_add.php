<?php
    include_once 'header.php';
?>

<h1>Dodajanje države</h1>
<form action="country_insert.php" method="POST">
    Ime: <input type="text" name="title"  /><br />
    Kratica: <input type="text" name="short" /><br />
    <input type="submit" value="Vnesi" />
</form>


<?php
    include_once 'footer.php';
?>