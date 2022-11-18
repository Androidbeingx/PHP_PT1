<?php


/**
 * Andrea Morales
 *Functions to manage menu
 */



/**
* Given a string with category, return arrays that match with it.
* @param string category
* @return associative array with the data read from the file with the user found or an array without data if not
*/


function filterMenu(string $categoria): array{
    
    $data = array();
    $filehandle = @fopen("files/menu.txt", "r");

    if ($filehandle === false){
        $data = array();
    }else if ($filehandle){
        while (($row = fgetcsv($filehandle, 0, ";")) !== FALSE) {
            list($id, $category, $name, $price) = $row;
            if ($category === $categoria){
                array_push($data, [$id, $category, $name, $price]);      
            }
        }
        fclose($filehandle);
    }
    return $data;
};




/**
 * Given a txt returns array of strings
 * @return array of categories name in file 
 */

function getCategories (): array{
    
    $filepath = "files/categories.txt";
    $handle = @fopen($filepath, "r");
    $categories = array();
    if ($handle === false){
        $categories = array();
    }else if ($handle){
        while ($line = fscanf($handle, "%s\n")){
            list($category) = $line;
            array_push($categories, $category);
        }
        fclose($handle);
    }
    
    return $categories;

};




/**
* Given a string with category, return arrays that match with it.
* @param string category
* @return associative array with the data read from the file with the user found or an array without data if not
*/


function filterDailyMenu(string $categoria): array{
    
    $data = array();
    $filehandle = @fopen("files/daymenu.txt", "r");
    if ($filehandle === false){
        $data = array();
    }else if ($filehandle){
        while (($row = fgetcsv($filehandle, 0, ";")) !== FALSE) {
            list($id, $category, $name) = $row;
            if ($category === $categoria){
                array_push($data, [$id, $category, $name]);      
            }
        }
        fclose($filehandle);
    }

    
    return $data;
};

