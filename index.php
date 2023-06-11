<?php

    session_start();

    $isLogged = $_SESSION['isLogged'];
    $role = $_SESSION['role'];
    
    // role 1 == alumno
    // role 2 == admin
    if($isLogged && $_SESSION['role'] == 1)
    {


            //Aqui pon lo que deberia aparecer si esta logeado.

?>


<?php
    }
    else{
?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <label for="expediente">Expediente:</label>
            <input type="text" name="expediente" required><br><br>
            <label for="nip">NIP:</label>
            <input type="password" name="nip" required><br><br>
            <input type="submit" value="Login">
        </form>
    </body>
    </html>
<?php
    }
?>

