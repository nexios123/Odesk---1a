<?php
include_once 'header.php';
include_once 'database.php';

$query = "SELECT * FROM users";
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_array($result)) {
    echo '<div class="user">';
        if (!empty($row['avatar'])) {
            echo '<img src="' . $row['avatar'] . '" alt="Avatar" />';
        } else {
            echo '<img src="slike/no.jpg" alt="Ni slike" />';
        }
        echo '<div class="userdata">';
            echo '<div class="user-name">';
                echo '<span>'.$row['first_name'].'</span>';
                echo '<span>'.$row['last_name'].'</span>';
            echo '</div>';
        echo '</div>';
        if ($_SESSION['user_id'] == $row['id']) {
            echo '<div class="profilelink">';
                echo '<a href="profile.php">Profil</a>';
            echo '</div>';
        }
    echo '</div>';
}
?>
<div style="clear: both;"></div>

<table cellpadding="0" cellspacing="0" border="1">
    <tr>
        <th>Št.</th>
        <th>Povezava</th>
        <th>Ime</th>
        <th>Priimek</th>        
    </tr>
    <?php
    $st = 0;
    while ($row = mysqli_fetch_array($result)) {
        $st++;
        echo '<tr>';
        echo "<td>$st</td>";
        echo '<td><a href="user.php?id=' . $row['id'] . '">';
        if (!empty($row['avatar'])) {
            echo '<img src="' . $row['avatar'] . '" alt="Avatar" height="100px" />';
        } else {
            echo '<img src="slike/no.jpg" alt="Ni slike" height="100px" />';
        }
        echo '</a></td>';
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo '</tr>';
    }
    ?>
</table>


<?php
include_once 'footer.php';
?>