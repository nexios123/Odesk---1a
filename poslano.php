<?php
    include_once 'sp_mz.php';
	include_once 'database.php';
   
?>

 <div id="okno">
  <?php
  
   $zadeva =$_POST['zadeva'];
   $posiljatelj =$_POST['posiljatelj'];
   $prejemnik =$_POST['prejemnik'];
   $sporocilo=$_POST['sporocilo'];
   $target_file;
   $target_dir = "datoteke/";
	
	$random = date('Ymdhis').rand(1,1000);
	
	if (isset($_FILES["datoteka"]["name"])) {
		$target_file = $target_dir.$random.basename($_FILES["datoteka"]["name"]);
		$uploadOk = 1;
	} 
	else  {
		$uploadOk = 0;
		$target_file = '';
	}

	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["datoteka"]["tmp_name"], 
								$target_file)) {

		} else {
			echo "Sorry, there was an error uploading your file.";
			$uploadOk = 0;
		}
	}

	if ($uploadOk == 1) {
		
				$query = "SELECT * FROM users";
$result = mysqli_query($link, $query);

while ($prejemnik = mysqli_fetch_array($result)) {
		$prejemnik = $row['email'];
		$query =   "INSERT INTO sporocila (posiljatelj,prejemnik,zadeva,sporocilo,datoteka)
				VALUES ('$posiljatelj','$prejemnik','$zadeva','$sporocilo','$target_file');";
				
mysqli_query($link, $query); }
	}
	else {
		$query = "SELECT * FROM users";
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_array($result)) {
	$prejemnik = $row['email'];
			$query =   "INSERT INTO sporocila (posiljatelj,prejemnik,zadeva,sporocilo)
						VALUES ('$posiljatelj','$prejemnik','$zadeva','$sporocilo');";
mysqli_query($link, $query);	}
	}

  ?>
  </div> 

  <a href="sporocila_meni.php">Sporočilo je bilo uspešno poslano. Nazaj na stran.</a>


<?php
    include_once 'footer.php';
?>
    </body>
</html>