<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Config/ExceptionsManager.php';

    session_start();

    $role = null;
    $isLogged = null;
    $error = null;

    
    if(isset($_SESSION['isLogged'])){
        $isLogged = $_SESSION['isLogged'];
    }
    
    if(isset($_SESSION['role'])){
        $role = $_SESSION['role'];
    }
    
    if(isset($_GET['error'])){
         $error = $_GET['error'];
    }
    
    // role 1 == alumno
    // role 2 == admin
    if($isLogged && $_SESSION['role'] == 1)
    {


            //Aqui pon lo que deberia aparecer si esta logeado.

?>
        
<?php
    }
    else if($isLogged && $_SESSION['role'] == 2){
?>

<!DOCTYPE html>
    <head>
        <title>
            UAQ-FIF | Admin panel
        </title>
        <link rel="stylesheet" href="./assets/css/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="fluid-container">
        <div class="container">
            <nav class="navbar">
                <div>
                    <i class="fa-solid fa-house"></i>
                </div>
                <div>
                    <i class="fa-solid fa-user"></i>
                </div>
                <div>
                    <i class="fa-solid fa-gear"></i>
                </div>
                <div>
                    <i></i>
                </div>
            </nav>
            <div class="container">
                asdasd
            </div>
        </div>
    </body>
</html>

<?php
    }

    else{

        // Login 
?>
<!DOCTYPE html>
    <head>
        <title>
            UAQ-FIF | Admin panel
        </title>
        <link rel="stylesheet" href="./assets/css/main.css?n=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" 
        integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css" 
        integrity="sha512-yDUXOUWwbHH4ggxueDnC5vJv4tmfySpVdIcN1LksGZi8W8EVZv4uKGrQc0pVf66zS7LDhFJM7Zdeow1sw1/8Jw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="container-fluid vertical-align h-80 background">
        <div class="container center">
            <img class="center logo-login" src="./assets/svg/Portal-UAQ.svg">
            <div class="container center border-shadow padding-2">
                <diV class="title primary caps center">
                    Bienvenido
                </diV>
                <div class="subtitle primary-trasnlucent center">
                    Portal de alumnos
                </div>
                <div class="subtitle primary-trasnlucent center">
                    Usa tu expediente y tu NIP
                </div>
                <?php 
                    if($error !== null){
                        echo 'j'. validateException($error);
                    }

                ?>
                <form class="form" action="login.php" method="POST">
                    <div class="field-w-icon">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="expediente" placeholder="Expediente" autocomplete="off" required><br><br>
                    </div>

                    <div class="field-w-icon">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="nip" placeholder="NIP" autocomplete="off" required><br><br>
                    </div>
                    <input class="button-form" type="submit" value="ENTRAR">
                </form>
                <div class="subtitle primary-trasnlucent center">
                    <a href="#">¿Olvidaste tu NIP?</a>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    }
?>

