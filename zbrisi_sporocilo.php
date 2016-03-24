<?php
    include_once 'database.php';
   
?>
<div id="okno">
<table>
<?php
$id = $_GET['id'];

$query = "DELETE FROM sporocila WHERE (id = '$id');";
        //pošljemo ukaz v bazo in shranimo rezultat
        $result = mysqli_query($link, $query);
        
if ($result) {
	header ("Location: prejeta_sporocila.php");
}
		
?>
</div>
</table>
 <?php
    include_once 'footer.php';
?>
    </body>
</html>