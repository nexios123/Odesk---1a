<?php
    include_once 'session.php';
    $user_id = (int) $_GET['id'];
    if (empty($user_id)) {
        //če je prazen, ga preusmerim
        $_SESSION['error'] = 'Dostopali ste na napačen način.';
        header("Location: users.php");
        die(); //prekine izvajanje skripte
    }
    //vse ok :)
    include_once 'header.php';
    include_once 'database.php';
    //dobim za katerega uporabika gre
        
    $query = "SELECT *, c.title AS country 
              FROM users u INNER JOIN countries c ON c.id=u.country_id              
              WHERE u.id=$user_id";
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_array($result);    
?>
<h1>Profil uporabnika</h1>

<div class="user">
    <div class="picture_text">
        <div class="picture">
            <?php
                if (!empty($user['avatar'])) {
                    echo '<img src="'.$user['avatar'].'" alt="Avatar" height="300px" />';
                }
                else {
                    echo '<img src="slike/no.jpg" alt="Ni slike" height="300px" />';
                }
            ?>
        </div>
        <div class="text_name">
            <h2>
                <?php
                    echo $user['first_name'];
                    echo ' ';
                    echo $user['last_name'];                    
                ?>
            </h2>
            <h3><?php echo $user['country']; ?></h3>
        </div>
    </div>
    <div class="description">
        <h3>Opis</h3>
        <p>
            <?php
                echo $user['description'];                                
            ?>
        </p>
    </div>
    <div class="skills">
        <h3>Veščine</h3>
        <ul>
            <?php
                $query = "SELECT *
                          FROM skills_users su INNER JOIN skills s 
                                ON s.id=su.skill_id
                          WHERE su.user_id = $user_id";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<li>'.$row['title'].'</li>';
                }
            ?>
        </ul>
    </div>
</div>

<?php
    include_once 'footer.php';
?>