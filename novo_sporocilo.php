<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
		<link rel="stylesheet" type="text/css" href="novo_sporocilo.css" />
    </head>
    <body>
 <?php
    include_once 'header.php';
    include_once 'database.php';

?>

 <?php
      
	$user_id = $_SESSION['user_id'];
    
    $query = "SELECT * FROM users WHERE id =$user_id";
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_array($result);
	?>
	
<form action="poslano.php" method="post" enctype="multipart/form-data"> 
  
  <div id="glavnimeni">
  
  <div id="sporočila">
  SPOROČILA 
  </div>
  

  
  </div>
  
  <div id="spodnjimeni">
  
  <div id="izbira">
  
  <div id="novasporočila">
  <a href="novo_sporocilo.php">Novo sporočilo</a>
  </div>
  
  <div id="prejeta">
  <a href="prejeta_sporocila.php">Prejeta</a>
  </div>

  
  </div>
  
  
  
   <div id="okno">
  <div class="textbox">


  E-naslov prejemnika: <input type="text" name="prejemnik" ><br>
  Zadeva:         <input type="text" name="zadeva" ><br>
					<input type="hidden" name="posiljatelj" value="<?php echo $user['email']; ?>">

  
  Sporočilo:<br>
  <textarea name="sporocilo" rows="14" cols="69"></textarea><br><br>
   <p align="middle">
       <input type="file" name="datoteka" /><br />
    
  <input type="submit" value="Pošlji sporočilo" />
</p>
  </div> 
  
  </div>
  
  
  </div>
  </form>
<?php
    include_once 'footer.php';
?>

