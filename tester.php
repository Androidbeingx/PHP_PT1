<?php
/**
 * TESTER TO VERIFY THE FUNCTION CREATED IN USERS
 * Andrea Morales
 */
require_once './fn-php/fn_users.php';


//fn_users

// found 
echo "IF USER FOUND (USER2)";
$result = searchUser("user2");
echo "<pre>";
print_r($result);
echo "</pre>";


// not found
echo "IF USER NOT FOUND (USER20)";
$result1 = searchUser("user20");
echo "<pre>";
var_dump($result1);
echo "</pre>";

//insert new user
echo "INSERTS USERS 200(ADDED),406(USER TAKEN), 404(SERVER ERROR)";
echo "<br>";
echo "ADD USER (USER21)";
$succes = addUser("user21", "pass21", "name21", "surname21");
echo "<pre>";
print_r($succes);
echo "</pre>";



// insert existing user
echo "ADD USER (USER1)";
$succes = addUser("user1", "pass1", "name1", "surname1");
echo "<pre>";
print_r($succes );
echo "</pre>";












