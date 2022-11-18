<?php


/**
 * Andrea Morales
 * Functions to print menu
 */



require_once './fn-php/fn_menu.php';


/**
 * Print a table with the dishes for each category
 */

function printMenu(){

    $categorias = getCategories();
    if (!empty($categorias)){
        foreach ($categorias as $cat){
            $dishes = filterMenu($cat);
            if (!empty($dishes)){
                echo "<table class='menu'>";
                echo "<tr>";
                echo "<th colspan= 2>". strtoupper($cat) . "</th>";
                foreach ($dishes as $d){
                
                    echo "<tr>";
                    echo "<td id='name'>". $d[2]."</td>";
                    echo "<td id='price'>". $d[3]." €</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<br>";
            }else if (empty($dishes)){
                echo "There is a problem with the daily Menu file, check the filepath";
                break;
            }
            
        }
    }else if (empty($categorias)){
        echo "There is a problem with the categories file. Check the filepath";
    }
    
} 



/**
 * Print an unordenend with the dishes for each category
 */

function printList(){

    $categorias = getCategories();
    if (!empty($categorias)){
        foreach ($categorias as $cat){
            $dishes = filterDailyMenu($cat);
            if (!empty($dishes)){
                echo "<br>";
                echo "<h4>". strtoupper($cat) . "</h4>";
                echo "<ul class='myUL'>";
                foreach ($dishes as $d){
                    echo "<li>".$d[2]."</li>";
                }
                echo "</ul>";
            }else if (empty($dishes)){
                echo "There is a problem with the daily Menu file, check the filepath";
                break;
            }
            
        }
    }else if (empty($categorias)){
        echo "There is a problem with the categories file. Check the filepath";
    
    }

    
}
