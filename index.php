<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jongeren Kansrijker</title>
</head>
<body>
<?php
require_once 'database.php';
$db = new database();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $username = $_POST['uname'];
    $password = $_POST['password'];
    $db->login($username, $password);

}
?>
<form action="index.php" method="post">
    <label for="uname">Username</label><br>
    <input type="text" name="uname"><br>
    <label for="password">Password</label><br>
    <input type="password" name="password"><br>
    <input type="submit" value="Login">

</form> 
    
</body>
</html>