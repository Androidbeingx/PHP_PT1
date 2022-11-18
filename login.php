<?php 

/**
 * Andrea Morales
 * Check if the user values in the form are in the database and do the login
 */
require_once './fn-php/fn_users.php';

$message = "";
//filter and consume form data.
if  (filter_has_var(INPUT_POST, 'loginsubmit')){ //variables received
  //clean values
  $user_input = htmlspecialchars(trim($_POST['username']));  
  $pass_input = htmlspecialchars(trim($_POST['password']));

  //DATA 
  $data = searchUser($user_input);
  if (count($data)==!0){
    if ($data[1]== $pass_input){
    // start session
    session_start();
    // save data
    $_SESSION['rol']= $data[2];
    $_SESSION['name']= $data[3];
    $_SESSION['surname']= $data[4];
    header("Location:index.php");  
    }else {
    $message = "Invalid Credentials! <br><br> PASSWORD WRITTEN: $pass_input";
      
    }; 
  };
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>ProvenSoft</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style-portfolio.css">
    <link rel="stylesheet" href="css/picto-foundry-food.css" />
    <link rel="stylesheet" href="css/jquery-ui.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.ico/favicon-32x32.png">

  </head>
  <body >
    <?php include_once "topmenu.php";?>
    <div class="back">
      <section id="top" ><br><br>
      <!-- Form container -->
        <div class="text-content container formback "> 
          <div class="contact-form ">
            <h2>Login</h2><br>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
              <div class="form-group ">
                <label for="username">User:</label>
                <input class="form-control " type="username"  id="username" placeholder="Enter username" name="username" value="<?php echo $user_input ?? ""; ?>"><br>
                <span class="<?php echo ($data === array()) ? 'error' : 'hidden'; ?>">User not found</span>
              </div>
              <div class="form-group " >
                <label for="password" class='labelform'>Password:</label>
                <input type="password"  id="password" placeholder="Enter password" name="password" class="form-control" ><br>
                <span class="<?php echo ($data == true && $data[1] != $pass_input) ? 'error' : 'hidden'; ?>">Incorrect password</span>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
              </div>
              <div class="relative fullwidth col-xs-12">
                <button type="submit" name="loginsubmit" class="form-btn">Submit</button>
              </div><br><br>
            </form><br><br>
            <p class="error"><?php echo $message ? : "";?></p><br>
          </div>
        </div>
      </section>
    </div>
    <?php include_once "footer.php";?> 
  </body>
</html>
