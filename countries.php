<?php
    include_once 'header.php';
    include_once 'database.php';
?>
<a href="country_add.php">Dodaj državo</a>
<table cellpading="0" cellspacing="0" border="1">
    <tr>
        <th>Ime</th>
        <th>Kratica</th>
        <th>Akcije</th>
    </tr>
    <tr>
        <td>Slovenija</td>
        <td>SLO</td>
        <td>Uredi Izbriši</td>
    </tr>
    <?php
        $query = "SELECT * FROM countries";
        //pošljemo ukaz v bazo in shranimo rezultat
        $result = mysqli_query($link, $query);
        
        while($row = mysqli_fetch_array($result)) {
            echo '<tr>';
                echo '<td>'.$row['title'].'</td>';
                echo '<td>'.$row['short'].'</td>';
                echo '<td>';
                echo '<a href="country_edit.php?id='.$row['id'].'">Uredi</a> ';
                echo '<a href="country_delete.php?id='.$row['id'].'" onclick="return confirm(\'Prepričani?\')">Izbriši</a>';
                echo '</td>';
            echo '</tr>';
        }
    ?>
</table> 

<?php
    include_once 'footer.php';
?>