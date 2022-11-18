<?php
// Andrea Morales
//start session with the paramaters saved

session_start();
if (!isset($_SESSION['rol'])) {
    header("Location: login.php");
    exit;
}
if (isset($_SESSION['rol'])){
    if ($_SESSION['rol'] === 'registered'){
        echo "Only admins allowed";
        exit;
    }elseif ($_SESSION['rol'] === 'staff'){
        echo "Only admins allowed";
        exit;
    };
}

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
        <div class="back">
            <section id="top" ><br><br>
                <div class="text-content container formback "> 
                    <h2>Admin users</h2><br>
                    <p>
                        We are working in this page. COOMING SOON!
                    </p>
                </div>
            </section>
        </div>
        <?php include_once "footer.php";?>
    </body>
</html>