<!-- Andrea Morales -->
<!-- Function logout button -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	    <title>Logout</title>
	</head>
	<body>
        <?php
            session_start();
            if (isset($_SESSION["name"])) {  //user valid
                session_destroy();
                header("Location:login.php");                
            }
            else {  //user not logged yet.
                echo "<p>Not logged!</p>";
                echo "<p>[<a href='login.php'>Login</a>]</p>";                
            }
        ?>
	</body>
</html>