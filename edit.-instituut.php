<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wijzig instituut</title>
</head>
<body>

<?php
if(isset)$_GET['id'])){

}

if($_SERVER['Request_Method'] == 'Post'){
    require_once 'database.php';

    $db = new database();

}
?>
 <form action="edit-instituut.php" method="post">
    <label for="inst">Instituut</label><br> 
    <input type="text" name="inst" placeholder="<?php echo isset($instituut) ? $instituut[0] ['instituut'] : ''; ?>" required><br>
    <label for="tel">Instituut telefoon</label><br>
    <input type="text" name="tel" placeholder="<?php echo isset($instituut) ? $instituut[0] ['instituuttelefoon'] : ''; ?>" required><br> 
    <input type="submit" value="wijzigen">
    </form>    
</body>
</html>