<!-- Andrea Morales -->
<!-- Standard navigation menu for all the pages -->

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div >
        <div class="row">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="https://www.proven.cat/intraweb/index.php" target="_blank">ProvenSoft</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav main-nav  clear navbar-right " >    
                    <?php
                    if (isset($_SESSION['rol'])){
                        if ($_SESSION['rol'] === 'registered'){
                            echo "<li class='nav'><a class='color_animation_user'>Session of " . ucwords($_SESSION['name']) ." " . ucwords($_SESSION['surname'])."</a></li>";
                            echo "<li class='nav'><a class='color_animation' href='index.php'>Home</a></li>";
                            echo "<li class='nav'><a class='color_animation' href='daymenu.php'>Day Menu</a></li>";
                            echo "<li class='nav'><a class='color_animation' href='viewmenus.php'>Menu</a></li>";
                            echo "<li class='nav'><a class='navactive color_animation' href='logout.php'>Logout</a></li>";
                        }elseif ($_SESSION['rol'] === 'staff'){
                            echo "<li class='nav'><a class='color_animation_user'>Session of " . ucwords($_SESSION['name']) ." " . ucwords($_SESSION['surname'])."</a></li>";
                            echo "<li class='nav'><a class='color_animation' href='index.php'>Home</a></li>";
                            echo "<li class='nav'><a class='color_animation' href='daymenu.php'>Day Menu</a></li>";
                            echo "<li class='nav'><a class='color_animation' href='viewmenus.php'>Menu</a></li>";
                            echo "<li class='nav'><a class='color_animation' href='adminmenus.php'>Admin menus</a></li>";
                            echo "<li class='nav'><a class='navactive color_animation' href='logout.php'>Logout</a></li>";
                        }elseif ($_SESSION['rol'] === 'admin'){
                            echo "<li class='nav'><a class='color_animation_user'>Session of " . ucwords($_SESSION['name']) ." " . ucwords($_SESSION['surname'])."</a></li>";
                            echo "<li class='nav'><a class=' color_animation' href='index.php'>Home</a></li>";
                            echo "<li class='nav'><a class='color_animation' href='daymenu.php'>Day Menu</a></li>";
                            echo "<li class='nav'><a class='color_animation' href='viewmenus.php'>Menu</a></li>";
                            echo "<li class='nav'><a class='color_animation' href='adminmenus.php'>Admin menus</a></li>";
                            echo "<li class='nav'><a class='color_animation' href='adminusers.php'>Admin users</a></li>";
                            echo "<li class='nav'><a class='navactive color_animation'href='logout.php'>Logout</a></li> ";
                        };    
                    }else{
                        echo "<li class='nav'><a class='color_animation' href='index.php'>Home</a></li>";
                        echo "<li class='nav'><a class='color_animation' href='daymenu.php'>Day Menu</a></li>";
                        echo "<li class='nav'><a class='color_animation' href='register.php'>Register</a></li>";
                        echo "<li class='nav'><a class='color_animation' href='login.php'>Login</a></li>";
                    }
                    ?>   
                </ul>
            </div>
        </div>
    </div>
</nav>



