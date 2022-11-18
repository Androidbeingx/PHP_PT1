<?php


/**
 * Andrea Morales
 *Functions to manage persistance of users
 */


/**
* Given a path complies the data in it.
* @return associative array with the data read from the file with the user found or an array without data if not
*/


function searchUser(string $username):array {
    $data = array();
    $filepath = 'files/users.txt';
    $delimiter = ';';
    
    if (file_exists($filepath) && is_readable($filepath)) {
    $handle = fopen($filepath, 'r');  //returns false on error.
        if ($handle) {
            while (!feof($handle)) {
                //delete spaces
                fscanf($handle, "%s\n", $line);
                    if ($line) {
                        $fields = explode($delimiter, $line);
                        if (($fields[0] === $username)){
                            $data = $fields;
                            break;
                        }
                    }
                }
                fclose($handle);            
            }
        }
    return $data;
};




/**
 * add a register user
 * (Username must be unique)
 * @param string $username
 * @param string $password
 * @param string $name
 * @param string $surname
 * @return int  200 if succesful, 406 if username is in the datbase, 404 error in server, 500 fail permissions
 */

function addUser(string $username, string $password,  string $name, string $surname):int{
    
    //standard rol -> registered
    $formatdata = $username . ";" . $password . ";registered;" . $name . ";" . $surname . "\n";
    $filepath = 'files/users.txt';

    if (!searchUser($username)){
        $result= 200;
        $add_data = file_put_contents($filepath,$formatdata,FILE_APPEND);
        if ($add_data === false){
            $result = 500;
        }
    }else if (searchUser($username)) {
        $result = 406;
    }else {
        $result = 404;
    };
    
return $result;

};


