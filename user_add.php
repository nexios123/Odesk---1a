<?php
include_once 'header.php';
include_once 'database.php';
?>

<form action="user_insert.php" method="POST" onsubmit="return validateForm()">
    <label id="first_name">Ime</label>
    <input type="text" name="first_name" required="required" /><br />
    <label id="last_name">Priimek</label>
    <input type="text" name="last_name" required="required" /><br />
    <label id="email">e-pošta</label>
    <input type="email" name="email" required="required" /><br />
    <label id="pass">Geslo</label>
    <input type="password" name="pass" required="required" /><br />
    <label id="pass2">Geslo</label>
    <input type="password" name="pass2" required="required" /><br />
    <div id="passErr"></div>
    <select name="country_id">        
        <?php
        $query = "SELECT * FROM countries";
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_array($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
        }
        ?>
    </select><br />
    <input type="submit" value="Registriraj" />
</form>

<?php
include_once 'footer.php';
?>