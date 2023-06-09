<?php
    $isLogged = $_SESSION['isLogged'];

    if($isLogged)
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

