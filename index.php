<?php
// Andrea Morales
//start session with the paramaters saved

session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>ProvenSoft</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/bootstrap.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.ico/favicon-32x32.png">
    </head>
    <body>
        <?php include_once "topmenu.php";?>
        <div id="top" class="starter_container bg">
            <div class="follow_container">
                <div class="col-md-6 col-md-offset-3 formback">
                    <h2 class="top-title"> ProvenSoft</h2>
                    <h2 class="black second-title">Bringing class to cuisine</h2>
                    <hr>
                    <?php if (isset($_SESSION['name'])){
                    echo "<h3 class='black third-title'> Welcome again ".ucwords($_SESSION['name']). " " . ucwords($_SESSION['surname']).", nice to see you!</h3>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php include_once "footer.php";?>    
    </body>
</html>
