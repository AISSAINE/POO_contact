<?php
spl_autoload_register (function ($class){
include ('classes/'.$class.'.php');
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>


</head>
<body>
<h1>Accueil</h1>

<a href="ajoutContact.php">Créer contact</a>

<br />


<h1>Liste des contacts</h1>
    

<?php
/* //afficher un enregistrement
$manager = new ContactManager ();
$lecontact = $manager-> ReadContact (11);
echo $lecontact-> getNom ().' '.$lecontact-> getPrenom ().' '.$lecontact-> getEmail ().'<br/>';
*/

 //Read All
$manager = new ContactManager ();
$lescontacts = $manager-> ReadAllContact ();
if (!empty($lescontacts)){
    foreach ($lescontacts as $lecontact) {
    echo $lecontact-> getNom ().' '.$lecontact-> getPrenom ().' '.$lecontact-> getEmail ().' [ <a href="modifContact.php?id='.$lecontact-> getContactID ().'">Modifier</a> ] '.' [ <a href="suppContact.php?id='.$lecontact-> getContactID ().'">supprimer</a> ]'.'<br/>';
}
}

?>

</body>
</html>