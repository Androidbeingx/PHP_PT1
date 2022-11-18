<?php
// Andrea Morales
//start session with the paramaters saved

session_start();
require_once './fn-php/fn_print.php';

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
        <link rel="stylesheet" href="css/menu.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.ico/favicon-32x32.png">
    </head>
    <body>
        <?php include_once "topmenu.php";?>
        <div class="back">
            <section id="top" ><br><br>
                <div class="text-content container formback center"> 
                    <div class="ribbon">
                        <span class="ribbon2" >15€</span>
                    </div>
                    <h2>Day Menu</h2><br>
                    <div>
                        <?php printList() ?>
                    </div>
                </div>
            </section>
        </div>
        <?php include_once "footer.php";?>
    </body>
</html>