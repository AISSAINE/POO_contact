<?php
spl_autoload_register (function ($class){
    include ('classes/'.$class.'.php');
    }); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modif contact</title>
</head>
<body>

    <a href="index.php">Retour à l'accueil</a>
    <h1> Supprimer un contact </h1>


<?php
$contactID = $_GET['id'];
            
$manager = new ContactManager ();
$manager -> DeleteContact ($contactID);
?>
</body>
</html>