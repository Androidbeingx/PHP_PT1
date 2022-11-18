<?php 

/**
 * Andrea Morales Mata
 * Check the values of register form and save it.
 */

require_once './fn-php/fn_users.php';

$message = "";
//filter and consume form data.
if  (filter_has_var(INPUT_POST, 'registersubmit')){ //variables received
  //clean values
  $user = filter_input(INPUT_POST, "username", FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([a-zA-ZÑñÇçàèìòùáéíóúäëïöü0-9]+)$/")));  
  $pass = filter_input(INPUT_POST, "password", FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/\S*(?=\S*[a-z])(?=\S*[\d])\S*$/")));
  $name = filter_input(INPUT_POST, "name", FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([a-zA-Z-'ªçñÑÇáéíóúàèìòùÄÜËÏÖäëïöü ]+)$/")));
  $surname = filter_input(INPUT_POST, "surname", FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([a-zA-Z-'ªçñÑÇáéíóúàèìòùÄÜËÏÖäëïöü ]+)$/")));

  // check values if ok add user
  
  // Check in pairs to best response to the user
  $validDataLogin = !(($user === false) || ($pass === false));
  $validDataUser  = !(($name === false) || ($surname === false));

  if (($validDataLogin !== false) && ($validDataUser === false)){
    //If name or surname not valid
    if (($name === false) && ($surname)) {
      $name = "";
      $message = "Patterns permited: <br><br>'name','Mª name' ,'name-name'";
    }elseif (($surname === false) && ($name)){
      $surname = "";
      $message = "Patterns permited: <br><br>'surname', 'surname-surname'";
    }else{
      $name = "";
      $surname = "";
      $message = "Patterns permited: <br><br>'name','Mª name' ,'name-name', 'surname', 'surname-surname'";
    }
    
  }elseif (($validDataLogin === false) && ($validDataUser !== false)) {
    //If user or password not valid
    if (($user === false) && ($pass)) {
      $user = "";
      $message = "Only letters and numbers allowed";

    }elseif (($pass === false) && ($user)){
      $pass = "";
      $message = "Must have at least one letter and one number";

    }else{
      $user = "";
      $pass = "";
      $message = "Only letters and numbers allowed";
    }
    

  }elseif (($validDataLogin !== false) && ($validDataUser !== false)) {
    //Everithig validated check in the database
    $checking = addUser($user, $pass, $name, $surname);

    if ($checking === 200) {

      $message = "Everithing ok. Now you are registered! Proceed to login";

    }elseif ($checking === 406){
      $user = "";
      $message = "Sorry the user is already taken, try another one :)";

    }elseif ($checking === 404){

      $message = "Error in the server try again later";

    }elseif ($checking === 500){
      $message = "Error with database file. Check the file permissions";
    }

  }else{
    //no value has been validated
    $user = "";
    $pass = "";
    $name = "";
    $surname = "";
    $message = "Credentials not permitted! Try again.";
  }
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>ProvenSoft</title>
    <meta charset="utf-8">
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
  <body>
    <?php include_once "topmenu.php";?>
    <div class="back">
      <section id="top" ><br><br>
      <!-- Form container -->
        <div class="text-content container formback "> 
          <div class="contact-form ">
            <h2>Registration</h2><br>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" >
              <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="<?php echo $user ?? ""; ?>"><br>
                <span class="<?php echo ($user === "") ? 'error' : 'hidden'; ?>">Invalid user</span>
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password"><br>
                <span class="<?php echo ($pass === "") ? 'error' : 'hidden'; ?>">Invalid password</span>
              </div>
              <div class="form-group">
                <label for="name" >Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $name ?? ""; ?>"><br>
                <span class="<?php echo ($name === "") ? 'error' : 'hidden'; ?>">Invalid name</span>
              </div>
              <div class="form-group">
                <label for="surname" >Surname:</label>
                <input type="text" class="form-control" id="surname" placeholder="Enter surname" name="surname" value="<?php echo $surname ?? ""; ?>"><br>
                <span class="<?php echo ($surname === "") ? 'error' : 'hidden'; ?>">Invalid surname</span>
              </div>
              <div class="relative fullwidth col-xs-12">
                <button type="submit" name="registersubmit" class="form-btn">Submit</button>
              </div><br>
            </form><br><br>
            <p class="error"><?php echo $message ?? "" ?></p><br>
          </div>
        </div>  
      </section>  
    </div>
    <?php include_once "footer.php";?>
  </body>
</html>