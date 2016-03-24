<?php
include_once 'session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Spot Light - Blog</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <!--
        Template 2051 Spot Light
        http://www.tooplate.com/view/2051-spot-light
        -->
        <link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />
        <link href="css/stil.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
            <script src="//code.jquery.com/jquery-1.10.2.js"></script>
            <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
            <link rel="stylesheet" href="/resources/demos/style.css" />
            <script>
                function validateForm() {
                    var pass = document.getElementsByName("pass")[0].value;
                    var pass2 = document.getElementsByName("pass2")[0].value;
                    if ((pass == pass2) && (pass != '')) {
                        return true;
                    }
                    else {
                        document.getElementById("passErr").innerHTML = "Neujemanje";    
                        return false;
                    }
                }
            </script>
            <script>
                $(function() {
                    $( "#startdate" ).datepicker({
                        showOn: "button",
                        buttonImage: "images/calendar.gif",
                        buttonImageOnly: true,
                        buttonText: "Select date",
                        dateFormat: "yy-mm-dd"
                    });
                });
                $(function() {
                    $( "#enddate" ).datepicker({
                        showOn: "button",
                        buttonImage: "images/calendar.gif",
                        buttonImageOnly: true,
                        buttonText: "Select date",
                        dateFormat: "yy-mm-dd"
                    });
                });
            </script>

    </head>
    <body id="subpage">
        <div id="tooplate_wrapper">
            <div id="tooplate_header_sp">
                <div id="tooplate_menu">
                    <ul>
                        <li><a href="index.php"><span></span>Domov</a></li>
                        <li><a href="countries.php"><span></span>Države</a></li>
                        <li><a href="skills.php"><span></span>Veščine</a></li>
	<?php
	include_once 'database.php';
	
	$neprebranih=0;
	
		?>
		<?php
                        if (isset($_SESSION['user_id'])) {
                            ?>
                            <li><a href="logout.php"><span></span>Odjava</a></li>
                            <li><a href="profile.php"><span></span>
                                    <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?>
                                </a></li>
                            <?php
							
							$email = $_SESSION['email'];
	
						$query = "SELECT id FROM sporocila WHERE (prebrano = 0) AND (prejemnik = '$email');";
					
        //pošljemo ukaz v bazo in shranimo rezultat
        $result = mysqli_query($link, $query);
        
		
		
        while($row = mysqli_fetch_array($result)) {
			
           $neprebranih ++;
		}
		
                        } else {
                            ?>                
                            <li><a href="user_add.php"><span></span>Registracija</a></li>
                            <li><a href="login.php"><span></span>Prijava</a></li>
                            <?php
                        }
                        ?>
						
                        <li><a href="sporocila_meni.php" class="current"><span></span>Sporočila (<?php echo $neprebranih; ?>)</a></li>
                        
                    </ul>    	
                </div> <!-- end of tooplate_menu -->

                <div id="site_title"><h1><a href="#">Free Website Template</a></h1></div>

            </div> <!-- end of header -->

            <!--<div id="tooplate_main">

                <div id="tooplate_sidebar">
                    <div class="sidebar_box">
                        <h2>Navigation</h2>
                        <ul class="sidebar_nav">
                            <li><a href="#">Aliquam sed tellus</a></li>
                            <li><a href="#">Curabitur velit ante</a></li>
                            <li><a href="#">Donec ac nibh arcu</a></li>
                            <li><a href="#">Fusce placerat ultrices</a></li>
                            <li><a href="#">Maecenas fermentum </a></li>
                            <li><a href="#">Pellentesque egestas </a></li>
                        </ul>
                    </div>
                    <div class="sidebar_box">
                        <h2>Our Latest News</h2>
                        <div class="news_box">
                            <a href="#">Donec eu orci dolor</a>
                            <p>Integer eros augue, auctor vel scelerisque at, pellentesque sit amet odio. </p>
                        </div>
                        <div class="news_box">
                            <a href="#">Aliquam bibendum vulputate</a>
                            <p>Duis neque metus, ullamcorper sit amet dictum vel, tincidunt sit amet felis.</p>
                        </div>
                    </div>       

                </div> <!-- end of sidebar -->
            <?php
            if (isset($_SESSION['error'])) {
                echo '<div class="error">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']); //uničimo spremeljivko 
            }
            if (isset($_SESSION['success'])) {
                echo '<div class="success">' . $_SESSION['success'] . '</div>';
                unset($_SESSION['success']); //uničimo spremeljivko 
            }
            ?>
