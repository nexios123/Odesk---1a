<?php
    include_once 'sp_mz.php';
   
?>
  <div id="okno">
  
 
<table cellpading="0" cellspacing="0" border="1">
    <tr>
        <th>Prejemnik</th>
        <th>Sporočilo</th>
		<th>Pošiljatelj</th>
		<th>Zadeva</th>
		<th>Datoteka</th>
		<th>Izbriši sporočilo</th>
       
    </tr>

 
 
    <?php
		
$user_id = $_SESSION['user_id'];
    
    $query = "SELECT * FROM users WHERE id =$user_id";
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_array($result);
	
	$ime=$user['email'];
	
        $query = "SELECT * FROM sporocila WHERE (prejemnik = '$ime');";
        //pošljemo ukaz v bazo in shranimo rezultat
        $result = mysqli_query($link, $query);
        
        while($row = mysqli_fetch_array($result)) {
            echo '<tr>';
                echo '<td>'.$row['prejemnik'].'</td>';
                echo "<td><a href='poglej_sporocilo.php?id=" .$row['id']."'>Poglej sporočilo</a></td>";
				 echo '<td>'.$row['posiljatelj'].'</td>';
				  echo '<td>'.$row['zadeva'].'</td>';
				if (!empty($row['datoteka'])) {
					echo "<td><a href='download.php?datoteka=".$row['datoteka']."' >Datoteka</a></td>";
				} else  {
					echo '<td></td>';
				}

				  echo "<td><a href='zbrisi_sporocilo.php?id=" .$row['id']."'>Izbriši sporočilo.</a></td>";
				   

            echo '</tr>';
        }
		
		
		

	?>
	

    
</table> 
</div>
 
 <?php
    include_once 'footer.php';
?>
    </body>
</html>
