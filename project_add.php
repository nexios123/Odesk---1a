<?php
    include_once 'header.php';
?>

<h1>Dodajanje projektov</h1>
<form action="project_insert.php" method="POST">
    Ime: <input type="text" name="title" required="required" /><br />
    Datum začetka: <input type="text" id="startdate" name="start_date" required="required" /><br />
    Datum konca: <input type="text" id="enddate" name="end_date" /><br />
    Opis: <textarea name="description" cols="15" rows="5" placeholder="Vnesi pobrobni opis projekta"></textarea><br />
    <input type="submit" value="Vnesi" /> 
    <input type="reset" value="Prekliči" />
</form>


<?php
    include_once 'footer.php';
?>