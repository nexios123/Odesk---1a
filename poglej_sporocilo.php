<?php
    include_once 'sp_mz.php';
   
?>
<div id="okno">
<table>
<?php
$id = $_GET['id'];

$query = "SELECT * FROM sporocila WHERE (id = '$id');";
        //pošljemo ukaz v bazo in shranimo rezultat
        $result = mysqli_query($link, $query);
        
		
        while($row = mysqli_fetch_array($result)) {
			
            echo '<tr>';
				echo '<td> Pošiljatelj: </td>';
                echo '<td>'.$row['posiljatelj'].'</td></tr>';
				echo '<tr><td> Zadeva: </td>';
				 echo '<td>'.$row['zadeva'].'</td></tr>';
				 echo '<br>';
				 echo '<tr><td> Sporočilo: </td>';
				 echo '<td>'.$row['sporocilo'].'</td>';
				  
				 
				   

            echo '</tr>';
		}
		
		$query = "UPDATE sporocila SET prebrano = 1 WHERE id = '$id';";
		 $result = mysqli_query($link, $query);
?>
</div>
</table>
 <?php
    include_once 'footer.php';
?>
    </body>
</html>